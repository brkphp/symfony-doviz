<?php
/**
 * Created by PhpStorm.
 * User: burak
 * Date: 25.11.2017
 * Time: 18:27
 */

namespace AppBundle\Utils\Core;


class Http
{

    public static function _do($url){

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "utf-8",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return die(__CLASS__ . ' Veriler alinamadi !');
        } else {
            return $response;
        }
    }

}