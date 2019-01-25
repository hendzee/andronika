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
        // $data_employee = employee::all();
        // return view('employee.employee_salary.create', compact('data_employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $gen = new GeneratorId();

        // $employee = EmployeeSalary::create([
        //     'id_salary' => $gen->generateId('employee_salary'),
        //     'id_employee' => $request->id_employee,
        //     'salary' => $request->salary,
        //     'date' => date("Y-m-d", strtotime($request->date)),
        // ]);

        // return redirect('/employee_salary');
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
        
        return redirect('/employee_salary');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // EmployeeSalary::find($id)->delete();
        //return redirect('/employee_salary');
        $EmployeeSalary->delete();
  
        return redirect()->route('EmployeeSalary.index')
                        ->with('success','Product deleted successfully');
    }
}
