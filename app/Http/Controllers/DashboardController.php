<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssetsData;
use App\Project;
use App\WarehouseSell;
use App\WarehouseRent;
use App\Transportation;

class DashboardController extends Controller
{
    public function index()
    {
        $assets_data = new AssetsData();

        $data_outcome = $assets_data->getCompanyOutcome();
        $data_income = $assets_data->getCompanyIncome();
        $data_profit = $assets_data->getCompanyProfit();
        $data_obli = $assets_data->getSalaryObligation();
        
        $data_project_1 = Project::where('island', 'LUWUK')
            ->orderBy('start', 'ASC')
            ->limit(5)
            ->get();
        $data_project_2 = Project::where('island', 'BANGGAI LAUT')
            ->orderBy('start', 'ASC')
            ->limit(5)
            ->get();
        $data_project_3 = Project::where('island', 'BANGGAI KEPULAUAN')
            ->orderBy('start', 'ASC')
            ->limit(5)
            ->get();

        $data_sell = WarehouseSell::orderBy('date', 'ASC')
            ->limit(5)
            ->get();

        $data_rent = WarehouseRent::orderBy('start', 'ASC')
            ->limit(5)
            ->get();

        $data_transport = Transportation::orderBy('date', 'ASC')
            ->limit(5)
            ->get();
        
        return view('dashboard.index', compact('data_income', 'data_outcome', 'data_profit', 
            'data_obli', 'data_project_1', 'data_project_2', 'data_project_3', 'data_sell', 
            'data_rent', 'data_transport'));
    }
}
