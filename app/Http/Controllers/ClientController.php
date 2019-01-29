<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\GeneratorId;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_client = Client::all();
        
        return view('client.index', compact('data_client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $gen = new GeneratorId();

        $employee = Client::create([
            'id_client' => $gen->generateId('client'),
            'address' => $request->address,
            'email' => $request->email,
            'telp' => $request->telp,
            'description' => $request->description            
        ]);

        return redirect('client');
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
        $data_client = Client::where('id_client', $id)
            ->first();

        return view('client.edit', compact('data_client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        $data_employee = Client::where('id_client', $id)
            ->first()
            ->update([
                'address' => $request->address,
                'email' => $request->email,
                'telp' => $request->telp,
                'description' => $request->description                
            ]);
        
        return redirect('client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_client = Client::where('id_client', $id)->delete();

        return redirect('client');
    }
}
