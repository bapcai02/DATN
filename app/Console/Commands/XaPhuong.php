<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use DB;

class XaPhuong extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xaphuong:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $token = "bf76117c-97a5-11eb-8be2-c21e19fc6803";
        $url = "https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/ward";
        $client = new Client([
            "base_uri" => $url,
            "headers" => [
                'Content-Type' => 'application/json',
                'Token' => $token,
            ]
        ]);
        $quanhuyen = DB::table('api_quanhuyen')->get();

        if( $quanhuyen == null){
            echo "tỉnh thành phố không có dữ liệu";
        }else{
            foreach($quanhuyen as $value){
                $body = json_encode([
                    "district_id" => $value->maqh
                ]);
        
                $response = $client->request('GET', "https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/ward", [
                    'body' => $body,
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Token' => $token
                    ]
                ]);
        
                $data = json_decode($response->getBody());
                if($data->data != null){
                    foreach($data->data as $val){
                        DB::table('api_xaphuongthitran')->insert([
                            'maxptr' => $val->WardCode,
                            'maqh' => $val->DistrictID,
                            'name' => $val->WardName,
                        ]);  
                        echo "thao tác maxptr => " . $val->DistrictID . ": " . $val->WardName  . "\n";         
                    }
                }else{
                    echo "dữ liệu không tồn tại !" . "\n";
                }
            }  
            echo "thao tác thành công";
        }
    }
}