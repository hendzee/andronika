<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RolePermision extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create( 
        [
            'id_employee' => '002',
            'name' => 'brian',
            'email' => 'brian@gmail.com',
            'password' => bcrypt('brian')
        ]);
    }
}
