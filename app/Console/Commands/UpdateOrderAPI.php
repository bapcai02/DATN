<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use DB;

class UpdateOrderAPI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:start';

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
        $project = DB::table('orders')->get();
        $token = "bf76117c-97a5-11eb-8be2-c21e19fc6803";

        $client = new Client([
            "base_uri" => "https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/detail",
            "headers" => [
                'Content-Type' => 'application/json',
                'Token' => $token,
            ]
        ]);
        $url = "https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/detail";
        $headers = [
            'Content-Type' => 'application/json',
            'Token' => $token,
        ];
       
        foreach($project as $val){
            $body = json_encode([
                "order_code" => $val->Order_Code
            ]);

            $response = $client->request('POST', $url, [
                'body' => $body,
                'headers' => $headers
            ]);

            $data = json_decode($response->getBody(), true);
            if($data['code'] == 200){
                if($data['data']['status'] == "ready_to_pick"){
                    DB::table('orders')->where('id', $val->id)->update([
                        "status" => 1,
                    ]);
                }else if($data['data']['status'] == "picked"){
                    DB::table('orders')->where('id', $val->id)->update([
                        "status" => 2,
                    ]);
                }else if($data['data']['status'] == "storing"){
                    DB::table('orders')->where('id', $val->id)->update([
                        "status" => 3,
                    ]);
                }else if($data['data']['status'] == "return"){
                    DB::table('orders')->where('id', $val->id)->update([
                        "status" => 4,
                    ]);
                }

                echo date("Y-m-d H:i:s") . ': '. "update mã đơn hàng " . $val->Order_Code . " thành công" . "\n"; 
            }else{
                echo date("Y-m-d H:i:s") .': '. "update false". $val->Order_Code ."\n"; 
            }
        }
    }
}
