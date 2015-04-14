<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }

    /**
     * @Route("/hello/{name}.{_format}",
     *     defaults = {"_format"="html"},
     *     requirements = { "_format" = "html|xml|json" },
     *     name = "hello"
     * )
     */
    public function helloAction($name, $_format)
    {
        return $this->render('AppBundle:Default:hello.'.$_format.'.twig', array(
            'name' => $name
        ));
    }

    /**
     * @Route("/everything", name="everything")
     */
    public function dbAction()
    {
        $client = $this->container->get('neo4j_client');
        $labels = $client->getLabels();
        $data = print_r($labels);
        return $this->render('AppBundle:Default:everything.php.twig', array('data' => $data));
    }
}
