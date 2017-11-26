<?php

namespace AppBundle\Utils\Services;
use AppBundle\Utils\Data\Xrates;
use AppBundle\Utils\KurlarInterface;

/**
 * Created by PhpStorm.
 * User: burak
 * Date: 25.11.2017
 * Time: 18:03
 */
class XratesService implements KurlarInterface
{


    public $service;

    public function __construct()
    {
        $this->service = new Xrates();
    }

    public function fire(){
        $this->service->fire();
        return $this->service->doviz;
    }

}