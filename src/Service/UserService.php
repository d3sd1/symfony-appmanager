<?php

namespace App\Service;


use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

class UserService
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

    public function isLoggedIn()
    {
        return $this->container->get('session')->get('woLoginMicrosite') != null;
    }

    public function getSessionUser()
    {
        return $dbUser = $this->em->getRepository('App:Usuario')
            ->find($this->container->get('session')->get('woLoginMicrosite'));
    }
}