<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\GeneratorId;
use App\Http\Requests\EmployeeRequest;

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
    public function store(EmployeeRequest $request)
    {
        $gen = new GeneratorId();

        $check_employee = Employee::where('name', $request->name)
            ->where('address', $request->address)
            ->first();

        if ($check_employee == null){
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

            return redirect('/employee')
                ->with('success', 'Data berhasil ditambahkan.');
        }else{
            return redirect('/employee')
                ->with('error', 'Data karyawan sudah ada, gunakan nama dan alamat yang baru.');
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
    public function update(EmployeeRequest $request, $id)
    {
        $check_employee = Employee::where('name', $request->name)
            ->where('address', $request->address)
            ->first();

        if ($check_employee == null){
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
        }else{
            $data_employee = Employee::where('id_employee', $id)
                ->first()
                ->update([
                    'age' => date("Y-m-d", strtotime($request->age)),
                    'telp' => $request->telp,
                    'gender' => $request->gender,
                    'religion' => $request->religion,
                    'division' => $request->division                
                ]);
        }
        
        return redirect('/employee')
            ->with('success', 'Data berhasil dirubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_employee = Employee::where('id_employee', $id)
            ->delete();

        return redirect('employee')
            ->with('success', 'Data berhasil dihapus.');
    }
}
