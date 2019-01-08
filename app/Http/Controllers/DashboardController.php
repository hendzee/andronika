<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssetsData;

class DashboardController extends Controller
{
    public function index()
    {
        $assets_data = new AssetsData();        

        return $assets_data->getCompanyAsset();
        
        // return view('dashboard.index');
    }
}
