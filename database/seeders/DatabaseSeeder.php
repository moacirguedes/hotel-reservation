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
        $this->call([
            UserSeeder::class,
            HotelSeeder::class,
            RoomSeeder::class
        ]);

        DB::table('users')->insert([
            'name' => 'Manager',
            'email' => 'user@manager.com',
            'password' => Hash::make('password'),
            'isManager' => true,
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Client',
            'email' => 'user@client.com',
            'password' => Hash::make('password'),
            'isManager' => true,
            'remember_token' => Str::random(10),
        ]);
    }
}
