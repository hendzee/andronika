<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mutation;
use App\Project;
use App\GeneratorId;

class MutationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_mutation = Mutation::all();

        return view('mutation.index', compact('data_mutation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_project = Project::where('status', 'PROSES')
            ->get();

        return view('mutation.create', compact('data_project'));
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

        $mutation = Mutation::create([
            'id_mutation' => $gen->generateId('mutation'),
            'source' => $request->source,
            'destiny' => $request->destiny,
            'nominal' => $request->nominal,
            'date' => date('Y-m-d', strtotime($request->date)),
            'description' => $request->description
        ]);

        return redirect('mutation');
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
        $data_project = Project::where('status', 'PROSES')
            ->get();

        $data_mutation = Mutation::where('id_mutation', $id)
            ->first();

        return view('mutation.edit', compact('data_mutation', 'data_project'));
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
        $mutation = Mutation::where('id_mutation', $id)
            ->first()
            ->update([            
                'source' => $request->source,
                'destiny' => $request->destiny,
                'nominal' => $request->nominal,
                'date' => date('Y-m-d', strtotime($request->date)),
                'description' => $request->description
            ]);

        return redirect('mutation');
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
