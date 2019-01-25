<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalaryMonth;
use App\Employee;
use App\GeneratorId;

class SalaryMonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_salary = SalaryMonth::all();

        return view('employee.salary_month.index', compact('data_salary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.salary_month.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gen = new GeneratorId;

        $check_data = SalaryMonth::where('date', date('Y-m-d', strtotime($request->date)))
            ->first();

        if ($check_data == null){
            $data_salary = SalaryMonth::create([
                'id_month' => $gen->generateId('salary_month'),
                'date' => date('Y-m-d', strtotime($request->date))
            ]);
        }
        
        return redirect('salary_month/');
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
        $id_salary = $id;

        return view('employee.salary_month.edit');
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
