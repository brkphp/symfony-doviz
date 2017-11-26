<?php
/**
 * Created by PhpStorm.
 * User: burak
 * Date: 25.11.2017
 * Time: 18:53
 */

namespace AppBundle\Utils\Data;

use AppBundle\Utils\Core\Http;

class Xrates
{
    public $doviz;

    function __construct()
    {
        $this->doviz["name"] = "xrates";
    }

    /**
     * @return string|static
     */
    public function fire()
    {

        /** @var Http $content  euro data al*/
        $euro = Http::_do("http://www.x-rates.com/calculator/?from=EUR&to=TRY&amount=1");
        preg_match_all('@<span class="ccOutputRslt">(.*?)<span (.*?)</span>@si',$euro,$euro);
        $euro = $euro[1][0];
        /** @var Http $content  dolar data al*/
        $dolar = Http::_do("http://www.x-rates.com/calculator/?from=USD&to=TRY&amount=1");
        preg_match_all('@<span class="ccOutputRslt">(.*?)<span (.*?)</span>@si',$dolar,$dolar);
        $dolar = $dolar[1][0];

        /*
         * Verileri diziye taşı
         */
        $this->doviz += ["euro" => $euro , "dolar" => $dolar];

        if (empty( $this->doviz["dolar"] ) or empty( $this->doviz["euro"] )) {
            return die(__CLASS__ . ' Kurlar alinamadi !');
        }

        return $this->doviz;
    }

}