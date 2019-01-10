<?php

namespace App\Http\Controllers;

use App\Fuel;
use App\GeneratorId;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_fuel = Fuel::all();
        return view('transportation.fuel.index', compact('data_fuel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('transportation.fuel.create');
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

        $fuel = Fuel::create([ 
            'id_fuel' => $gen->generateId('fuel'),
            'name' => $request->name,
            'price' => $request->price,
            'date' => date("Y-m-d", strtotime($request->date))    

        ]);        

        return redirect('fuel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function show(Fuel $fuel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data_fuel = Fuel::where('id_fuel', $id)
            ->first();        

        return view('transportation.fuel.edit', compact('data_fuel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data_fuel = Fuel::where('id_fuel', $id)
        ->first()
        ->update([            
            'price' => $request->price,
            'date' => date("Y-m-d", strtotime($request->date))    
        ]);
    
        return redirect('fuel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fuel $fuel)
    {
        //
    }
}
