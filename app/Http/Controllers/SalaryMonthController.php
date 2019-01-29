<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalaryMonth;
use App\Employee;
use App\GeneratorId;
use App\SMDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SalaryMonthRequest;

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
    public function store(SalaryMonthRequest $request)
    {
        $gen = new GeneratorId;

        $check_data = SalaryMonth::where('date', date('Y-m-d', strtotime($request->date)))
            ->first();

        $data_employee = Employee::all();

        if ($check_data == null){
            $id_month = $gen->generateId('salary_month');

            $data_salary = SalaryMonth::create([
                'id_month' => $id_month,
                'date' => date('Y-m-d', strtotime($request->date))
            ]);

            $data_insert = [];
            $x = 0;

            foreach ($data_employee as $key => $data) {
                $data_insert[] = array(
                    'id_month' => $id_month,
                    'id_detail' => $gen->generateId('salary_month_detail') . $x,
                    'id_employee' => $data->id_employee,
                    'salary' => $data->employee_salary->salary
                );
                
                $x++;
            }

            DB::table('salary_month_detail')->insert($data_insert);
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_month = SalaryMonth::where('id_month', $id)
            ->first();

        return view('employee.salary_month.edit', compact('data_month'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SalaryMonthRequest $request, $id)
    {
        $check_data = SalaryMonth::where('date', date('Y-m-d', strtotime($request->date)))
            ->first();

        if ($check_data == null){
            $data_month = SalaryMonth::where('id_month', $id)
                ->update([
                    'date' => date('Y-m-d', strtotime($request->date))
                ]);
        }

        return redirect('salary_month/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_month = SalaryMonth::where('id_month', $id)
            ->delete();

        return redirect('salary_month/');
    }
}
