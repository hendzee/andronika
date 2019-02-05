<?php

namespace App\Http\Controllers;

use App\CompanyCash;
use App\Mutation;
use App\GeneratorId;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyCashRequest;

class CompanyCashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_cash = CompanyCash::all();
        $data_TCash = Mutation::where('destiny', 'KAS')->sum('nominal');
        $data_TUCash = Mutation::where('source', 'KASs')->sum('nominal');
        return view('company_cash.index', compact('data_cash','data_TCash','data_TUCash','data_Total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('company_cash.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyCashRequest $request)
    {
        $gen = new GeneratorId();
        
        $employee = CompanyCash::create([
            'id_transaction' => $gen->generateId('company_cash'),
            'description' => $request->desc,
            'date' => date("Y-m-d", strtotime($request->date)),
            'price' => $request->price,
            'number' => $request->number,
            'total' => ($request->price * $request->number)
        ]);

        return redirect('/company_cash');
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
        //
        $data_cash = CompanyCash::where('id_transaction', $id)
            ->first();

        return view('company_cash.edit', compact('data_cash'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyCash  $companyCash
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyCashRequest $request, $id)
    {
        $data_employee = CompanyCash::where('id_transaction', $id)
            ->first()
            ->update([
                'description' => $request->desc,
                'date' => date("Y-m-d", strtotime($request->date)),
                'price' => $request->price,
                'number' => $request->number,
                'total' => ($request->price * $request->number)               
            ]);
        
        return redirect('company_cash');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanyCash  $companyCash
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_cash = CompanyCash::where('id_transaction', $id)
            ->delete();

        return redirect('company_cash');
    }
}
