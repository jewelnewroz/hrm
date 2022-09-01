<?php
namespace Database\Seeders;

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
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-show',
            'permission-delete',
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
            'report-list',
            'report-download',
            'report-export',
            'expense-list',
            'expense-summary',
            'expense-add',
            'expense-edit',
            'expense-delete',
            'ticket-list',
            'ticket-create',
            'ticket-accept',
            'ticket-view',
            'ticket-action'
        ];

        $role = Role::where('name', 'admin')->first();

        foreach ($permissions as $permission) {
            $permission = Permission::create(['name' => $permission]);
            $permission->assignRole($role);
        }
    }
}
