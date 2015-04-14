<?php

// src/AppBundle/Neo4j/ConnectionBuilder.php
namespace AppBundle\Neo4j;

use Neoxygen\NeoClient\ClientBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConnectionBuilder extends Controller
{
    public function connectClient($protocol, $host, $port, $user, $pass)
    {
        $client = ClientBuilder::create()
            ->addConnection('default', $protocol, $host, $port, true, $user, $pass)
            ->build();

       return $client;
    }
}
