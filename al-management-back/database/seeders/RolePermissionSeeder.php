<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $seller = Role::create(['name' => 'seller']);

        $permission1 = Permission::create(['name' => 'get_users']);
        $permission2 = Permission::create(['name' => 'get_users_by_id']);
        $permission3 = Permission::create(['name' => 'post_store_users']);
        $permission4 = Permission::create(['name' => 'put_update_users']);
        $permission5 = Permission::create(['name' => 'delete_users']);
        $permission6 = Permission::create(['name' => 'get_products']);
        $permission7 = Permission::create(['name' => 'get_products_by_id']);
        $permission8 = Permission::create(['name' => 'post_store_products']);
        $permission9 = Permission::create(['name' => 'put_update_products']);
        $permission10 = Permission::create(['name' => 'delete_products']);

        $admin->syncPermissions(Permission::all());
        $seller->syncPermissions([$permission1, $permission2, $permission6, $permission7]);
    }
}
