<?php

namespace App\Http\Controllers;

use App\Transportation;
use App\TransactionTransportation;
use App\Employee;
use App\Client;
use App\GeneratorId;
use Illuminate\Http\Request;
use App\Http\Requests\TransportationRequest;

class TransportationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
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
        $data_employee = Employee::where('division', 'DRIVER')
            ->get();

        $data_client = Client::all();

        if (count($data_client) > 0){
            return view('transportation.create', compact('data_employee', 'data_client'));
        }else {
            return redirect('project')
                ->with('error', 'Data klien kosong, isi minimal 1 klien.');;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransportationRequest $request)
    {
        $gen = new GeneratorId();

        $transportation = Transportation::create([ 
            'id_transportation' => $gen->generateId('transportation'),
            'id_employee' =>$request->id_employee,
            'id_client' => $request->id_client,
            'starting_point' =>$request->starting_point,
            'destination' =>$request->destination,
            'distance' =>$request->distance,
            'cost' =>$request->cost,
            'total' => $request->total,
            'description' => $request->description,
            'date' => date("Y-m-d", strtotime($request->date))
        ]);        

        return redirect('transportation')
            ->with('success', 'Data berhasil ditambahkan.');
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
        $data_employee = Employee::where('division', 'DRIVER')
            ->get();

        $data_client = Client::all();

        $data_transportation = Transportation::where('id_transportation', $id)
            ->first();        

        return view('transportation.edit', compact('data_transportation', 'data_employee',
            'data_client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function update(TransportationRequest $request, $id)
    {
        $data_transportation = Transportation::where('id_transportation', $id)
            ->first()
            ->update([  
                'id_employee' => $request->id_employee,
                'id_client' => $request->id_client, 
                'starting_point' =>$request->starting_point,
                'destination' =>$request->destination,
                'distance' =>$request->distance,
                'cost' =>$request->cost,
                'total' => $request->total,
                'description' =>$request->description,
                'date' => date("Y-m-d", strtotime($request->date))
            ]);
    
        return redirect('transportation')
            ->with('success', 'Data berhasil dirubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_transportation = Transportation::where('id_transportation', $id)
            ->delete();

        return redirect('transportation')
            ->with('success', 'Data berhasil dihapus.');
    }
}
