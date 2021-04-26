<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use DB;
use Illuminate\Http\Request;
use App\Repositories\OrderRepository;

class PaymentController extends Controller
{
    protected $orderRepository;

    public function __construct(
        OrderRepository $orderRepository
    )
    {
        $this->orderRepository = $orderRepository;
    }

    public function payment(Request $request)
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        /**
         * Description of vnpay_ajax
         *
         * @author xonv
         */
        $vnp_TmnCode = "2HRPWANV"; //Mã website tại VNPAY 
        $vnp_HashSecret = "IDMHZSLSIHFONDSCQPMWMLZAZORCZLIJ"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://datn.com.vn:8000/vnpay_php/return";

        $vnp_TxnRef = $_POST['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $_POST['order_desc'];
        $vnp_OrderType = $_POST['order_type'];
        $vnp_Amount = $_POST['amount'] * 100;
        $vnp_Locale = $_POST['language'];
        $vnp_BankCode = $_POST['bank_code'];
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
        // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            
        return redirect($vnp_Url);
    }

    public function getPayment(Request $request)
    {
        $data = $request->all();

        $tp = DB::table('api_tinhthanhpho')->where('matp', $data['thanhpho'])->first();
        $qh = DB::table('api_quanhuyen')->where('maqh', $data['quanhuyen'])->first();
        $xp = DB::table('api_xaphuongthitran')->where('maxptr', $data['xaphuong'])->first();
        $userCart = DB::table('carts')->where('id', $data['cartuserID'])->first();

        $address = $xp->name . ", " . $qh->name . ", " . $xp->name;

        $datas =  [
            "cod_amount" => $userCart->price,
            "payment_type_id"=> 2,
            "note"=> $data['note'],
            "required_note"=> "CHOXEMHANGKHONGTHU",
            "to_name"=> $data['name'],
            "to_phone"=> $data['phone'],
            "to_address"=> $address,
            "weight"=> 200,
            "length"=> 1,
            "width"=> 19,
            "height"=> 10,
            "deliver_station_id"=> 2,
            "service_id"=> 0,
            "service_type_id"=> 2,
            "order_value"=> 130000,
            "to_ward_code"=> "20308",
            "items"=> [
                [
                    "name"=> $userCart->name, 
                    "quantity"=> $userCart->qty, 
                    "price"=>  $userCart->price
                ]
            ]
        ];
        $cart = [
            'total' =>  $userCart->price,
            'product_id' => $data['productId'],
            'cart_id' => $data['cartuserID'],
            'address'=> $address,
        ];

        $request->session()->put('order', $datas);
        $request->session()->put('cart', $cart);

        return view('fontend.vnpay_php.index');
    }

    public function returnUrl(Request $request)
    {
        $data = $request->all();
        $token = "bf76117c-97a5-11eb-8be2-c21e19fc6803";
        $client = new Client([
            "base_uri" => "https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/create",
            "headers" => [
                'Content-Type' => 'application/json',
                'Token' => $token,
                'ShopId' => '78746'
            ]
        ]);
        $url = "https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/create";
        $headers = [
            'Content-Type' => 'application/json',
            'Token' => $token,
            'ShopId' => '78746'
        ];
        $body = json_encode($request->session()->get('order'));

        $response = $client->request('POST', $url, [
            'body' => $body,
            'headers' => $headers
        ]);

        $data = json_decode($response->getBody(), true);
        $cart = $request->session()->get('cart');
        $ordercode = $data['data']['order_code'];

        $this->orderRepository->orderByPayment($ordercode, $cart);

        $request->session()->forget('cart');
        $request->session()->forget('order');

        return view('fontend.vnpay_php.vnpay_return');
    }
}
