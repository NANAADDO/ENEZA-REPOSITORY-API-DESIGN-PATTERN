<?php

namespace App\Traits;
use App\Constants\StatusCodes;
use App\GuzzleClient;

trait SendMoney
{


    public function WIGAL_SEND_MONEY($from,$amount, $description,$customer_name,$channelID,$ref){

        $channel= $channelID;
        $data = '
        {

"username":"BITLOGIC_PAY",
"walletnumber":"'.$from.'",
"network":"'.$channel.'",
"clienttransid":"'.$ref.'",
"amount":"'.$amount.'",
"nickname":"'.$customer_name.'",
"description":"'.$description.'"
}';
        // return response($data);
        $respons = new GuzzleClient();
        $endpoint= 'https://payments.wigalsolutions.com/payout/';
        $authtype = 'apikey';
        $type ="";
        $datatoken ='PpxkQA8WCC7os95rYKAp//yiDpgucL1Ae2+Y/+r6ygk=';
        $res = $respons->POSTING_TRANSACTION_TO_GATEWAYS_CURL($endpoint,$data,$datatoken,$type,$authtype);

    }

    /**************ALEX PAY GATEWAY******************************/
    public function ALEXPAY_GATEWAY_SEND($phone_number,$to,$amount,$momoname,$ref,$clientref,$descrip){
        $respons = new GuzzleClient();
        $authendpoint= 'https://api-sandbox.alexpay.africa/authenticate';
        $authusername ='sandbox1';
        $authpass= 'sandbox1';
        $type ="Bearer";
        $authtype = 'authorization';
        $authbasictoken ='Z3JleTpwYXJyb3Q=';
        $datatoken= $respons->GATEWAY_AUTHENTICATION_TOKEN($authendpoint,$authusername,$authpass,$authbasictoken);
        //return $this->ok($datatoken);


        /*****************INITIATING PAYMENT FROM ALEX PAY*********/
        $endpoint = 'https://api-sandbox.alexpay.africa/fundstransfer';
        $name = $momoname;
        $newNumber = preg_replace('/^0?/', '233',$phone_number);
        $receiver = preg_replace('/^0?/', '233',$to);



      $alexdata=  '{
    "meta": {
        "batchID": "'.$ref.'",
        "channel": "WEB",
        "async": true,
        "webhook": "http://bitlogictech.com:6074/api/secondary"
    },
    "data": [
        {
            "traceID": "'.$ref.'",
            "payerName": "'.$name.'",
            "payerPhoneNumber": "'.$newNumber.'",
            "payerEmail": "mikebergafu@gmail.com",
            "amount": '.$amount.',
            "currency": "GHS",
            "narration": [
                "Transfer"
            ],
            "debitAccount": {
                "type": "MTN_MOBILE_MONEY",
                "accountNumber": "'.$newNumber.'",
                "narration": [
                    "Transfer to Prof"
                ],
                "country": "GH"
            },
            "creditAccount": {
                "type": "MTN_MOBILE_MONEY",
                "accountNumber": "'.$receiver.'",
                "narration": [
                    "Transfer from PK Anane",
                    "AlexPay"
                ],
                "country": "GH",
                "beneficiary": {
                    "name": "'.$name.'",
                    "phoneNumber": "'.$receiver.'",
                    "email": "prof@gmail.com"
                }
            }
        }
    ]
}';

        $res = $respons->POSTING_TRANSACTION_TO_GATEWAYS_CURL($endpoint,$alexdata,$datatoken,$type,$authtype);



return $res;




    }

}