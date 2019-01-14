<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\ProjectPayment;
use App\WorkerSalary;
use App\ProjectBonus;
use App\ProjectPurchase;
use App\Mutation;
use App\WarehouseSell;
use App\WarehouseRent;
use App\WorkerContract;
use App\WarehousePurchase;
use App\EmployeeSalary;
use App\EmployeeBonus;

class AssetsData extends Model
{
    public function getCompanyAsset()
    {        
        $company_asset = 0;

        return $this->getCompanyIncome();
    }

    public function getCompanyIncome()
    {
        //project assset
        $project_payment = DB::table('project')
            ->join('project_payment', 'project.id_project', '=', 'project_payment.id_project' )
            ->where('status', 'SELESAI')
            ->get()
            ->sum('transfer');

        $worker_payment = DB::table('project')
            ->join('worker_salary', 'project.id_project', '=', 'worker_salary.id_project')
            ->where('project.status', 'SELESAI')
            ->select(DB::raw('sum((salary * fullday) + (salary * halfday * 0.5)) as total'))
            ->first();

        $worker_contract = DB::table('project')
            ->join('worker_contract', 'project.id_project', '=', 'worker_contract.id_project' )
            ->where('status', 'SELESAI')
            ->get()
            ->sum('contract_value');

        $project_bonus = DB::table('project')
            ->join('project_bonus', 'project.id_project', '=', 'project_bonus.id_project')
            ->where('project.status', 'SELESAI')
            ->get()
            ->sum('bonus');
        
        $project_mutation_in = DB::table('project')
            ->join('mutation', 'project.id_project', '=', 'mutation.destiny')
            ->where('destiny', '<>', 'PERUSAHAAN')
            ->where('project.status' , 'SELESAI')
            ->get()
            ->sum('nominal');

        $project_mutation_out = DB::table('project')
            ->join('mutation', 'project.id_project', '=', 'mutation.source')
            ->where('source', '<>', 'PERUSAHAAN')
            ->where('project.status' , 'SELESAI')
            ->get()
            ->sum('nominal');

        $project_purchase = DB::table('project')
            ->join('project_purchase', 'project.id_project', '=', 'project_purchase.id_project')    
            ->select(DB::raw('sum(price_per_item * total_item) as total'))
            ->where('project.status', 'SELESAI')
            ->first();        

        $project_income = $project_payment + $project_mutation_in;
        
        $project_outcome = ($worker_payment->total) + $worker_contract 
            + $project_bonus + ($project_purchase->total) 
            + $project_mutation_out;

        $project_asset = $project_income - $project_outcome;        
        //end project asset

        //company income mutation
        $company_mutation_in = Mutation::where('destiny', 'PERUSAHAAN')
            ->get()
            ->sum('nominal');
        //end company income mutation

        //company income selling
        $company_sell = WarehouseSell::select(DB::raw('sum(price_per_item * number) as total'))
            ->first();
        //end compant income selling

        //company income renting
        $company_rent = RentPayment::all()
            ->sum('nominal');
        //end company income renting

        $company_income = $project_asset + $company_mutation_in 
            + ($company_sell->total) + $company_rent;

        return $company_income;  
    }

    public function getCompanyOutcome()
    {
        //company outcome mutation
        $company_mutation_out = Mutation::where('source', 'PERUSAHAAN')
            ->get()
            ->sum('nominal');
        //end company outcome mutation

        //company outcome purchase
        $company_purchase = WarehousePurchase::select(DB::raw('sum(price_per_item * number) as total'))
            ->first();
        //end company outcome purchase

        //company outcome employee salary
        $company_salary = EmployeeSalary::all()
            ->sum('salary');
        //end company outcome employee salary

        //company outcome employee bonus
        $company_bonus = EmployeeBonus::all()
            ->sum('bonus');
        //end company employee bonus

        $company_outcome = $company_mutation_out + ($company_purchase->total) + $company_salary 
            + $company_bonus;

        return $company_outcome;
    }
}