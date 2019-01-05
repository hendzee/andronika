<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\GeneratorId;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_employee = Employee::all();
        return view('employee.index', compact('data_employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
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

        $employee = Employee::create([
            'id_employee' => $gen->generateId('employee'),
            'name' => $request->name,
            'age' => date("Y-m-d", strtotime($request->age)),
            'address' => $request->address,
            'telp' => $request->telp,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'division' => $request->division
        ]);

        return redirect('/employee');
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

        return view('employee.edit', compact('data_employee'));
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
        $data_employee = Employee::where('id_employee', $id)
            ->first()
            ->update([
                'name' => $request->name,
                'age' => date("Y-m-d", strtotime($request->age)),
                'address' => $request->address,
                'telp' => $request->telp,
                'gender' => $request->gender,
                'religion' => $request->religion,
                'division' => $request->division                
            ]);
        
        return redirect('/employee');
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
