<?php

use Illuminate\Database\Seeder;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genre')->insert([
            'name' => 'Action',
        ]);
        DB::table('genre')->insert([
            'name' => 'Adventure',
        ]);
        DB::table('genre')->insert([
            'name' => 'Comedy',
        ]);
        DB::table('genre')->insert([
            'name' => 'Nollywood',
        ]);
        DB::table('genre')->insert([
            'name' => 'Sci-Fi',
        ]);
        DB::table('genre')->insert([
            'name' => 'Family',
        ]);
        DB::table('genre')->insert([
            'name' => 'Animation',
        ]);
        DB::table('genre')->insert([
            'name' => 'Romance',
        ]);
        DB::table('genre')->insert([
            'name' => 'Thriller',
        ]);
    }
}
