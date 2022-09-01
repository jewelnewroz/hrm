<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Seeder;

class DesignationTableSeeder extends Seeder
{
    public function run()
    {
        $designations = [
            [
                'name' => 'Admin',
                'code' => 'AD',
                'department_id' => 1
            ],
            [
                'name' => 'Human Resource',
                'code' => 'HR',
                'department_id' => 2
            ],
            [
                'name' => 'Audit officer',
                'code' => 'AO',
                'department_id' => 2
            ],
            [
                'name' => 'General Manager',
                'code' => 'GM',
                'department_id' => 3
            ],
            [
                'name' => 'Office Executive',
                'code' => 'OE',
                'department_id' => 3
            ]
        ];

        foreach ($designations as $designation) {
            Designation::create($designation);
        }
    }
}
