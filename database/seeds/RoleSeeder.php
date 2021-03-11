<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => 1,
            'status' => 0,
            'display_name' => 'user',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('roles')->insert([
            'id' => 2,
            'status' => 1,
            'display_name' => 'customer',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('roles')->insert([
            'id' => 3,
            'status' => 2,
            'display_name' => 'admin',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
