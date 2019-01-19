<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectBonus;
use App\GeneratorId;
use App\ProjectWorker;
use App\Http\Requests\ProjectBonusRequest;

class ProjectBonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $id_prj)
    {
        $data_bonus = ProjectBonus::where('id_worker', $id)->get();        
        $id_worker = $id;        
        $id_project = $id_prj;        
                
        return view('project.project_bonus.index', compact('data_bonus', 'id_worker', 'id_project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id_worker = $id;
        $data_bonus = ProjectWorker::where('id_worker', $id)->first();
        
        return view('project.project_bonus.create', compact('id_worker', 'data_bonus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectBonusRequest $request)
    {
        $gen = new GeneratorId();
        
        $bonus = ProjectBonus::create([ 
            'id_bonus' => $gen->generateId('project_bonus'),
            'id_project' => $request->id_project,
            'id_worker' => $request->id_worker,
            'bonus' => $request->bonus,
            'description' => $request->description,
            'status' => 'BELUM DIAMBIL'
        ]);        

        return redirect('project_bonus_index/'. $request->id_worker . '/' . $request->id_project);
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
        $data_bonus = ProjectBonus::where('id_bonus', $id)
            ->first();        

        return view('project.project_bonus.edit', compact('data_bonus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectBonusRequest $request, $id)
    {
        if ($request->status == 'diambil'){
            $bonus = ProjectBonus::where('id_bonus', $id)
                ->first()
                ->update([                
                    'id_project' => $request->id_project,
                    'id_worker' => $request->id_worker,
                    'bonus' => $request->bonus,
                    'description' => $request->description,
                    'status' => $request->status,
                    'date_take' => date('Y-m-d', strtotime($request->date_take))
                ]);        
        }
        
        return redirect('project_bonus_index/'. $request->id_worker . '/' . $request->id_project);
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
