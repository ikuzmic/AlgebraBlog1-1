<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = new Role();
        $admin_role->name = 'admin';
        $admin_role->description = 'Admin User';
        $admin_role->save();

        $operator_role = new Role();
        $operator_role->name = 'operator';
        $operator_role->description = 'Operator User';
        $operator_role->save();

        $user_role = new Role();
        $user_role->name = 'user';
        $user_role->description = 'Normal User';
        $user_role->save();
    }
}
