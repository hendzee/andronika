<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssetsData;
use App\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $assets_data = new AssetsData();

        echo $assets_data->getCompanyIncome();

        $data_outcome = $assets_data->getCompanyOutcome();
        $data_income = $assets_data->getCompanyIncome();
        $data_profit = $assets_data->getCompanyProfit();
        $data_obli = $assets_data->getSalaryObligation();
        
        $data_project_1 = Project::where('island', 'LUWUK')
            ->orderBy('start', 'ASC')
            ->get();
        $data_project_2 = Project::where('island', 'BANGGAI LAUT')
            ->orderBy('start', 'ASC')
            ->get();
        $data_project_3 = Project::where('island', 'BANGGAI KEPULAUAN')
            ->orderBy('start', 'ASC')
            ->get();
        
        return view('dashboard.index', compact('data_income', 'data_outcome', 'data_profit', 
            'data_obli', 'data_project_1', 'data_project_2', 'data_project_3'));
    }
}
