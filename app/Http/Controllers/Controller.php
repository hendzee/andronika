<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function project_payment()
    {
        return view('project.payment.project_payment');
    }

    public function project_payment_add()
    {
        return view('project.payment.project_payment_add');
    }

    public function project_payment_edit()
    {
        return view('project.payment.project_payment_edit');
    }

    public function project_supply()
    {
        return view('project.project_supply');
    }

    public function project_supply_add()
    {
        return view('project.project_supply_add');
    }

    public function project_supply_edit()
    {
        return view('project.project_supply_edit');
    }

    public function supply_purchase()
    {
        return view('project.supply_purchase');
    }

    public function supply_purchase_add()
    {
        return view('project.supply_purchase_add');
    }

    public function supply_purchase_edit()
    {
        return view('project.supply_purchase_edit');
    }

    public function project_worker()
    {
        return view('project.project_worker');
    }

    public function project_worker_add()
    {
        return view('project.project_worker_add');
    }

    public function project_worker_edit()
    {
        return view('project.project_worker_edit');
    }
}
