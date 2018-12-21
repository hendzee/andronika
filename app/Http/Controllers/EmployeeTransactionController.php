<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GeneratorId;
use App\Employee;
use App\EmployeeSalary;
use App\EmployeeTransaction;

class EmployeeTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $data_transaction = EmployeeTransaction::where('id_salary', $id)->get();
        $id_trans = $id;
        return view('employee.employee_transaction.index', compact('data_transaction', 'id_trans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $data_transaction = EmployeeSalary::where('id_salary', $id)->first();
        $id_trans = $id;
        return view('employee.employee_transaction.create', compact('data_transaction', 'id_trans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $gen = new GeneratorId();

        $employee = EmployeeTransaction::create([
            'id_transaction' => $gen->generateId('employee_transaction'),
            'id_salary' => $request->id_salary,            
            'id_employee' => $request->id_employee,
            'nominal' => $request->nominal,
            'date' => date("Y-m-d", strtotime($request->date)),
        ]);

        return redirect('employee_transaction_index/'. $request->id_salary);
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
        //
        $data_transaction = EmployeeTransaction::where('id_transaction', $id)
            ->first();        

        return view('employee.employee_transaction.edit', compact('data_transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeTransaction  $employeeTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data_employee = EmployeeTransaction::where('id_transaction', $id)
            ->first()
            ->update([
                'nominal' => $request->nominal,   
                'date' => date("Y-m-d", strtotime($request->date))            
            ]);
        
        return redirect('employee_transaction_index/'. $request->id_salary);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeTransaction  $employeeTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeTransaction $employeeTransaction)
    {
        //
        // EmployeeSalary::find($id)->delete();
        //return redirect('/employee_salary');
        $EmployeeSalary->delete();
  
        return redirect()->route('EmployeeSalary.index')
                        ->with('success','Product deleted successfully');
    }
}
