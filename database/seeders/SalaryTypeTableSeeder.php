<?php

namespace Database\Seeders;

use App\Models\SalaryType;
use Illuminate\Database\Seeder;

class SalaryTypeTableSeeder extends Seeder
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
                'label' => 'basic',
                'name' => 'Basic',
                'amount' => 50
            ],
            [
                'label' => 'medical_allowance',
                'name' => 'Medical Allowance',
                'amount' => 10
            ],
            [
                'label' => 'conveyance_allowance',
                'name' => 'Conveyance Allowance',
                'amount' => 10
            ],
            [
                'label' => 'child_education',
                'name' => 'Child Education',
                'amount' => 10
            ],
            [
                'label' => 'child_hostel_allowance',
                'name' => 'Child Hostel Allowance',
                'amount' => 5
            ],
            [
                'label' => 'provident_fund',
                'name' => 'Provident Fund',
                'amount' => 7,
                'credibility' => 'debit'
            ],
            [
                'label' => 'health_insurance',
                'name' => 'Health Insurance',
                'amount' => 8,
                'credibility' => 'debit'
            ],
        ];

        foreach($types as $type) {
            SalaryType::create($type);
        }
    }
}
