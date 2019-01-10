<?php

namespace App\Http\Controllers;

use App\Driver;
use App\GeneratorId;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_driver = Driver::all();
        return view('transportation.driver.index', compact('data_driver'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('transportation.driver.create');
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
        
        $driver = Driver::create([ 
            'id_driver' => $gen->generateId('driver'),
            'name' => $request->name,
            'gender' => $request->gender,
            'telp' => $request->telp,
            'religion' => $request->religion,
            'age' => date("Y-m-d", strtotime($request->age)),
            'address' => $request->address
        ]);        

        return redirect('driver');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data_driver = Driver::where('id_driver', $id)
            ->first();        

        return view('transportation.driver.edit', compact('data_driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data_driver = Driver::where('id_driver', $id)
        ->first()
        ->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'telp' => $request->telp,
            'religion' => $request->religion,
            'age' => date("Y-m-d", strtotime($request->age)),
            'address' => $request->address
        ]);
    
        return redirect('driver');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        //
    }
}
