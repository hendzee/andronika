<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectPurchase;
use App\Project;
use App\GeneratorId;
use App\ProjectSupply;
use App\Http\Requests\ProjectPurchaseRequest;


class ProjectPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data_purchase = ProjectPurchase::where('id_project', $id)->get();
        $id_project = $id;

        return view('project.project_purchase.index', compact('data_purchase', 'id_project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id_project = $id;
        $data_project = Project::where('id_project', $id)->first();
        $data_supply = ProjectSupply::where('id_project', $id)->get();

        return view('project.project_purchase.create', compact('id_project', 'data_supply', 'data_project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectPurchaseRequest $request)
    {
        $gen = new GeneratorId();

        $project_purchase = ProjectPurchase::create([
            'id_transaction' => $gen->generateId('project_purchase'),
            'id_project' => $request->id_project,
            'date' => date("Y-m-d", strtotime($request->date)),
            'name' => $request->name,
            'total_item' => $request->total_item,
            'price_per_item' => $request->price_per_item,
            'resp_person' => $request->resp_person            
        ]);

        return redirect('project_purchase_index/'. $request->id_project );
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
        $data_purchase = ProjectPurchase::where('id_transaction', $id)
            ->first();

        $data_supply = ProjectSupply::where('id_project', $data_purchase->id_project)
            ->get();        

        return view('project.project_purchase.edit', compact('data_purchase', 'data_supply'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectPurchaseRequest $request, $id)
    {        
        $purchase = ProjectPurchase::where('id_transaction', $id)
            ->first()
            ->update([
                'id_project' => $request->id_project,
                'date' => date("Y-m-d", strtotime($request->date)),
                'name' => $request->name,
                'total_item' => $request->total_item,
                'price_per_item' => $request->price_per_item,
                'resp_person' => $request->resp_person                
            ]);        
    
        return redirect('project_purchase_index/'. $request->id_project );
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
