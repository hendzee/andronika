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
use App\RentPayment;
use App\WorkerContract;
use App\EmployeeSalary;
use App\EmployeeBonus;
use App\Transportation;
use App\TransactionTransportation;
use App\EmployeeTransaction;
use App\SMDetail;

class AssetsData extends Model
{
    public function getCompanyProfit()
    {        
        $profit = $this->getCompanyIncome() - $this->getCompanyOutcome();

        return $profit;
    }

    public function getCompanyIncome()
    {
        $income = $this->mutationToIncome() + $this->projectToIncome() + $this->transportToIncome()
            + $this->sellToIncome() + $this->rentToIncome();

        return $income;
    }

    public function getCompanyOutcome()
    {
        $outcome = $this->mutationToDecrease() + $this->salaryToDecrease() + $this->transportToDecrease();

        return $outcome;
    }

    //company income from mutation
    public function mutationToIncome()
    {
        //company income mutation
        $company_mutation_in = Mutation::where('destiny', 'PERUSAHAAN')
            ->get()
            ->sum('nominal');
        //end company income mutation

        return $company_mutation_in;
    }

    // mutation out
    public function mutationToDecrease()
    {
        //company income mutation
        $company_mutation_out = Mutation::where('source', 'PERUSAHAAN')
            ->get()
            ->sum('nominal');
        //end company income mutation

        return $company_mutation_out;
    }

    //company income from project
    public function projectToIncome()
    {
        //project assset
        $project_payment = DB::table('project')
            ->join('project_payment', 'project.id_project', '=', 'project_payment.id_project' )
            ->where('status', 'SELESAI')
            ->get()
            ->sum('transfer');

        $worker_payment = DB::table('project')
            ->join('project_salary_transaction', 'project.id_project', '=', 'project_salary_transaction.id_project')
            ->where('project.status', 'SELESAI')
            ->sum('project_salary_transaction.nominal');

        $worker_contract = DB::table('project')
            ->join('project_contract_transaction', 'project.id_project', '=', 'project_contract_transaction.id_project' )
            ->where('status', 'SELESAI')
            ->sum('nominal');

        $project_bonus = DB::table('project')
            ->join('project_bonus', 'project.id_project', '=', 'project_bonus.id_project')
            ->where('project.status', 'SELESAI')
            ->where('project_bonus.status', 'DIAMBIL')
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
        
        $project_outcome = ($worker_payment) + $worker_contract 
            + $project_bonus + ($project_purchase->total) 
            + $project_mutation_out;

        $project_asset = $project_income - $project_outcome;        
        //end project asset

        return $project_asset;
    }

    //income from transportation
    public function transportToIncome()
    {
        //transport income
        $transport_income = TransactionTransportation::all()
            ->sum('nominal');

        return $transport_income;
    }

    public function transportToDecrease()
    {
        //transport outcome
        $transport_outcome = Transportation::all()
            ->sum('cost');

        return $transport_outcome;

    }

    // income from selling
    public function sellToIncome()
    {
        //company income selling
        $company_sell = WarehouseSell::select(DB::raw('sum(price_per_item * number) as total'))
            ->first();
        //end compant income selling

        return $company_sell->total;
    }

    // income from renting
    public function rentToIncome()
    {
        $rent_income = RentPayment::all()
            ->sum('nominal');

        return $rent_income;
    }

    // outcome from employee salary
    public function salaryToDecrease()
    {
        // salary given
        $salary_given = EmployeeTransaction::all()
            ->sum('nominal');
        // end salary given

        //company outcome employee bonus
        $company_bonus = EmployeeBonus::where('status', 'SUDAH DIAMBIL')
            ->get()
            ->sum('bonus');
        //end company employee bonus
        
        $salary_outcome = $salary_given + $company_bonus;

        return $salary_outcome;
    }

    public function getSalaryObligation()
    {
        // salary
        $tot_salary = SMDetail::all()
            ->sum('salary');
        // end salary given

        // bonus
        $tot_bonus = EmployeeBonus::all()
            ->sum('bonus');
        // end bonus
        
        $salary_obli = ($tot_salary + $tot_bonus) - $this->salaryToDecrease();

        return $salary_obli;
    }

}