<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WarehouseItem;

class WarehouseItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_item = WarehouseItem::all();

        return view('warehouse.warehouse_item.index', compact('data_item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warehouse.warehouse_item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $warehouse_item = WarehouseItem::create([
            'item_name' => $request->item_name,
            'measure' => $request->measure
        ]);

        return redirect('warehouse_item/');
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
        $data_item = WarehouseItem::where('item_name', $id)
            ->first();
                
        return view('warehouse.warehouse_item.edit', compact('data_item'));
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
        $data_item = WarehouseItem::where('item_name', $id)
            ->first()
            ->update([
                'item_name' => $request->item_name,
                'measure' => $request->measure
            ]);

        return redirect('warehouse_item/');
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
