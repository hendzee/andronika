<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WorkerContract;
use App\Project;
use App\ProjectWorker;

class WorkerContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data_worker = ProjectWorker::where('id_project', $id)
            ->where('salary_status', 'KONTRAK')
            ->get();
        $id_project = $id;
        
        return view('project.worker_contract.index', compact('data_worker', 'id_project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        
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
        $data_worker = ProjectWorker::where('id_worker', $id)
            ->first();        
    
        return view('project.worker_contract.edit', compact('data_worker'));
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
        $check_data = WorkerContract::where('id_project', $request->id_project)
            ->where('id_worker', $request->id_worker)
            ->first();

        if ($check_data == null){
            $contract = WorkerContract::create([                 
                'id_project' => $request->id_project,
                'id_worker' => $request->id_worker,
                'contract_value' => $request->contract_value
            ]);
        }else {
            $contract = WorkerContract::where('id_worker', $id)
                ->first()
                ->update([                
                'contract_value' => $request->contract_value
        ]);        
        }        
       
        return redirect('worker_contract_index/' . $request->id_project )
            ->with('success', 'Data berhasil ditambahkan / dirubah.');
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
