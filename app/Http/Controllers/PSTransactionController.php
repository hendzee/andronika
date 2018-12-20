<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PSTransaction;
use App\WorkerSalary;
use App\GeneratorId;

class PSTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $id_prj)
    {        
        $data_transaction = PSTransaction::where('id_salary', $id)->get();        
        $id_salary= $id; 
        $id_project = $id_prj;       
        
        return view('project.ps_transaction.index', compact('data_transaction', 
            'id_salary', 'id_project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id_salary = $id;
        $data_transaction = WorkerSalary::where('id_salary', $id)->first();

        return view('project.ps_transaction.create', compact('id_salary', 'data_transaction'));
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
        
        $transaction = PSTransaction::create([ 
            'id_transaction' => $gen->generateId('ps_transaction'),
            'id_project' => $request->id_project,
            'id_worker' => $request->id_worker,
            'id_salary' => $request->id_salary,
            'nominal' => $request->nominal,
            'date' => date('Y-m-d', strtotime($request->date))            
        ]);        

        return redirect('ps_transaction_index/'. $request->id_salary . '/' . $request->id_project);
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
        $data_transaction = PSTransaction::where('id_transaction', $id)
            ->first();        

        return view('project.ps_transaction.edit', compact('data_transaction'));
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
        $transaction = PSTransaction::where('id_transaction', $id)
            ->first()
            ->update([             
                'id_project' => $request->id_project,
                'id_worker' => $request->id_worker,
                'id_salary' => $request->id_salary,
                'nominal' => $request->nominal,
                'date' => date('Y-m-d', strtotime($request->date))            
            ]);        
        
        return redirect('ps_transaction_index/'. $request->id_salary . '/' . $request->id_project);
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
