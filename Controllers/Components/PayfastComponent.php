<?php
/**
 * Created by PhpStorm.
 * User: berka
 * Date: 2017/11/30
 * Time: 20:10
 */

namespace controller\component;
use berkaPhp\controller\component\BerkaPhpComponent;

class PaypalComponent extends BerkaPhpComponent
{
    function __construct()
    {
        parent::__construct();

        $this->setName('Paypal');
        $this->setAuthor('Berka');
        $this->setDescription('');

    }

    private function urlSettings() {
        $settings = [
            'merchant_id' => '',
            'merchant_key' => '',
            'return_url' => 'http://www.yourdomain.co.za/thank-you.html',
            'cancel_url' => 'http://www.yourdomain.co.za/cancelled-transction.html',
            'notify_url' => 'http://www.yourdomain.co.za/itn.php'
        ];
    }

    private function getUserInfo() {
        $userInfo = [
            'name_first' => 'First Name',
            'name_last'  => 'Last Name',
            'email_address'=> 'valid@email_address.com'
        ];
    }

    private function getTransactionDetail() {
        $payment = [
            'm_payment_id' => '8542'
        ];
    }

    private function  getItems() {
        $cartTotal = 0;
        $items = [
            'amount' => number_format( sprintf( "%.2f", $cartTotal ), 2, '.', '' ),
            'item_name' => 'Item Name',
            'item_description' => 'Item Description',
            'custom_int1' => '9586', //custom integer to be passed through
            'custom_str1' => 'custom string is passed along with transaction to notify_url page'
        ];

    }

    private function getCreateString(){

        $paymentDetails = array_merge(urlSettings(), getUserInfo(), getTransactionDetail(), getItems());
        $pfOutput = "";

        foreach($paymentDetails as $key => $val )
        {
            if(!empty($val))
            {
                $pfOutput .= $key .'='. urlencode( trim( $val ) ) .'&';
            }
        }
// Remove last ampersand
        $getString = substr($pfOutput, 0, -1 );
        if( isset($passPhrase))
        {
            $getString .= '&passphrase='. urlencode(trim($passPhrase));
        }

        $paymentDetails['signature'] = md5( $getString );

        //https://developers.payfast.co.za/documentation/?php#pdt-deprecated

        return $getString;

    }

}



