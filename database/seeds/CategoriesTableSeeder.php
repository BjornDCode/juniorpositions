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
            'Development',
            'Design',
            'Sales'
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'title' => $category,
                'slug' => str_slug($category),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
