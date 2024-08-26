<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        /*
        DB::table( 'users' )->insert( [
            'name' => Str::random(10),
            'email' => Str::random(10).'@email.com',
            'password' => Hash::make('password'),
        ]);
        */

        User::factory( 10 )
        ->hasClient(1)
        ->create();

    }
}