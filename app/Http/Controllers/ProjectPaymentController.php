<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectPayment;
use App\Project;
use App\GeneratorId;
use App\Http\Requests\ProjectPaymentRequest;

class ProjectPaymentController extends Controller
{
    /**
     * Display a listing of the resource.$data_project =  
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data_payment = ProjectPayment::where('id_project', $id)->get();
        $id_project = $id;
        $total_trans = ProjectPayment::where('id_project', $id)
            ->sum('transfer');
        $total = Project::where('id_project', $id)->first();

        $remain = ($total->total - $total_trans);

        return view('project.project_payment.index', compact('data_payment', 
            'id_project', 'total_trans', 'remain'));
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

        return view('project.project_payment.create', compact('id_project', 'data_project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectPaymentRequest $request)
    {
        $gen = new GeneratorId();

        $project_payment = ProjectPayment::create([
            'id_payment' => $gen->generateId('project_payment'),
            'id_project' => $request->id_project,
            'date' => date("Y-m-d", strtotime($request->date)),
            'transfer' => $request->transfer            
        ]);

        return redirect('project_payment_index/'. $request->id_project )
            ->with('success', 'Data berhasil ditambahkan.');
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
        $data_payment = ProjectPayment::where('id_payment', $id)
            ->first();

        return view('project.project_payment.edit', compact('data_payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectPaymentRequest $request, $id)
    {
        $data_payment = ProjectPayment::where('id_payment', $id)
        ->first()
        ->update([
            'id_project' => $request->id_project,
            'date' => date("Y-m-d", strtotime($request->date)),
            'transfer' => $request->transfer            
        ]);

        return redirect('project_payment_index/'. $request->id_project )
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
        $data_project = ProjectPayment::where('id_payment', $id)
            ->first();
        $data_payment = ProjectPayment::where('id_payment', $id)
            ->delete();

        return redirect('project_payment_index/'. $data_project->id_project )
            ->with('success', 'Data berhasil dihapus.');
    }
}
