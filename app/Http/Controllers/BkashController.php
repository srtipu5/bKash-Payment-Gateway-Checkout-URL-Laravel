<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use URL;

class BkashController extends Controller
{
    private $base_url;
    private $username;
    private $password;
    private $app_key;
    private $app_secret;

    public function __construct()
    {
        env('SANDBOX') ? $this->base_url = 'https://tokenized.sandbox.bka.sh/v1.2.0-beta' : $this->base_url = 'https://tokenized.pay.bka.sh/v1.2.0-beta';
        $this->username = env('BKASH_USERNAME');
        $this->password  = env('BKASH_PASSWORD');
        $this->app_key = env('BKASH_APP_KEY');
        $this->app_secret  = env('BKASH_APP_SECRET');
    }

    public function authHeaders(){
        return array(
            'Content-Type:application/json',
            'Authorization:' .$this->grant(),
            'X-APP-Key:'. $this->app_key 
        );
    }
         
    public function curlWithBody($url,$header,$method,$body_data){
        $curl = curl_init($this->base_url.$url);
        curl_setopt($curl,CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl,CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl,CURLOPT_POSTFIELDS, $body_data);
        curl_setopt($curl,CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function grant()
    {
        $header = array(
                'Content-Type:application/json',
                'username:'.$this->username,
                'password:'.$this->password
                );

        $body_data = array('app_key'=> $this->app_key, 'app_secret'=> $this->app_secret);
    
        $response = $this->curlWithBody('/tokenized/checkout/token/grant',$header,'POST',json_encode($body_data));

        $token = json_decode($response)->id_token;

        return $token;
    }

    public function payment(Request $request)
    {
        return view('bkash.pay');
    }

    public function createPayment(Request $request)
    {
        if(!$request->amount || $request->amount < 1){
            return redirect()->route('url-pay');
        }

        $header =$this->authHeaders();
        $website_url = URL::to("/");


        $body_data = array(
            'mode' => '0011',
            'payerReference' => $request->payerReference ? $request->payerReference  : '1', // pass oderId or anything 
            'callbackURL' => $website_url.'/bkash/callback',
            'amount' => $request->amount,
            'currency' => 'BDT',
            'intent' => 'sale',
            'merchantInvoiceNumber' => $request->merchantInvoiceNumber ? $request->merchantInvoiceNumber : "Inv_".Str::random(6)
        );

        $response = $this->curlWithBody('/tokenized/checkout/create',$header,'POST',json_encode($body_data));

        return redirect((json_decode($response)->bkashURL));
    }

    public function executePayment($paymentID)
    {

        $header =$this->authHeaders();

        $body_data = array(
            'paymentID' => $paymentID
        );


        $response = $this->curlWithBody('/tokenized/checkout/execute',$header,'POST',json_encode($body_data));

        $res_array = json_decode($response,true);

        return $response;
    }

    public function queryPayment($paymentID)
    {

        $header =$this->authHeaders();

        $body_data = array(
            'paymentID' => $paymentID,
        );

        $response = $this->curlWithBody('/tokenized/checkout/payment/status',$header,'POST',json_encode($body_data));
        
        $res_array = json_decode($response,true);

         return $response;
    }

    public function callback(Request $request)
    {
        $allRequest = $request->all();

        if(isset($allRequest['status']) && $allRequest['status'] == 'failure'){
            return view('bkash.fail')->with([
                'response' => 'Payment Failed !!'
            ]);

        }else if(isset($allRequest['status']) && $allRequest['status'] == 'cancel'){
            return view('bkash.fail')->with([
                'response' => 'Payment Cancelled !!'
            ]);

        }else{
            
            $response = $this->executePayment($allRequest['paymentID']);

            $res_array = json_decode($response,true);
            
            if(array_key_exists("message",$res_array)){
                // if execute api failed to response
                sleep(1);
                $response = $this->queryPayment($allRequest['paymentID']);
                $res_array = json_decode($response,true);
            }

            if(array_key_exists("statusCode",$res_array) && $res_array['statusCode'] == '0000' && array_key_exists("transactionStatus",$res_array) && $res_array['transactionStatus'] == 'Completed'){

                return view('bkash.success')->with([
                    'response' => $res_array['trxID']
                ]);
            }
    
            return view('bkash.fail')->with([
                'response' => $res_array['statusMessage'],
            ]);

        }

        return view('bkash.fail')->with([
            'response' => 'Payment Failed !!',
        ]);

    }

    public function getRefund(Request $request)
    {
        return view('bkash.refund');
    }

    public function refundPayment(Request $request)
    {
        $header =$this->authHeaders();

        $body_data = array(
            'paymentID' => $request->paymentID,
            'trxID' => $request->trxID
        );

        $response = $this->curlWithBody('/tokenized/checkout/payment/refund',$header,'POST',json_encode($body_data));

        $res_array = json_decode($response,true);

        $message = "Refund Failed !!";

        if(!isset($res_array['refundTrxID'])){
            
            $body_data = array(
                'paymentID' => $request->paymentID,
                'amount' => $request->amount,
                'trxID' => $request->trxID,
                'sku' => 'sku',
                'reason' => 'Quality issue'
            );
    
            $response = $this->curlWithBody('/tokenized/checkout/payment/refund',$header,'POST',json_encode($body_data));
    
            $res_array = json_decode($response,true);

            // your database insert operation    

            $message = "Refund successful !!.Your Refund TrxID : ".$res_array['refundTrxID'];
        }else{
            $message = "Already Refunded !!.Your Refund TrxID : ".$res_array['refundTrxID'];
        }
        
        return view('bkash.refund')->with([
            'response' => $message,
        ]);
    }      
  
    public function searchTransaction(Request $request)  
    {

        $header =$this->authHeaders();

        $body_data = array(
            'trxID' => request->$trxID,
        );

        $response = $this->curlWithBody('/tokenized/checkout/general/searchTransaction',$header,'POST',json_encode($body_data));
        
        $res_array = json_decode($response,true);

        return $response;
    }
    
}
