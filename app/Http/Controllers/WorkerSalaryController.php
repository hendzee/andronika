<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WorkerSalary;
use App\ProjectWorker;
use App\GeneratorId;

class WorkerSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data_salary = WorkerSalary::where('id_project', $id)->get();
        $id_project = $id;
        
        return view('project.worker_salary.index', compact('data_salary', 'id_project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id_project = $id;
        $data_worker = ProjectWorker::where('id_project', $id)->get();

        return view('project.worker_salary.create', compact('id_project', 'data_worker'));
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

        $check_data = WorkerSalary::where('salary_date', 
            date('Y-m-d', strtotime($request->salary_date)))
            ->where('id_worker', $request->id_worker)
            ->get();

        //check if salary_data and id_worker must be unique
        if ($check_data->count() < 1){
            $salary = WorkerSalary::create([ 
                'id_salary' => $gen->generateId('worker_salary'),
                'salary_date' => date('Y-m-d', strtotime($request->salary_date)),
                'id_project' => $request->id_project,
                'id_worker' => $request->id_worker,
                'salary' => $request->salary
            ]);
        };

        return redirect('worker_salary_index/'. $request->id_project );
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
        $data_salary = WorkerSalary::where('id_salary', $id)
            ->first();        
    
        return view('project.worker_salary.edit', compact('data_salary'));
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
        $salary = WorkerSalary::where('id_salary', $id)
            ->first()
            ->update([
                'salary_date' => date('Y-m-d', strtotime($request->salary_date)),                
                'salary' => $request->salary
            ]);        
           
        return redirect('worker_salary_index/'. $request->id_project );
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
