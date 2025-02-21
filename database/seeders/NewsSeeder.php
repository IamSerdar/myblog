<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $userIds = User::pluck('id')->toArray();

        for ($i = 0; $i < 12; $i++) {
            DB::table('news')->insert([
                'name' => $faker->sentence,
                'description' => $faker->paragraph,
                'image' => $faker->imageUrl(640, 480, 'images/news', true),
                'author_id' => $faker->randomElement($userIds), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
