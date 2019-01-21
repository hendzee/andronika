<?php

namespace App\Http\Controllers;

use App\GeneratorId;
use App\Warehouse;
use App\WarehouseSell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarehouseSellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_sell = WarehouseSell::all();

        return view('warehouse.warehouse_sell.index', compact('data_sell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_item = Warehouse::all();

        return view('warehouse.warehouse_sell.create', compact('data_item'));
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

        $warehouse_sell = WarehouseSell::create([
            'id_sell' => $gen->generateId('warehouse_sell'),
            'item_name' => $request->item_name,
            'number' => $request->number,
            'price_per_item' => $request->price_per_item,
            'date' => date('Y-m-d', strtotime($request->date)),
            'resp_person' => $request->resp_person,
        ]);

        $warehouse = Warehouse::where('item_name', $request->item_name)
            ->first()
            ->update([
                'number' => DB::raw("number-($request->number)")
            ]);

        return redirect('warehouse_sell/');
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
        $data_item = Warehouse::all();

        $data_sell = WarehouseSell::where('id_sell', $id)
            ->first();

        return view('warehouse.warehouse_sell.edit', compact('data_item', 'data_sell'));
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
        $get_sell = WarehouseSell::where('id_sell', $id)
            ->first();

        $get_warehouse = Warehouse::where('item_name', $request->item_name)
            ->first();

        $number = ($get_warehouse->number + $get_sell->number) - $request->number;

        $warehouse =  Warehouse::where('item_name', $request->item_name)
            ->first()
            ->update([
                'number' => $number
            ]);

        $warehouse_sell = WarehouseSell::where('id_sell', $id)
            ->first()
            ->update([
                'item_name' => $request->item_name,
                'number' => $request->number,
                'price_per_item' => $request->price_per_item,
                'date' => date('Y-m-d', strtotime($request->date)),
                'resp_person' => $request->resp_person,
            ]);

        return redirect('warehouse_sell');
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
