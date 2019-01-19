<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WorkerContract;
use App\Project;
use App\ProjectWorker;
use App\GeneratorId;

class WorkerContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data_contract = WorkerContract::where('id_project', $id)->get();
        $id_project = $id;
        
        return view('project.worker_contract.index', compact('data_contract', 'id_project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id_project = $id;
        $data_project = Project::where('id_project', $id)->first();
        $data_worker = ProjectWorker::where([
            'id_project' => $id,
            'salary_status' => 'KONTRAK'])
            ->get();

        return view('project.worker_contract.create', compact('id_project', 'data_worker', 'data_project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $gen = new GeneratorId();

        $check_data = WorkerContract::where('id_worker', $request->id_worker)
            ->get();

        //check if id_contract must be unique
        if ($check_data->count() < 1){
            $salary = WorkerContract::create([ 
                'id_contract' => $gen->generateId('worker_contract'),                
                'id_project' => $request->id_project,
                'id_worker' => $request->id_worker,
                'contract_value' => $request->contract_value
            ]);
        };

        return redirect('worker_contract_index/'. $request->id_project );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_contract = WorkerContract::where('id_contract', $id)
            ->first();        
    
        return view('project.worker_contract.edit', compact('data_contract'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contract = WorkerContract::where('id_contract', $id)
            ->first()
            ->update([                
            'contract_value' => $request->contract_value
        ]);        
       
        return redirect('worker_contract_index/' . $request->id_project );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
