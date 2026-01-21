<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            // --- GROUP 1: MAIN PAGES ---
            ['name' => 'access_dashboard', 'label' => 'Can access Dashboard Page', 'group_name' => 'Main Pages'],
            ['name' => 'access_all_inventory', 'label' => 'Can access ALL Inventory Pages', 'group_name' => 'Main Pages'],
            ['name' => 'access_orders', 'label' => 'Can access Orders Page', 'group_name' => 'Main Pages'],
            ['name' => 'access_all_accounting', 'label' => 'Can access ALL Accounting Pages', 'group_name' => 'Main Pages'],
            ['name' => 'access_all_account_mgmt', 'label' => 'Can access ALL Account Pages', 'group_name' => 'Main Pages'],

            // --- GROUP 2: INVENTORY PAGES ---
            ['name' => 'view_current_stocks', 'label' => 'Can access Current Stocks Page', 'group_name' => 'Inventory Pages'],
            ['name' => 'view_for_release', 'label' => 'Can access For Release Page', 'group_name' => 'Inventory Pages'],
            ['name' => 'manage_products', 'label' => 'Can access Product Page', 'group_name' => 'Inventory Pages'],
            ['name' => 'manage_suppliers', 'label' => 'Can access Suppliers & Branches Page', 'group_name' => 'Inventory Pages'],

            // --- GROUP 3: ACCOUNT MANAGEMENT ---
            ['name' => 'manage_employees', 'label' => 'Can access Employees Page', 'group_name' => 'Account Management Pages'],
            ['name' => 'manage_agents', 'label' => 'Can access Agents & Dealers Page', 'group_name' => 'Account Management Pages'],
            ['name' => 'manage_coops', 'label' => 'Can access Cooperatives Page', 'group_name' => 'Account Management Pages'],
            ['name' => 'manage_blo', 'label' => 'Can access Big Land Owners Page', 'group_name' => 'Account Management Pages'],

            // --- GROUP 4: ACCOUNTING PAGES ---
            ['name' => 'view_customer_ledger', 'label' => 'Can access Customer Ledger Page', 'group_name' => 'Accounting Pages'],
            ['name' => 'manage_cheques', 'label' => 'Can access Cheques Page', 'group_name' => 'Accounting Pages'],
            ['name' => 'view_sales', 'label' => 'Can access Sales Page', 'group_name' => 'Accounting Pages'],
            ['name' => 'view_expenses', 'label' => 'Can access Expenses Page', 'group_name' => 'Accounting Pages'],
            ['name' => 'manage_returns', 'label' => 'Can access Returns & Exchanges Page', 'group_name' => 'Accounting Pages'],
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm['name']], $perm);
        }
    }
}