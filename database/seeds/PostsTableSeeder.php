<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        factory(App\Post::class, 20)->create()->make();
/*        DB::table('posts')->insert([
            'name' => '',
            'released' => '',
            'genre' => '',
            'soundcloud_id' => '',
            'slug' => ''
        ]);*/
    }
}
