<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::where('name', 'admin')->first();
        $operator_role = Role::where('name', 'operator')->first();
        $user_role = Role::where('name', 'user')->first();

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($admin_role);

        $operator = new User();
        $operator->name = 'Operator';
        $operator->email = 'operator@operator.com';
        $operator->password = bcrypt('operator');
        $operator->save();
        $operator->roles()->attach($operator_role);

        $user = new User();
        $user->name = 'User';
        $user->email = 'user@user.com';
        $user->password = bcrypt('user');
        $user->save();
        $user->roles()->attach($user_role);
    }
}
