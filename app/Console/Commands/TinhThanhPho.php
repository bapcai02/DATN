<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use DB;

class TinhThanhPho extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tinhtp:start';

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
        $url = "https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/province";

        $client = new Client([
            "base_uri" => $url,
            "headers" => [
                'Content-Type' => 'application/json',
                'Token' => $token,
            ]
        ]);

        $response = $client->request('GET', "https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/province", [
            'headers' => [
                'Content-Type' => 'application/json',
                'Token' => $token
            ]
        ]);

        $data = json_decode($response->getBody());
        
        foreach($data->data as $value){
            DB::table('api_tinhthanhpho')->insert([
                'matp' => $data->ProvinceID,
                'name' => $data->ProvinceName,
                "code" => $data->Code,
            ]);
            echo "thao tác thành phố => " . $val->ProvinceName . ": " .  $data->ProvinceID . "\n"; 
        }
        echo "thêm mới tỉnh thành phố thành công";
    }
}
