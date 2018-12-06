<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;
use App\Client;
use App\Project;

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
