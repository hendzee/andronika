<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectSupply;
use App\Project;
use App\Http\Requests\ProjectSupplyRequest;
use App\GeneratorId;

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
    public function store(ProjectSupplyRequest $request)
    {
        $gen = new GeneratorId;

        $check_data = ProjectSupply::where('item_name', $request->item_name)
            ->where('id_project', $request->id_project)
            ->first();

        if ($check_data == null){
            $supply = ProjectSupply::create([
                'id_supply' => $gen->generateId('project_supply'),
                'item_name' => $request->item_name,
                'id_project' => $request->id_project,
                'measure' => $request->measure,            
            ]);

            return redirect('project_supply_index/'. $request->id_project )
            ->with('success', 'Data berhasil ditambahkan.');
        }else{
            return redirect('project_supply_index/'. $request->id_project )
                ->with('error', 'Data sudah ada, gunakan nama baru.');;
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
        $data_supply = ProjectSupply::where('id_supply', $id)
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
    public function update(ProjectSupplyRequest $request, $id)
    {        
        $check_data = ProjectSupply::where('item_name', $request->item_name)
            ->where('id_project', $request->id_project)
            ->first();
        
        if ($check_data == null){
            $supply = ProjectSupply::where('id_supply', $id)
                ->first()
                ->update([
                    'item_name' => $request->item_name,                
                    'measure' => $request->measure,            
                ]);   
        }else {
            $supply = ProjectSupply::where('id_supply', $id)
                ->first()
                ->update([
                    'measure' => $request->measure,            
                ]);   
        }        

        return redirect('project_supply_index/'. $request->id_project )
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
        $data_project = ProjectSupply::where('id_supply', $id)
            ->first();

        $data_supply = ProjectSupply::where('id_supply', $id)
            ->delete();

        return redirect('project_supply_index/'. $data_project->id_project )
            ->with('success', 'Data berhasil dihapus.');
    }
}
