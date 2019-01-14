<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssetsData;

class DashboardController extends Controller
{
    public function index()
    {
        $assets_data = new AssetsData();        

        $data_outcome = $assets_data->getCompanyOutcome();
        $data_income = $assets_data->getCompanyIncome();
        $data_profit = $assets_data->getCompanyProfit();
        
        return view('dashboard.index', compact('data_income', 'data_outcome', 'data_profit'));
    }
}
