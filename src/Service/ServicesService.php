<?php

namespace App\Service;


use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

class ServicesService
{
    /**
     * @var Container
     */
    private $container;
    private $em;

    /**
     * Constructor
     *
     * @param Container $container
     */
    public function __construct(Container $container, EntityManager $em)
    {
        $this->container = $container;
        $this->em = $em;
    }

}