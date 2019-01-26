<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GeneratorId;
use App\Employee;
use App\SMDetail;
use App\EmployeeBonus;

class EmployeeBonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $data_bonus = EmployeeBonus::where('id_detail', $id)->get();        
        $id_detail= $id;
        
        return view('employee.employee_bonus.index', compact('data_bonus', 'id_detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $data_bonus = SMDetail::where('id_detail', $id)->first();
        $id_detail = $id;
        return view('employee.employee_bonus.create', compact('data_bonus', 'id_detail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // //
        $gen = new GeneratorId();

        $employee = EmployeeBonus::create([
            'id_bonus' => $gen->generateId('employee_bonus'),
            'id_employee' => $request->id_employee,            
            'id_detail' => $request->id_detail,
            'bonus' => $request->bonus,            
            'status' => 'BELUM DIAMBIL',
            'description' => $request->desc
        ]);
        
        return redirect('employee_bonus_index/'. $request->id_detail);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeBonus  $employeeBonus
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeBonus $employeeBonus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeBonus  $employeeBonus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data_bonus = EmployeeBonus::where('id_bonus', $id)
            ->first();        

        return view('employee.employee_bonus.edit', compact('data_bonus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeBonus  $employeeBonus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data_bonus = EmployeeBonus::where('id_bonus', $id)
            ->first()
            ->update([
                'bonus' => $request->bonus,   
                'date' => date("Y-m-d", strtotime($request->date)),
                'status' => $request->status,
                'description' => $request->desc,            
            ]);
        
        return redirect('employee_bonus_index/'. $request->id_detail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeBonus  $employeeBonus
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeBonus $employeeBonus)
    {
        //
    }
}
