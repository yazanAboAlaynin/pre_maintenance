<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       DB::table('admins')->insert([
           'name' => 'admin',
           'email' => 'admin@test.com',
           'password' => Hash::make('12345678'),
       ]);
    }
}
