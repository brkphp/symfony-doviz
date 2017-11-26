<?php
// src/AppBundle/Command/KurCommand.php

namespace AppBundle\Command;

use AppBundle\Utils\Kurlar;
use AppBundle\Utils\Services\TcmbService;
use AppBundle\Utils\Services\XratesService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class KurCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('kur:guncelle')
            ->setDescription('Entegre edilmiş servislerdeki para değerlerini günceller');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Kurlar Güncelleniyor.'
        ]);
        $container = $this->getApplication()->getKernel()->getContainer();

        $em = $container->get('doctrine')->getEntityManager();
        /*
         * Xrates Güncelle
         */
        $kurlar = new Kurlar($em);
        $kurlar->adapter(new XratesService());
        $kurlar->get();
        /*
         * Tcmb Güncelle
         */
        $kurlar = new Kurlar($em);
        $kurlar->adapter(new TcmbService());
        $kurlar->get();

    }
}