<?php
/**
 * Created by PhpStorm.
 * User: burak
 * Date: 25.11.2017
 * Time: 18:53
 */

namespace AppBundle\Utils\Data;

use AppBundle\Utils\Core\Http;

class Tcmb
{
    public $doviz;

    function __construct()
    {
        $this->doviz["name"] = "tcmb";
    }

    /**
     * @return string|static
     */
    public function fire()
    {
        /** @var Http $content */
        $content = Http::_do("http://www.tcmb.gov.tr/kurlar/today.xml");

        $xml   =  (array) simplexml_load_string($content);


        foreach ($xml["Currency"] as $val) {
            $val = (array) $val;
            if ($val["@attributes"]["CurrencyCode"] == "USD") {
                $this->doviz["dolar"] = $val["BanknoteSelling"];
            }
            if ($val["@attributes"]["CurrencyCode"] == "EUR") {
                $this->doviz["euro"]  = $val["BanknoteSelling"];
            }
        }
        if (empty( $this->doviz["dolar"] ) or empty( $this->doviz["euro"] )) {
            return die(__CLASS__ . ' Kurlar alinamadi !');
        }

        return $this->doviz;
    }

}