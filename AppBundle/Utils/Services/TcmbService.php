<?php

namespace AppBundle\Utils\Services;
use AppBundle\Utils\Data\Tcmb;
use AppBundle\Utils\KurlarInterface;

/**
 * Created by PhpStorm.
 * User: burak
 * Date: 25.11.2017
 * Time: 18:03
 */
class TcmbService implements KurlarInterface
{


    public $service;

    public function __construct()
    {
        $this->service = new Tcmb();
    }

    public function fire(){
        $this->service->fire();
        return $this->service->doviz;
    }

}