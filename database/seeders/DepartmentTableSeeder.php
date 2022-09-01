<?php
namespace Database\Seeders;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    public function run()
    {
        $departments = [
            [
                'name' => 'Admin',
                'code' => 'ADMIN'
            ],
            [
                'name' => 'Human Resource',
                'code' => 'HR'
            ],
            [
                'name' => 'Billing',
                'code' => 'BILLING'
            ],
            [
                'name' => 'Operations',
                'code' => 'OPD'
            ],
            [
                'name' => 'Call center',
                'code' => 'CCO'
            ]
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
