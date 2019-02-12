<?php

namespace App;
use App\ProjectPayment;
use App\WorkerSalary;
use App\ProjectBonus;
use App\ProjectPurchase;
use Illuminate\Support\Facades\DB;
use App\Mutation;
use App\WorkerContract;
use App\Http\Requests\ProjectRequest;
use App\PSTransaction;
use App\PCT;

use Illuminate\Database\Eloquent\Model;

class ProjectAssets extends Model
{
    public function getProjectProfit($id)
    {
        $profit = $this->getProjectIncome($id) - $this->getProjectOutcome($id);

        return $profit;
    }

    public function getProjectIncome($id)
    {
        $income = $this->mutationToIncome($id) + $this->payToIncome($id);

        return $income;
    }

    public function getProjectOutcome($id)
    {
        $outcome = $this->purchaseToDecrease($id) + $this->mutationToDecrease($id) + $this->salaryToDecrease($id)
            + $this->conToDecrease($id);

        return $outcome;
    }

    // mutation to income
    public function mutationToIncome($id)
    {
        $mutation_income = Mutation::where('destiny', $id)
            ->get()
            ->sum('nominal');

        return $mutation_income;
    }

    public function mutationToDecrease($id)
    {
        $mutation_outcome = Mutation::where('source', $id)
            ->get()
            ->sum('nominal');

        return $mutation_outcome;
    }

    public function purchaseToDecrease($id)
    {
        $project_purchase = ProjectPurchase::select(DB::raw('sum(price_per_item * total_item) as total'))
            ->where('id_project', $id)
            ->first();

        return $project_purchase->total;
    }

    public function salaryToDecrease($id)
    {
        $salary_given = PSTransaction::where('id_project', $id)
            ->get()
            ->sum('nominal');

        $bonus_given = ProjectBonus::where('id_project', $id)
            ->where('status', 'DIAMBIL')
            ->get()
            ->sum('bonus');

        $salary_outcome = $salary_given + $bonus_given;

        return $salary_outcome;
    }

    public function conToDecrease($id)
    {
        $contract_outcome = PCT::where('id_project', $id)
            ->get()
            ->sum('nominal');

        return $contract_outcome;
    }

    // income project from payment
    public function payToIncome($id)
    {
        $pay_income = ProjectPayment::where('id_project', $id)
            ->get()
            ->sum('transfer');

        return $pay_income;
    }

    public function getSalaryObligation($id)
    {
        $worker_payment = WorkerSalary::select(DB::raw('sum((salary * fullday)' 
            . '+ (salary * halfday * 0.5)) as total'))
            ->where('id_project', $id)
            ->first();

        $bonus = ProjectBonus::where('id_project', $id)
            ->get()
            ->sum('bonus');

        $worker_contract = WorkerContract::where('id_project', $id)
            ->get()
            ->sum('contract_value');

        $obligation = (($worker_payment->total + $bonus) - $this->salaryToDecrease($id))
            + ($worker_contract - $this->conToDecrease($id));

        return $obligation;
    }
}
