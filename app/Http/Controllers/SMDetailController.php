<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SMDetail;
use App\Employee;
use App\GeneratorId;
use App\Http\Requests\SMDetailRequest;

class SMDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data_employee = Employee::all();
        $id_month = $id;

        return view('employee.salary_month_detail.create', compact('data_employee', 'id_month'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SMDetailRequest $request)
    {
        $gen = new GeneratorId;
        $check_data = SMDetail::where('id_month', $request->id_month)
            ->where('id_employee', $request->id_employee)
            ->first();

        if ($check_data == null){
            $data_detail = SMDetail::create([
                'id_detail' => $gen->generateId('salary_month_detail'),
                'id_month' => $request->id_month,
                'id_employee' => $request->id_employee,
                'salary' => $request->salary
            ]);
        }

        return redirect('salary_month_detail/'.$request->id_month);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_detail = SMDetail::where('id_month', $id)
            ->get();

        $id_month = $id;

        return view('employee.salary_month_detail.show', compact('data_detail', 'id_month'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_detail = SMDetail::where('id_detail', $id)
            ->first();

        return view('employee.salary_month_detail.edit', compact('data_detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SMDetailRequest $request, $id)
    {
        $data_detail = SMDetail::where('id_detail', $id)
            ->update([
                'salary' => $request->salary
            ]);

        return redirect('salary_month_detail/'.$request->id_month);
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
