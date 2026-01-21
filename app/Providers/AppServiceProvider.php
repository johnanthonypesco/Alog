<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Permission;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 1. Prevent crash if table doesn't exist (e.g. during migration)
        if (Schema::hasTable('permissions')) {

            // 2. SUPER ADMIN BYPASS:
            // If the role is 'super_admin', allow EVERYTHING instantly.
            Gate::before(function ($user, $ability) {
                if ($user->role && $user->role->name === 'super_admin') {
                    return true;
                }
            });

            // 3. FETCH ALL PERMISSIONS
            // We get all permissions so we can define a Gate for each one.
            $permissions = Permission::all();

            foreach ($permissions as $permission) {
                
                // Define the Gate: e.g. Gate::define('view_current_stocks', ...)
                Gate::define($permission->name, function ($user) use ($permission) {
                    
                    // A. Check if the user has this EXACT permission explicitly
                    if ($user->hasPermission($permission->name)) {
                        return true;
                    }

                    // B. "MASTER KEY" LOGIC (The "ALL" Checkboxes)
                    // If user doesn't have the specific permission, check if they have the "Group Master Key"
                    
                    // Inventory Group Master Key
                    if ($permission->group_name === 'Inventory Pages' && $user->hasPermission('access_all_inventory')) {
                        return true;
                    }

                    // Accounting Group Master Key
                    if ($permission->group_name === 'Accounting Pages' && $user->hasPermission('access_all_accounting')) {
                        return true;
                    }

                    // Account Management (Employees/Agents) Master Key
                    if ($permission->group_name === 'Account Management Pages' && $user->hasPermission('access_all_account_mgmt')) {
                        return true;
                    }

                    return false;
                });
            }
        }
    }
}