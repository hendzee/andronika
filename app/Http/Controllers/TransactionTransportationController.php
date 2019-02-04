<?php

namespace App\Http\Controllers;

use App\TransactionTransportation;
use App\GeneratorId;
use Illuminate\Http\Request;
use App\Http\Requests\TransactionTransportationRequest;

class TransactionTransportationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data_ttransportation = TransactionTransportation::where('id_transportation', $id)
            ->get();
        $id_transportation = $id;

        return view('transportation.transaction_transportation.index', compact('data_ttransportation', 'id_transportation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id_transportation = $id;

        return view('transportation.transaction_transportation.create', compact('id_transportation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionTransportationRequest $request)
    {
        $gen = new GeneratorId();
        $transportation = TransactionTransportation::create([
            'id_transaction' => $gen->generateId('transaction_transportation'),
            'id_transportation' => $request->id_transportation,
            'nominal' => $request->nominal,
            'date' => date('Y-m-d', strtotime($request->date))
        ]);

        return redirect('transaction_transportation_index/'. $request->id_transportation );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransactionTransportation  $transactionTransportation
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionTransportation $transactionTransportation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransactionTransportation  $transactionTransportation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_transaction = TransactionTransportation::where('id_transaction', $id)
            ->first();
        
        $id_transportation = $id;

        return view('transportation.transaction_transportation.edit', compact('data_transaction','id_transportation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransactionTransportation  $transactionTransportation
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionTransportationRequest $request, $id)
    {
        $transportation = TransactionTransportation::where('id_transaction', $id)
            ->first()
            ->update([
                'nominal' => $request->nominal,
                'date' => date('Y-m-d', strtotime($request->date))          
            ]);

        return redirect('transaction_transportation_index/'. $request->id_transportation );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransactionTransportation  $transactionTransportation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
