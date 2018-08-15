<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->truncate();
        $faker = Faker::create("zh_TW");
        foreach (range(1,100) as $index) {
            DB::table("users")
              ->insert([
                  'name' => $faker->name,
                  'email' => $faker->email,
              ]);
        }
    }
}
