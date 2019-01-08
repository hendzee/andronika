<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProjectPayment;
use App\WorkerSalary;
use App\ProjectBonus;
use App\ProjectPurchase;
use App\Mutation;

class AssetsData extends Model
{
    public function getCompanyAssets()
    {        
        //get profit project
        $project_payment = ProjectPayment::where('id_project', $id)
            ->get()
            ->sum('transfer');

        $worker_payment = WorkerSalary::select(DB::raw('sum(salary * fullday) as total'))
            ->where('id_project', $id)
            ->first();
        
        $project_bonus = ProjectBonus::where('id_project', $id)
            ->get()
            ->sum('bonus');

        $project_purchase = ProjectPurchase::select(DB::raw('sum(price_per_item * total_item) as total'))
            ->where('id_project', $id)
            ->first();

        $mutation_in = Mutation::where('destiny', $id)
            ->get()
            ->sum('nominal');

        $mutation_out = Mutation::where('source', $id)
            ->get()
            ->sum('nominal');

        $income = $project_payment + $mutation_in;
        
        $outcome = ($worker_payment->total) + $project_bonus + ($project_purchase->total)
            + $mutation_out;

        $assets = $income - $outcome;
        $profit = ($assets / $income) * 100;
        //end get profit project        
    }
}
