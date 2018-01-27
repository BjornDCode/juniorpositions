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
        factory('App\Job', 10)->create([
            'role_id' => mt_rand(1,4)
        ])->each(function($foo) {
            $foo->skills()->save(factory('App\Skill')->make());
        });
    }
}
