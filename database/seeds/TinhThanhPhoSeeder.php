<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TinhThanhPhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('builders')->insert([
            'name' => '明久門',
            'login_id' => 2,
            'postal_code' => '418-1040',
            'address' => 'トウキョウト,ミナトク,ロッポンギ',
            'phone' => '0146546451313',
            'fax' => '3510212314312',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
