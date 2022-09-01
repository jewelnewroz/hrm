<?php
namespace Database\Seeders;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
    * @return void
        */
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
                'name' => 'Technical',
                'code' => 'TECHNICAL'
            ],
            [
                'name' => 'Operations',
                'code' => 'OPD'
            ],
            [
                'name' => 'Call center',
                'code' => 'CCD'
            ],
            [
                'name' => 'Support',
                'code' => 'SUPPORT'
            ]
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
