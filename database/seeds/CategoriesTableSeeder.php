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
        DB::table('categories')->insert([
            'name' => 'Release',
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Post',
        ]);
           
        DB::table('categories')->insert([
            'name' => 'WM',
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Poster',
        ]);
        
        DB::table('categories')->insert([
            'name' => '',
        ]);
    }
}
