<?php

namespace Database\Seeders;

use App\Models\Klien;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = new User();
        // $user->name = "Admin";
        // $user->email = "admin@admin.com";
        // $user->email_verified_at = now();
        // $user->password = '$2y$10$IABORTlOZacwiv.2fbsU9.6sSyXPKq1AdfphCyil.Zix71UaTf2YW';
        // $user->save();



        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 50; $i++) {
            Klien::insert([
                'nama' => $faker->name,
                'hp' => $faker->numberBetween(8000, 9000),
                'alamat' => $faker->address,
                'user_id' => 1,
                'created_at' => $faker->dateTimeBetween('-5 days', now())
            ]);
        }
    }
}
