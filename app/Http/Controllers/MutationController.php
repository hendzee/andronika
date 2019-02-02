<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mutation;
use App\Project;
use App\GeneratorId;
use App\Http\Requests\MutationRequest;

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
    public function store(MutationRequest $request)
    {
        $gen = new GeneratorId();

        if ($request->source == $request->destiny){
            return redirect('mutation')
                ->with('error', 'Uang asal dan tujuan tidak boleh sama, silahkan coba lagi.');
        }else{
            $mutation = Mutation::create([
                'id_mutation' => $gen->generateId('mutation'),
                'source' => $request->source,
                'destiny' => $request->destiny,
                'nominal' => $request->nominal,
                'date' => date('Y-m-d', strtotime($request->date)),
                'description' => $request->description
            ]);

            return redirect('mutation')
                ->with('success', 'Data berhasil ditambahkan.');
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
        $data_mutation = Mutation::where('source', $id)
            ->orWhere('destiny', $id)
            ->get();

        return view('mutation.show', compact('data_mutation'));
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
    public function update(MutationRequest $request, $id)
    {
        if ($request->source == $request->destiny){
            return redirect('mutation')
                ->with('error', 'Uang asal dan tujuan tidak boleh sama, silahkan coba lagi.');
        }else{
            $mutation = Mutation::where('id_mutation', $id)
                ->first()
                ->update([            
                    'source' => $request->source,
                    'destiny' => $request->destiny,
                    'nominal' => $request->nominal,
                    'date' => date('Y-m-d', strtotime($request->date)),
                    'description' => $request->description
                ]);

            return redirect('mutation')
                ->with('success', 'Data berhasil dirubah.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_mutation = Mutation::where('id_mutation', $id)
            ->delete();

        return redirect('mutation')
            ->with('success', 'Data berhasil dihapus.');
    }
}
