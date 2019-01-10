<?php

namespace App\Http\Controllers;

use App\Transportation;
use App\Employee;
use App\GeneratorId;
use Illuminate\Http\Request;

class TransportationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_transportation = Transportation::all();
        return view('transportation.index', compact('data_transportation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_employee = Employee::where('division', 'driver')
        ->get();
        return view('transportation.create', compact('data_employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $gen = new GeneratorId();
        $stat = "PROSES";
        $transportation = Transportation::create([ 
            'id_transportation' => $gen->generateId('transportation'),
            'id_employee' =>$request->id_employee,
            'starting_point' =>$request->starting_point,
            'destination' =>$request->destination,
            'distance' =>$request->distance,
            'cost' =>$request->cost,
            'url_token' => $request->url_token,
            'description' =>$request->description
        ]);        

        return redirect('transportation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function show(Transportation $transportation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data_transportation = Transportation::where('id_transportation', $id)
            ->first();        

        return view('transportation.edit', compact('data_transportation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data_transportation = Transportation::where('id_transportation', $id)
        ->first()
        ->update([   
            'starting_point' =>$request->starting_point,
            'destination' =>$request->destination,
            'distance' =>$request->distance,
            'cost' =>$request->cost,
            'url_token' => $request->url_token,
            'description' =>$request->description
        ]);
    
        return redirect('transportation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transportation $transportation)
    {
        //
    }
}
