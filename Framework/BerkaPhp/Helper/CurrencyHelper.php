<?php
namespace BerkaPhp\Helper;
use \BerkaPhp\Helper\SessionHelper;

class Currency {

    /*
	* Creates an input field
	* @param  label of the input and an array of attributes
	* @return input field
	* @author berkaPhp Ayowa
	*/
    private $amount;
    private $base;
    private $url;
    private static $instance;

    private function __construct($amount) {

        $this->amount = $amount;
        $this->base = 'ZAR';
        $this->url = 'api.fixer.io/latest?base='.$this->base;

    }

    public function updateAmount($amount) {
        $this->amount = $amount;
    }

    public static function Init($amount = 1) {

        if(!isset(self::$instance)) {
            self::$instance = new Currency($amount);
        }

        self::$instance->updateAmount($amount);
        return self::$instance;

    }

    public function updateCurrency($currency) {

        try {
            $curl = curl_init();

            if (FALSE === $curl)
                throw new \Exception('failed to initialize');

            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $this->url,
                CURLOPT_USERAGENT => 'Codular Sample cURL Request'
            ));

            $resp = json_decode(curl_exec($curl));

            if (FALSE === $resp)
                throw new \Exception(curl_error($curl), curl_errno($curl));

        } catch(\Exception $e) {

            trigger_error(sprintf(
                    'Curl failed with error #%d: %s',
                    $e->getCode(), $e->getMessage()),
                E_USER_ERROR);

        }

        curl_close($curl);

        $currencyArray = [
            'symbol' => $currency,
            'rate' => $currency != $this->base ? $resp->rates->{$currency} : 1
        ];

        if(!SessionHelper::exist('currency')){
            SessionHelper::add('currency', $currencyArray);
        } else {
            SessionHelper::update('currency', $currencyArray);
        }

        return true;
    }

    public function convert() {

        if(!SessionHelper::exist('currency')){

            $this->updateCurrency($this->base);
            $this->convert();

        } else {

            $currency = SessionHelper::get('currency');
            $convertedAmount = (float)$this->amount * $currency['rate'];

            return ['convertedAmount' => $convertedAmount, 'symbol' => $currency['symbol']];

        }

    }

    public static function getCurrentCurrency() {

        if(!SessionHelper::exist('currency')){

            \berkaPhp\helpers\Currency::Init()->updateCurrency('ZAR');
            self::getCurrentCurrency();

        } else {

            return SessionHelper::get('currency')['symbol'];

        }

    }

    public function toString() {
        $result = $this->convert();
        return $result['symbol'].' ' .round($result['convertedAmount'], 2);
    }

}

?>
