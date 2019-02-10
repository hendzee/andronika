<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = \Spatie\Permission\Models\Role::findByName('admin');
        \Spatie\Permission\Models\Permission::create('edit');
        \Spatie\Permission\Models\Permission::create('browse');
        \Spatie\Permission\Models\Permission::create('read');
        $role->syncPermissions(['edit','browse','read']);

        \Spatie\Permission\Models\Role::create(['name' => 'bendahara']);

        $user = new \App\User();
        $user->name = "hendras";
        $user->email = "hendras@email.com";
        $user->id_employee = "EM1545048205";
        $user->password = bcrypt('123456');
        $user->save();
        $user->assignRole('admin');



        $user = new \App\User();
        $user->name = "congxing";
        $user->email = "congxing@email.com";
        $user->id_employee = "EM1545048206";
        $user->password = bcrypt('123456');
        $user->save();
        $user->assignRole('bendahara');
    }
}
