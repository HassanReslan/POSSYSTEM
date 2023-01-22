<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
          DB::table('users')->insert([
            'name' => 'Hassan',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'remember_token' =>'Ex2vo5i4XvQ5Lj3WH92wRaPh4yhdlutwpnjEY1ulJn2t0QK36rJBliuCuLbD',
            //'password' => '$2y$10$q1s3Ud488TSJzu8ArFBEZ.F4pRpNxu2b.ONev/n6xDj/7lnm6JcSK',
            'role'=>1,


        ]);
    }
}
