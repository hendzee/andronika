<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WorkerSalary;
use App\ProjectWorker;
use App\Project;
use App\GeneratorId;
use Illuminate\Support\Facades\DB;

class WorkerSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {   
        $data_worker = ProjectWorker::where('id_project', $id)
            ->where('salary_status', 'HARIAN')
            ->get();
        
        $id_project = $id;
        
        return view('project.worker_salary.index', compact('data_worker', 'id_project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
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
        $data_worker = ProjectWorker::where('id_worker', $id)
            ->first();
        
        $id_worker = $id;
        
        return view('project.worker_salary.edit', compact('data_worker', 'id_worker'));
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
        $check_data = WorkerSalary::where('id_worker', $id)
            ->first();

        if ($check_data == null){
            $salary = WorkerSalary::create([                 
                'id_worker' => $request->id_worker,
                'id_project' => $request->id_project,
                'salary' => $request->salary,
                'fullday' => $request->fullday,
                'halfday' => $request->halfday
            ]);
        } else {
            $salary = WorkerSalary::where('id_worker', $id)
            ->first()
            ->update([                
                'salary' => $request->salary,
                'fullday' => $request->fullday,
                'halfday' => $request->halfday
            ]);    
        }
                   
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
