<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Development' => [
                'Front End',
                'Back End',
                'Software',
                'Mobile'
            ],
            'Design' => [
                'UI',
                'Web',
                'Graphic',
                'UX'
            ],
            'Sales' => [
                'Development',
                'Executive',
                'Director',
                'Account'
            ]
        ];

        foreach ($categories as $category => $roles) {
            $id = DB::table('categories')->insertGetId([
                'title' => $category,
                'slug' => str_slug($category),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            foreach ($roles as $role) {
                DB::table('roles')->insert([
                    'name' => $role,
                    'slug' => str_slug($role),
                    'category_id' => $id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }

        }
    }
}
