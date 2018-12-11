<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;
use App\Client;
use App\Project;
use App\ProjectPayment;
use App\ProjectPurchase;
use App\ProjectWorker;
use App\WorkerSalary;
use App\ProjectBonus;

class GeneratorId extends Model
{
    public function generateId($table)
    {        
        $search_id = '';
        $unique_code = '';
        $id = '';
        $search = true;
        $obj = null;

        switch($table){
            case 'employee':
                $search_id = 'id_employee';
                $unique_code = 'EM';
                $obj = new Employee();
            break;

            case 'client':
                $search_id = 'id_client';
                $unique_code = 'CL';
                $obj = new Client();
            break;

            case 'project':
                $search_id = 'id_project';
                $unique_code = 'PR';
                $obj = new Project();
            break;

            case 'project_payment':
                $search_id = 'id_payment';
                $unique_code = 'PY';
                $obj = new ProjectPayment();
            break;

            case 'project_purchase':
                $search_id = 'id_transaction';
                $unique_code = 'PP';
                $obj = new ProjectPurchase();
            break;

            case 'project_worker':
                $search_id = 'id_worker';
                $unique_code = 'PW';
                $obj = new ProjectWorker();
            break;  
            
            case 'worker_salary':
                $search_id = 'id_salary';
                $unique_code = 'WS';
                $obj = new WorkerSalary();
            break; 

            case 'project_bonus':
                $search_id = 'id_bonus';
                $unique_code = 'PB';
                $obj = new ProjectBonus();
            break;
        }

        do {
            $id = $unique_code . time();
            $obj = $obj->where($search_id, $id)
                ->get();
            
            if (count($obj) <= 0){
                $search = false;
            }             

        }while($search == true);

        return $id;
    }
}
