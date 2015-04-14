<?php

// src/AppBundle/Menu/MenuBuilder.php
namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class MenuBuilder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');

        $menu->addChild('Home', array('route' => 'homepage'))
            ->setAttribute('icon', 'fa fa-home');

        $menu->addChild('Everything', array('route' => 'everything'))
            ->setAttribute('icon', 'fa fa-database');

        $menu->addChild('Hello', array('route' => 'hello', 'routeParameters' => array('name' => 'gene')))
            ->setAttribute('icon', 'fa fa-user');

        $menu->addChild('Graph Story Database Browser',
            array('uri' => 'https://neo-55214dc7503e0-364459c455.do-stories.graphstory.com:7473/browser/'))
            ->setLinkAttribute('target', '_blank')
            ->setAttribute('icon', 'fa fa-database');

        $menu->addChild('Graph Story Console', array('uri' => 'https://console.graphstory.com'))
            ->setLinkAttribute('target', '_blank')
            ->setAttribute('icon', 'fa fa-terminal');

        return $menu;
    }
}
