<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PCT;
use App\WorkerContract;
use App\GeneratorId;
use App\Http\Requests\PCTRequest;

class PCTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $id_prj)
    {
        $data_transaction = PCT::where('id_project', $id_prj)
            ->where('id_worker', $id)
            ->get();        
        $id_worker = $id;        
        $id_project = $id_prj;
        
        return view('project.pct.index', compact('data_transaction', 'id_worker', 'id_project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id_worker = $id;
        $data_transaction = WorkerContract::where('id_worker', $id)->first();

        return view('project.pct.create', compact('id_worker', 'data_transaction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PCTRequest $request)
    {
        $gen = new GeneratorId();
        
        $transaction = PCT::create([ 
            'id_transaction' => $gen->generateId('ps_transaction'),
            'id_project' => $request->id_project,
            'id_worker' => $request->id_worker,            
            'nominal' => $request->nominal,
            'date' => date('Y-m-d', strtotime($request->date))            
        ]);        

        
        return redirect('pct_index/'. $request->id_worker . '/' . $request->id_project);
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
        $data_transaction = PCT::where('id_transaction', $id)
            ->first();        

        return view('project.pct.edit', compact('data_transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PCTRequest $request, $id)
    {
        $transaction = PCT::where('id_transaction', $id)
            ->first()
            ->update([             
                'id_project' => $request->id_project,
                'id_worker' => $request->id_worker,
                'nominal' => $request->nominal,
                'date' => date('Y-m-d', strtotime($request->date))            
            ]);                  
        
        return redirect('pct_index/'. $request->id_worker . '/' . $request->id_project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_id = PCT::where('id_transaction', $id)
            ->first();

        $data_transaction = PCT::where('id_transaction', $id)
            ->delete();

        return redirect('pct_index/'. $data_id->id_worker . '/' . $data_id->id_project);
    }
}
