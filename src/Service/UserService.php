<?php

namespace App\Service;


use Symfony\Component\DependencyInjection\Container;

class UserService
{
    /**
     * @var Container
     */
    private $container;

    /**
     * Constructor
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function isLoggedIn()
    {
        return $this->container->get('session')->get('woLoginMicrosite') != null;
    }
}