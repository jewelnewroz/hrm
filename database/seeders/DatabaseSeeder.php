<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CurrencyTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(DesignationTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SalaryTypeTableSeeder::class);
        $this->call(LeaveTypeTableSeeder::class);
        $this->call(EmployeeTableSeeder::class);
    }
}
