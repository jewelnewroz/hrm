<?php

namespace Database\Seeders;

use App\Models\LeaveType;
use Illuminate\Database\Seeder;

class LeaveTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'Casual',
                'period' => 'provision',
                'total' => 5
            ],
            [
                'name' => 'Casual',
                'period' => 'permanent',
                'total' => 10
            ],
            [
                'name' => 'Medical',
                'period' => 'permanent',
                'total' => 10
            ],
            [
                'name' => 'Annual',
                'period' => 'permanent',
                'total' => 20
            ],
            [
                'name' => 'Earned',
                'period' => 'permanent',
                'total' => 10
            ]
        ];

        foreach($types as $type) {
            LeaveType::create($type);
        }
    }
}
