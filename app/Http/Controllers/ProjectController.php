<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Client;
use App\GeneratorId;
use App\Mutation;
use App\Http\Requests\ProjectRequest;
use App\ProjectAssets;

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
        $project_assets = new ProjectAssets;

        $income = $project_assets->getProjectIncome($id);
        $outcome = $project_assets->getProjectOutcome($id);
        $profit = $project_assets->getProjectProfit($id);
        $project_obligation = $project_assets->getSalaryObligation($id);
        
        $data_project = Project::where('id_project', $id)
            ->first();

        $id_project = $id;
        
        return view('project.show', compact('data_project', 'id_project',
            'income', 'outcome', 'profit', 'project_obligation'));
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
