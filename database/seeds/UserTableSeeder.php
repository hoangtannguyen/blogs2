<?php

use Illuminate\Database\Seeder;
Use App\Role;
Use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = Role::where('name', 'User')->first();
        $role_manager  = Role::where('name', 'Admin')->first();
 
        $employee = new User();
        $employee->name = 'Employee Name';
        $employee->email = 'employee@example.com';
        $employee->password = bcrypt('123456');
        $employee->save();
        $employee->roles()->attach($role_employee);
 
        $saler = new User();
        $saler->name = 'Saler Name';
        $saler->email = 'saler@example.com';
        $saler->password = bcrypt('123456');
        $saler->save();
        $saler->roles()->attach($role_manager);
 
    }
}
