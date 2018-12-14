<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WarehousePurchase; 
use App\GeneratorId;
use App\Warehouse;
use Illuminate\Support\Facades\DB;

class WarehousePurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_purchase = WarehousePurchase::all();

        return view('warehouse.warehouse_purchase.index', compact('data_purchase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_item = Warehouse::all();

        return view('warehouse.warehouse_purchase.create', compact('data_item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gen = new GeneratorId;

        $warehouse_purchase = WarehousePurchase::create([            
            'id_purchase' => $gen->generateId('warehouse_purchase'),
            'item_name' => $request->item_name,
            'number' => $request->number,
            'price_per_item' => $request->price_per_item,
            'date' => date('Y-m-d', strtotime($request->date)),
            'resp_person' => $request->resp_person,
            'token' => $request->token
        ]);

        $warehouse = Warehouse::where('item_name', $request->item_name)
            ->first()
            ->update([
                'number' => DB::raw("number+$request->number")
            ]);

        return redirect('warehouse_purchase/');
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

        $data_purchase = WarehousePurchase::where('id_purchase', $id)
            ->first();
        
        return view('warehouse.warehouse_purchase.edit', compact('data_item', 'data_purchase'));
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
        $get_purchase = WarehousePurchase::where('id_purchase', $id)
            ->first();

        $get_warehouse = Warehouse::where('item_name', $request->item_name)
            ->first();        

        $number = ($get_warehouse->number - $get_purchase->number) + $request->number;

        $warehouse =  Warehouse::where('item_name', $request->item_name)
            ->first()
            ->update([
                'number' => $number
            ]);      

        $warehouse_purchase = WarehousePurchase::where('id_purchase', $id)
            ->first()
            ->update([
                'item_name' => $request->item_name,
                'number' => $request->number,
                'price_per_item' => $request->price_per_item,
                'date' => date('Y-m-d', strtotime($request->date)),
                'resp_person' => $request->resp_person,
                'token' => $request->token
            ]);
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
