<?php
/**
 * Created by PhpStorm.
 * User: APPUSER3
 * Date: 02-02-2018
 * Time: 20:16
 */

namespace App\Traits;

use Illuminate\Contracts\Logging\Log;
use Illuminate\Support\Facades\Redirect;
use OVAC\HubtelPayment\Exception\HubtelException;
use OVAC\LaravelHubtelPayment\Facades\HubtelPayment;
use Prettus;


trait MerchantPaymentTrait
{
    public function receiveMoney($from,$amount, $description,$customer_name,$channel){
        // NOTE: The phone number must be of type string as Laravel considers all numbers with a leading 0 to be a hex number.
        $payment = HubtelPayment::ReceiveMoney()
            ->from($from)
            ->amount($amount)
            ->description($description)
            ->customerName($customer_name)
            ->channel($channel)
            ->run();

        if($payment){
           Prettus\RequestLogger\ResponseLogger::LOG_CONTEXT;
            return Redirect::to('http://green.dev:4400/api/v1/merchants/200');
        }else{
            return Redirect::to('http://green.dev:4400/api/v1/merchants/500');
        }
    }

    public function sendMoney($to,$amount, $description,$customer_email,$channel){
        // NOTE: The phone number must be of type string as Laravel considers all numbers with a leading 0 to be a hex number.
        $payment = HubtelPayment::SendMoney()
            ->to($to)                //- The phone number to send the prompt to.
            ->amount($amount)                    //- The exact amount value of the transaction
            ->description($description)    //- Description of the transaction.
            ->customerEmail($customer_email) //- Name of the person making the payment.
            ->channel($channel)                 //- The mobile network Channel.configuration
            ->run();                             //- Run the transaction after required data.
        //return $payment;
    }


    public function reverseMoney($transactionId,$amount,$client_ref, $description,$reason){
        $payment = HubtelPayment::Refund()
            ->transactionId($transactionId)               //- The ID of the transaction to refund.
            ->amount($amount)                    //- The exact amount value of the transaction
            ->clientReference($client_ref)         //- A refeerence on your end.
            ->description($description)   //- Description of the transaction.
            ->reason($reason)   //- Name of the person making the payment.
            ->full()                            //- Full or partial refund.
            ->run();                           //- Run the transaction after required data.
        //return $payment;
    }


}