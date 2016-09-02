<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker = Faker::create('App\Post');

        for($i = 1; $i <= 10; $i ++){
        	DB::table('posts')->insert([
        	'title' => $faker->sentence,
        	'body' => implode($faker->paragraphs(5)),
        	'created_at'=> \Carbon\Carbon::now(),
        	'updated_at'=> \Carbon\Carbon::now(),
        	'user_id' => $faker->numberBetween($min = 1, $max = 9),
        	'photo_id' => $faker->numberBetween($min = 1, $max = 9),

        	]);

        }

        
    }
}
