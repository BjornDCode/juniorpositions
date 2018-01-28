<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 10) as $i) {
            factory('App\Job')->create([
                'role_id' => mt_rand(1, 12)
            ])->each(function($foo) {
                $foo->skills()->save(factory('App\Skill')->make());
            });
        }
    }
}
