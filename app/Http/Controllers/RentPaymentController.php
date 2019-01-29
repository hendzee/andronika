<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RentPayment;
use App\GeneratorId;
use App\WarehouseRent;
use DateTime;   
use App\Http\Requests\RentPaymentRequest;

class RentPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id_rent = $id;

        return view('warehouse.rent_payment.create', compact('id_rent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RentPaymentRequest $request)
    {
        $gen = new GeneratorId();

        $payment = RentPayment::create([
            'id_payment' => $gen->generateId('rent_payment'),
            'id_rent' => $request->id_rent,
            'nominal' => $request->nominal,
            'date' => date('Y-m-d', strtotime($request->date))
        ]);        

        return redirect ('rent_payment/' . $request->id_rent);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id_rent = $id;

        $data_payment = RentPayment::where('id_rent', $id)
            ->get();

        $total_trans = RentPayment::where('id_rent', $id)
            ->get()
            ->sum('nominal');

        $get_rent = WarehouseRent::where('id_rent', $id)
            ->first();

        $start = new DateTime($get_rent->start);
        $end = new DateTime($get_rent->end);
        $diff = date_diff($start, $end);
        $finalDiff =  ($diff->format('%a')) + 1;

        $total = ($finalDiff * ($get_rent->price_day) * ($get_rent->number_item));

        $remain = $total - $total_trans;
        
        return view('warehouse.rent_payment.show', compact('id_rent', 'data_payment', 
            'total_trans', 'remain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_payment = RentPayment::where('id_payment', $id)
            ->first();

        return view ('warehouse.rent_payment.edit', compact('data_payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RentPaymentRequest $request, $id)
    {
        $payment = RentPayment::where('id_payment', $id)
            ->first()
            ->update([
                'id_rent' => $request->id_rent,
                'nominal' => $request->nominal,
                'date' => date('Y-m-d', strtotime($request->date))
            ]);

        return redirect ('rent_payment/' . $request->id_rent);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_rent = RentPayment::where('id_payment', $id)
            ->first();

        $data_payment = RentPayment::where('id_payment', $id)
            ->delete();

        return redirect ('rent_payment/' . $data_rent->id_rent);
    }
}
