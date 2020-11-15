<?php

use Illuminate\Database\Seeder;
use App\Role_User;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Role_User = new Role_User();
        $Role_User->role_id = '2';
        $Role_User->user_id = '1';
        $Role_User->save();
    }
}
