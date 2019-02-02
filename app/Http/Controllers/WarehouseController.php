<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warehouse;
use App\Http\Requests\WarehouseRequest;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_item = Warehouse::all();

        return view('warehouse.index', compact('data_item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warehouse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WarehouseRequest $request)
    {
        $check_warehouse = Warehouse::where('item_name', $request->item_name)
            ->first();

        if ($check_warehouse == null){
            $warehouse = Warehouse::create([
                'item_name' => $request->item_name,
                'measure' => $request->measure,
                'number' => $request->number,
                'rent_status' => $request->rent_status
            ]);

            return redirect('warehouse/')
                ->with('success', 'Data berhasil ditambahkan.');
        }else{
            return redirect('warehouse/')
                ->with('error', 'Data sudah ada, gunakan nama lain.');;
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
        $data_item = Warehouse::where('item_name', $id)
            ->first();
                
        return view('warehouse.edit', compact('data_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WarehouseRequest $request, $id)
    {
        $check_warehouse = Warehouse::where('item_name', $request->item_name)
            ->first();

        if ($check_warehouse == null){
            $data_item = Warehouse::where('item_name', $id)
                ->first()
                ->update([
                    'item_name' => $request->item_name,
                    'measure' => $request->measure,
                    'number' => $request->number,
                    'rent_status' => $request->rent_status
                ]);
        }else {
            $data_item = Warehouse::where('item_name', $id)
                ->first()
                ->update([
                    'measure' => $request->measure,
                    'number' => $request->number,
                    'rent_status' => $request->rent_status
                ]);
        }

        return redirect('warehouse/')
            ->with('success', 'Data berhasil dirubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_item = Warehouse::where('item_name', $id)
            ->delete();

        return redirect('warehouse/')
            ->with('success', 'Data berhasil dihapus.');
    }
}
