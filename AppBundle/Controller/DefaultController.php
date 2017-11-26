<?php

namespace AppBundle\Controller;

use AppBundle\Utils\Kurlar;
use AppBundle\Utils\Services\TcmbService;
use AppBundle\Utils\Services\XratesService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager(); // ...or getEntityManager() prior to Symfony 2.1
        $connection = $em->getConnection();
        /*
         * En ucuz dolar kuru hangi satırda bul
         */
        $statement = $connection->prepare("SELECT name,dolar FROM kurlar where dolar =  ( SELECT MIN(dolar) FROM kurlar )");
        $statement->execute();
        $dolar = $statement->fetchAll();
        $connection = $em->getConnection();
        /*
         * En ucuz euro kuru hangi satırda bul
         */
        $statement = $connection->prepare("SELECT name,euro FROM kurlar where euro =  ( SELECT MIN(euro) FROM kurlar )");
        $statement->execute();
        $euro = $statement->fetchAll();
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'dolar' => $dolar[0],
            'euro' => $euro[0]
        ));
    }
    /**
     * @Route("/fe", name="fe")
     */
    public function feAction(){
       /*
        $em = $this->getDoctrine()->getManager();
        $kurlar = new Kurlar($em);
        $kurlar->adapter(new XratesService());
        $kurlar->get();
       */



    }



}
