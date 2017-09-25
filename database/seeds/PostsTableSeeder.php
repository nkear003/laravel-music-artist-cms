<?php

use Illuminate\Database\Seeder;

class ReleasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        factory(App\Release::class, 20)->create()->make();
/*        DB::table('releases')->insert([
            'name' => '',
            'released' => '',
            'genre' => '',
            'soundcloud_id' => '',
            'slug' => ''
        ]);*/
    }
}
