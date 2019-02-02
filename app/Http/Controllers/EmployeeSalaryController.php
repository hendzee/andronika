<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\EmployeeSalary;

class EmployeeSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_employee = Employee::all();
        
        return view('employee.employee_salary.index', compact('data_employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $data_employee = Employee::where('id_employee', $id)
            ->first();

        return view('employee.employee_salary.edit', compact('data_employee'));
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
        $check_data = EmployeeSalary::where('id_employee', $id)
            ->first();

        if ($check_data == null){
            $employee_salary = EmployeeSalary::create([
                'id_employee' => $request->id_employee,
                'salary' => $request->salary,
            ]);
        }else {
            $employee_salary = EmployeeSalary::where('id_employee', $id)
            ->first()
            ->update([
                'salary' => $request->salary,   
            ]);
        }
        
        return redirect('/employee_salary')
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

    }
}
