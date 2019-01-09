<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssetsData;

class DashboardController extends Controller
{
    public function index()
    {
        $assets_data = new AssetsData();        

        echo $assets_data->getCompanyOutcome();
        
        // return view('dashboard.index');
    }
}
