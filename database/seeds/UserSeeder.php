<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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
            'id' => 1,
            'name' => 'Admin',
            'email' => 'hadv62@wru.vn',
            'password' => Hash::make('123456'),
            'role_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Customer',
            'email' => 'customer@2nf.com.vn',
            'password' => Hash::make('123456'),
            'role_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
