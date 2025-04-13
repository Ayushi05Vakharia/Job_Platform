<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        $user = User::find(1);  // Assuming user with ID 1 exists
        $role = Role::firstOrCreate(['name' => 'poster']);
        $user->assignRole($role);
    }
}
