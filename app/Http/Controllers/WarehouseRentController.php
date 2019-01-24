<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WarehouseRent;
use App\Warehouse;
use App\Client;
use App\GeneratorId;
use App\Http\Requests\WarehouseRentRequest;

class WarehouseRentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_rent = WarehouseRent::all();

        return view('warehouse.warehouse_rent.index', compact('data_rent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data_client = Client::all();
        $data_item = Warehouse::where('rent_status', 'BOLEH')
            ->get();

        return view('warehouse.warehouse_rent.create', compact('data_client', 'data_item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WarehouseRentRequest $request)
    {
        $gen = new GeneratorId();

        $warehouse_rent = WarehouseRent::create([
            'id_rent' => $gen->generateId('warehouse_rent'),
            'id_client' => $request->id_client,
            'item_name' => $request->item_name,
            'number_item' => $request->number_item,
            'price_day' => $request->price_day,
            'start' => date('Y-m-d', strtotime($request->start)),
            'end' => date('Y-m-d', strtotime($request->end)),
            'status' => 'DISEWA'
        ]);

        return redirect('warehouse_rent');
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
        $data_client = Client::all();
        $data_item = Warehouse::where('rent_status', 'BOLEH')
            ->get();

        $data_rent = WarehouseRent::where('id_rent', $id)
            ->first();

        return view('warehouse.warehouse_rent.edit', compact('data_client', 'data_item', 
            'data_rent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WarehouseRentRequest $request, $id)
    {
        $warehouse_rent = WarehouseRent::where('id_rent', $id)
            ->first()
            ->update([                
                'id_client' => $request->id_client,
                'item_name' => $request->item_name,
                'number_item' => $request->number_item,
                'price_day' => $request->price_day,
                'start' => date('Y-m-d', strtotime($request->start)),
                'end' => date('Y-m-d', strtotime($request->end)),
                'status' => $request->status
            ]);

        return redirect('warehouse_rent');
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
