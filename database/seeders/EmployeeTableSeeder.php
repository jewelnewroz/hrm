<?php

namespace Database\Seeders;

use Faker\Generator;
use App\Models\Employee;
use Illuminate\Container\Container;
use Illuminate\Database\Seeder;
use App\Models\User;

class EmployeeTableSeeder extends Seeder
{
    protected $faker;

    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    public function run()
    {
        User::factory()->count(100)->create()->each(function($user) {
            $user->assignRole('employee');
            Employee::create([
                'user_id' => $user->id,
                'date_of_birth' => $this->faker->dateTimeBetween('1990-01-01', '2000-12-31')->format('Y-m-d'),
                'present_address' => $this->faker->address,
                'permanent_address' => $this->faker->address,
                'department_id' => 3,
                'designation_id' => mt_rand(4, 5),
                'joining_date' => $this->faker->dateTimeBetween('2015-01-01', '2021-12-31')->format('Y-m-d')
            ]);
        });
    }
}
