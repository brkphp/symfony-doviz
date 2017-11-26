<?php

namespace AppBundle\Utils;
use AppBundle\Entity\Kur;
use Doctrine\ORM\EntityManager;

/**
 * Created by PhpStorm.
 * User: burak
 * Date: 25.11.2017
 * Time: 18:01
 */
class Kurlar
{

    private $entityManager;
    public $service;
    protected $update ;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function adapter(KurlarInterface $service)
    {
        $this->service = $service;
    }

    public function get(){
        $data =  $this->service->fire();
        $this->save($data);
    }

    private function save($data){
        if(!$kur = $this->entityManager->getRepository(Kur::class)->findOneByName($data["name"]))
            $kur = new Kur();
        else
            $this->update = true;
        $kur->setName($data["name"]);
        $kur->setDolar($data["dolar"]);
        $kur->setEuro($data["euro"]);
        if(!$this->update){
            $this->entityManager->persist($kur);
        }
        $this->entityManager->flush();
    }
}