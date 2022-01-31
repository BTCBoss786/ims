<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "User",
            'email' => "user@ims.local",
            'email_verified_at' => now(),
            'password' => Hash::make('1234'),
            'validity' => Carbon::createFromDate(2022, 3, 31),
            'remember_token' => Str::random(10)
        ]);
    }
}
