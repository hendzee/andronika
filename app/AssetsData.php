<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\ProjectPayment;
use App\WorkerSalary;
use App\ProjectBonus;
use App\ProjectPurchase;
use App\Mutation;

class AssetsData extends Model
{
    public function getCompanyAsset()
    {        
        $company_asset = 0;

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
        
        $project_outcome = ($worker_payment->total) + $project_bonus + ($project_purchase->total)
            + $project_mutation_out;

        $project_asset = $project_income - $project_outcome;        
        //end project asset

        //project income from mutation

        echo $project_asset;        
    }
}