<?php
use Larabill\Models\Branch;
use Illuminate\Database\Seeder;

class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
    * @return void
        */
        public function run()
    {
        $branches = [
            [
                'user_id' => 1,
                'name' => 'Main',
                'mobile' => '01911000000',
            ]
        ];

        foreach ($branches as $branch) {
            Branch::create($branch);
        }
    }
}
