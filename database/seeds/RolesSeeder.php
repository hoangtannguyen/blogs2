<?php

use Illuminate\Database\Seeder;

use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Role = new Role();
        $Role->id = '1';
        $Role->name = 'ROLE_ADMIN';
        $Role->save();

        $Role = new Role();
        $Role->id = '2';
        $Role->name = 'ROLE_SUPERADMIN';
        $Role->save();
    }
}
