<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RepairAndUsed;
use App\Warehouse;

class RepairAndUsedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_warehouse = Warehouse::all();

        return view('warehouse.repair_and_used.index', compact('data_warehouse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        $item_name = $id;
        $repair_and_used = RepairAndUsed::where('item_name', $id)
            ->first();

        return view('warehouse.repair_and_used.edit', compact('item_name', 'repair_and_used'));
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
        $check_data = RepairAndUsed::where('item_name', $id)
            ->first();

        if ($check_data != null){
            $repair_and_used = RepairAndUsed::where('item_name', $id)
                ->first()
                ->update([
                    'number_repair' => $request->number_repair,
                    'number_used' => $request->number_used
                ]);
        }else {
            $repair_and_used = RepairAndUsed::create([
                'item_name' => $request->item_name,
                'number_repair' => $request->number_repair,
                'number_used' =>$request->number_used
            ]);
        }

        return redirect('repair_and_used');
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
