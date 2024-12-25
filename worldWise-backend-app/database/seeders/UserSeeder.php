<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('user')->insert([
        //   'name' => 'Jonas schmidtmann',
        //   'user_name' => 'Jonas.io',
        //   'email' => 'Jonas.schmidtmann@gmail.io',
        //   'password' => bcrypt('Nopassword&123!'),
        //   'city' => 'Lisbon',
        //   'country' => 'Portugal',
        //   'profile_img' => '',
        // ]);

        // create 10 fake users
        User::factory(10)->create();
    }

}
