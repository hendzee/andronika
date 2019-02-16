<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\User;
use App\SMDetail;
use App\EmployeeTransaction;
use App\EmployeeBonus;
use Auth;

class ShowSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_employee = Employee::where('id_employee', Auth::user()->id_employee)->first();
        // $data_salary = SMDetail::where('id_employee', Auth::user()->id_employee)->get();
        // $data_salary = EmployeeTransaction::where('id_employee', Auth::user()->id_employee)->get();
        // $data_bonus = EmployeeBonus::where('id_employee', Auth::user()->id_employee)->get();

        $data_salary = SMDetail::where('id_employee', Auth::user()->id_employee)->get();
        return view('employee.show_salary.index', compact('data_employee', 'data_salary'));
    }

    public function show_salary_gaji($id)
    {
        $data_transaction = EmployeeTransaction::where('id_detail', $id)->get();
        $id_detail = $id;

        $data_detail = SMDetail::where('id_detail', $id_detail)
            ->first();

        $id_month = $data_detail->id_month;
        
        return view('employee.show_salary.show_salary_gaji', compact('data_transaction', 'id_detail', 
            'id_month'));
    }

    public function show_salary_bonus($id)
    {
        $data_bonus = EmployeeBonus::where('id_detail', $id)->get();        
        $id_detail= $id;

        $data_detail = SMDetail::where('id_detail', $id_detail)
            ->first();

        $id_month = $data_detail->id_month;
        
        return view('employee.show_salary.show_salary_bonus', compact('data_bonus', 'id_detail', 'id_month'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
