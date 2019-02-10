<?php

namespace App\Http\Controllers;

use App\CompanyCash;
use App\GeneratorId;
use Illuminate\Http\Request;

class CompanyCashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cash = CompanyCash::all();
        return view('company-cash.index', compact('cash'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company-cash.create');
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
        $cash = CompanyCash::create([
            'id_transaction' => $gen->generateId('company_cash'),
            'date' => $request->nominal,
            'description' => $request->description,
            'price' => $request->date,
            ]);

        return redirect()->route('company_cash.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CompanyCash  $companyCash
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyCash $companyCash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanyCash  $companyCash
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cash = CompanyCash::where('id_cash', $id)
            ->first();



        return view('company-cash.edit',compact('cash'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyCash  $companyCash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cash = CompanyCash::where('id_cash', $id)
            ->first()
            ->update([
                'nominal' => $request->nominal,
                'description' => $request->description,
                'date' => $request->date
            ]);

        return redirect()->route('company_cash.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanyCash  $companyCash
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyCash $companyCash)
    {
        //
    }
}
