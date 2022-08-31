<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'administrator-list',
            'administrator-create',
            'administrator-edit',
            'administrator-show',
            'administrator-delete',
            'package-list',
            'package-create',
            'package-edit',
            'package-show',
            'package-delete',
            'package-export',
            'package-import',
            'customer-list',
            'customer-create',
            'customer-edit',
            'customer-show',
            'customer-action',
            'customer-active',
            'customer-inactive',
            'customer-reactive',
            'customer-delete',
            'customer-export',
            'customer-import',
            'customer-send-sms',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-show',
            'permission-delete',
            'area-list',
            'area-generate',
            'area-edit',
            'area-show',
            'area-delete',
            'area-export',
            'area-import',
            'bill-list',
            'bill-generate',
            'bill-edit',
            'bill-delete',
            'bill-show',
            'bill-export',
            'bill-import',
            'bill-summary',
            'payment-list',
            'payment-create',
            'payment-generate',
            'payment-edit',
            'payment-delete',
            'payment-show',
            'payment-export',
            'payment-import',
            'payment_summary',
            'fund-list',
            'fund-create',
            'employee-list',
            'employee-create',
            'employee-edit',
            'employee-show',
            'employee-delete',
            'designation-list',
            'designation-create',
            'designation-edit',
            'designation-show',
            'designation-delete',
            'department-list',
            'department-create',
            'department-edit',
            'department-show',
            'department-delete',
            'service-charge-list',
            'service-charge-add',
            'service-charge-edit',
            'service-charge-active',
            'service-charge-inactive',
            'service-charge-delete',
            'discount-list',
            'discount-create',
            'discount-edit',
            'discount-active',
            'discount-inactive',
            'reseller-list',
            'reseller-create',
            'reseller-edit',
            'reseller-show',
            'reseller-action',
            'reseller-delete',
            'router-list',
            'router-create',
            'router-edit',
            'router-delete',
            'mikrotik-summary',
            'mikrotik-statistics',
            'mikrotik-clients',
            'mikrotik-active-clients',
            'mikrotik-logs',
            'report-list',
            'report-btrc',
            'report-new-customer',
            'report-close-customer',
            'report-expense',
            'report-due-bill',
            'expense-list',
            'expense-summary',
            'expense-add',
            'expense-edit',
            'expense-delete',
            'ticket-list',
            'ticket-create',
            'ticket-accept',
            'ticket-view',
            'ticket-action',
            'request-list',
            'request-create',
            'request-delete',
            'request-action',
            'request-accept',
            'request-decline'
        ];

        $role = Role::where('name', 'super_admin')->first();

        foreach ($permissions as $permission) {
            $permission = Permission::create(['name' => $permission]);
            $permission->assignRole($role);
        }
    }
}