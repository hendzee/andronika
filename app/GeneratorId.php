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
use App\PSTransaction;
use App\WarehousePurchase;
use App\WorkerContract;
use App\Mutation;
use App\WarehouseRent;
use App\RentPayment;
use App\WarehouseSell;

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
                        
            case 'employee_salary':
                $search_id = 'id_employee';
                $unique_code = 'ES';
                $obj = new EmployeeSalary();
            break;

            case 'employee_transaction':
                $search_id = 'id_transaction';
                $unique_code = 'ET';
                $obj = new EmployeeTransaction();
            break;

            case 'employee_bonus':
                $search_id = 'id_bonus';
                $unique_code = 'BS';
                $obj = new EmployeeBonus();
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

            case 'ps_transaction':
                $search_id = 'id_transaction';
                $unique_code = 'PT';
                $obj = new PSTransaction();
            break;

            case 'warehouse_purchase':
                $search_id = 'id_purchase';
                $unique_code = 'WP';
                $obj = new WarehousePurchase();
            break;

            case 'worker_contract':
                $search_id = 'id_contract';
                $unique_code = 'CT';
                $obj = new WorkerContract();
            break;

            case 'mutation':
                $search_id = 'id_mutation';
                $unique_code = 'MT';
                $obj = new Mutation();
            break;

            case 'warehouse_rent':
                $search_id = 'id_rent';
                $unique_code = 'RN';
                $obj = new WarehouseRent();
            break;

            case 'rent_payment':
                $search_id = 'id_payment';
                $unique_code = 'PS';
                $obj = new RentPayment();
            break;

            case 'warehouse_sell':
                $search_id = 'id_sell';
                $unique_code = 'WL';
                $obj = new WarehouseSell();
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
