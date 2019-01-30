<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Client;
use App\GeneratorId;
use App\ProjectPayment;
use App\WorkerSalary;
use App\ProjectBonus;
use App\ProjectPurchase;
use Illuminate\Support\Facades\DB;
use App\Mutation;
use App\WorkerContract;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_project = Project::all();

        return view('project.index', compact('data_project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_client = Client::all();

        if (count($data_client) > 0){
            return view('project.create', compact('data_client'));
        }else {
            return redirect('project')
                ->with('error', 'Data klien kosong, isi minimal 1 klien.');;
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $gen = new GeneratorId();

        $check_project = Project::where('name', $request->name)
            ->first();

        if ($check_project == null){
            $project = Project::create([
                'id_project' => $gen->generateId('project'),
                'id_client' => $request->id_client,
                'name' => $request->name,
                'island' => $request->island,
                'status' => 'PROSES',
                'start' => date('Y-m-d', strtotime($request->start)),
                'end' => date('Y-m-d', strtotime($request->end)),
                'total' => $request->total,            
            ]);

            return redirect('project')
                ->with('success', 'Data berhasil ditambahkan.');
        }else {
            return redirect('project')
                ->with('error', 'Data sudah ada, mohon gunakan nama projek lain.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //financial data
        $payment = ProjectPayment::where('id_project', $id)
            ->get()
            ->sum('transfer');

        $worker_payment = WorkerSalary::select(DB::raw('sum((salary * fullday)' 
            . '+ (salary * halfday * 0.5)) as total'))
            ->where('id_project', $id)
            ->first();

        $worker_contract = WorkerContract::where('id_project', $id)
            ->get()
            ->sum('contract_value');
        
        $project_bonus = ProjectBonus::where('id_project', $id)
            ->get()
            ->sum('bonus');

        $project_purchase = ProjectPurchase::select(DB::raw('sum(price_per_item * total_item) as total'))
            ->where('id_project', $id)
            ->first();

        $mutation_in = Mutation::where('destiny', $id)
            ->get()
            ->sum('nominal');

        $mutation_out = Mutation::where('source', $id)
            ->get()
            ->sum('nominal');

        $income = $payment + $mutation_in;
        
        $outcome = ($worker_payment->total) + $worker_contract + $project_bonus 
            + ($project_purchase->total) + $mutation_out;

        $assets = $income - $outcome;

        if ($income > 0){
            $profit = ($assets / $income) * 100;
        }else {
            $profit = 0;
        }
        //end financial data

        $data_project = Project::where('id_project', $id)
            ->first();

        $id_project = $id;
        
        return view('project.show', compact('data_project', 'id_project',
            'income', 'outcome', 'assets', 'profit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_project = Project::where('id_project', $id)
            ->first();

        $data_client = Client::all();

        return view('project.edit', compact('data_project', 'data_client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
        $data_project = Project::where('id_project', $id)
            ->first()
            ->update([                
                'id_client' => $request->id_client,
                'name' => $request->name,
                'island' => $request->island,
                'status' => $request->status,
                'start' => date('Y-m-d', strtotime($request->start)),
                'end' => date('Y-m-d', strtotime($request->end)), 
                'total' => $request->total,                          
            ]);
        
        return redirect('project')
            ->with('success', 'Data berhasil dirubah.');
    }

    public function updateStatus($status, $id)
    {
        $data_project = Project::where('id_project', $id)
            ->first()
            ->update([                                
                'status' => $status,                
            ]);
        
        return redirect('project');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_project = Project::where('id_project', $id)->delete();

        //remove data mutation
        $remove_mutation = Mutation::where('source', $id)
            ->orWhere('destiny', $id)
            ->delete();

        return redirect('project')
            ->with('success', 'Data berhasil dihapus.');
    }
}
