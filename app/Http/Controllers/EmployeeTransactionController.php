<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GeneratorId;
use App\Employee;
use App\SMDetail;
use App\EmployeeTransaction;
use App\Http\Requests\EmployeeTransactionRequest;

class EmployeeTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data_transaction = EmployeeTransaction::where('id_detail', $id)->get();
        $id_detail = $id;

        $data_detail = SMDetail::where('id_detail', $id_detail)
            ->first();

        $id_month = $data_detail->id_month;
        
        return view('employee.employee_transaction.index', compact('data_transaction', 'id_detail', 
            'id_month'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data_transaction = SMDetail::where('id_detail', $id)->first();
        $id_detail = $id;

        $data_detail = SMDetail::where('id_detail', $id_detail)
            ->first();

        $id_month = $data_detail->id_month;
        
        return view('employee.employee_transaction.create', compact('data_transaction', 'id_detail',
            'id_month'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeTransactionRequest $request)
    {
        //
        $gen = new GeneratorId();

        $employee = EmployeeTransaction::create([
            'id_transaction' => $gen->generateId('employee_transaction'),
            'id_detail' => $request->id_detail,            
            'id_employee' => $request->id_employee,
            'nominal' => $request->nominal,
            'date' => date("Y-m-d", strtotime($request->date)),
        ]);

        return redirect('employee_transaction_index/'. $request->id_detail);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeTransaction  $employeeTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeTransaction $employeeTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeTransaction  $employeeTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_transaction = EmployeeTransaction::where('id_transaction', $id)
            ->first();
            
        $id_detail = $data_transaction->id_detail;

        $data_detail = SMDetail::where('id_detail', $id_detail)
            ->first();

        $id_month = $data_detail->id_month;

        return view('employee.employee_transaction.edit', compact('data_transaction', 'id_detail', 
            'id_month'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeTransaction  $employeeTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeTransactionRequest $request, $id)
    {
        $data_employee = EmployeeTransaction::where('id_transaction', $id)
            ->first()
            ->update([
                'nominal' => $request->nominal,   
                'date' => date("Y-m-d", strtotime($request->date))            
            ]);
        
        return redirect('employee_transaction_index/'. $request->id_detail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeTransaction  $employeeTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_detail = EmployeeTransaction::where('id_transaction', $id)
            ->first();

        $data_transaction = EmployeeTransaction::where('id_transaction', $id)
            ->delete();

        return redirect('employee_transaction_index/'. $data_detail->id_detail);
    }
}
