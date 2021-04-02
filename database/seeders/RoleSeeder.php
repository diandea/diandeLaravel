<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(["role"=>"simple-user"]);
        $role2 = Role::create(["role"=>"admin"]);
        $role3 = Role::create(["role"=>"super-admin"]);

        $user1 = User::create([
            "role_id"=>$role2->id,
            "name"=>"Admin",
            "email"=>"admin@admin.com",
            "password"=>Hash::make("admin123"),
            ]);

            $user2 = User::create([
                "role_id"=>$role3->id,
                "name"=>"Super Admin",
                "email"=>"super-admin@admin.com",
                "password"=>Hash::make("admin123"),
                ]);
        //
    }
}
