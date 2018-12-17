<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectSupply;
use App\Project;

class ProjectSupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {   
        $data_supply = ProjectSupply::where('id_project', $id)->get();
        $id_project = $id;

        return view('project.project_supply.index', compact('data_supply', 'id_project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id_project = $id;
        
        $data_project = Project::where('id_project', $id)
            ->first();        

        return view('project.project_supply.create', compact('id_project', 'data_project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supply = ProjectSupply::create([
            'item_name' => $request->item_name,
            'id_project' => $request->id_project,
            'measure' => $request->measure,            
        ]);

        return redirect('project_supply_index/'. $request->id_project );
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
        $data_supply = ProjectSupply::where('item_name', $id)
            ->first();

        return view('project.project_supply.edit', compact('data_supply'));
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
        $supply = ProjectSupply::where('item_name', $id)
            ->first()
            ->update([
                'item_name' => $request->item_name,                
                'measure' => $request->measure,            
            ]);

        return redirect('project_supply_index/'. $request->id_project );
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
