<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // 1. Create the Roles
        $superAdmin = Role::create(['name' => 'super_admin', 'label' => 'Super Admin (Owner)']);
        $encoder = Role::create(['name' => 'encoder', 'label' => 'Encoder / Cashier']);
        $warehouse = Role::create(['name' => 'warehouseman', 'label' => 'Warehouseman']);

        // 2. Assign Permissions automatically (Optional initial setup)
        
        // Super Admin gets EVERYTHING
        $allPermissions = Permission::all();
        $superAdmin->permissions()->sync($allPermissions);

        // Encoder gets access to POS/Orders/Sales by default
        $encoderPermissions = Permission::whereIn('group_name', ['Main Pages', 'Accounting Pages'])->get();
        $encoder->permissions()->sync($encoderPermissions);
    }
}