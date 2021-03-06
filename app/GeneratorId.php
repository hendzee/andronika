<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;
use App\Client;
use App\Project;
use App\ProjectPayment;
use App\ProjectPurchase;
use App\ProjectWorker;
use App\ProjectBonus;
use App\PSTransaction;
use App\Mutation;
use App\WarehouseRent;
use App\RentPayment;
use App\WarehouseSell;
use App\Transportation;
use App\Driver;
use APp\Fuel;
use App\ProjectSupply;
use App\SalaryMonth;
use App\SMDetail;
use App\TransactionTransportation;
use App\CompanyCash;

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

            case 'salary_month':
                $search_id = 'id_month';
                $unique_code = 'MO';
                $obj = new SalaryMonth();
            break;

             case 'salary_month_detail':
                $search_id = 'id_detail';
                $unique_code = 'MD';
                $obj = new SMDetail();
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

            case 'project_supply':
                $search_id = 'id_supply';
                $unique_code = 'SP';
                $obj = new ProjectSupply();
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

            case 'transportation':
                $search_id = 'id_transportation';
                $unique_code = 'TT';
                $obj = new Transportation();
            break;

            case 'transaction_transportation':
                $search_id = 'id_transportation';
                $unique_code = 'TG';
                $obj = new TransactionTransportation();
            break;

            case 'fuel':
                $search_id = 'id_fuel';
                $unique_code = 'TF';
                $obj = new Fuel();
            break;

            case 'driver':
                $search_id = 'id_driver';
                $unique_code = 'TD';
                $obj = new Driver();
            break;

            case 'company_cash':
                $search_id = 'id_transaction';
                $unique_code = 'CC';
                $obj = new CompanyCash();
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
