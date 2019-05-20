<?php
/**
 * Created by PhpStorm.
 * User: nevada
 * Date: 16.01.14
 * Time: 10:41
 */

namespace App\Menu;

use App\Entity\House;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Menu\FactoryInterface;

class FrontendBuilder {
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * FrontendBuilder constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {

        $this->entityManager = $entityManager;
    }
    public function mainMenu(FactoryInterface $factory)
    {
        $menu = $factory->createItem('root');
        $menu
            ->addChild('top_menu.houses', array('route' => 'dom_houses'))
            ->setExtra('translation_domain', 'AntWebBundle');

        foreach ($this->entityManager->getRepository(House::class)->findAll() as $house){
            $menu['top_menu.houses']
                ->addChild(
                    $house->getTitle(),
                    [
                        'route' => 'house_page',
                        'routeParameters' => ['url' => $house->getUrl()]
                    ]
                )
                ->setExtra('translation_domain', 'AntWebBundle');
        }
        $menu
            ->addChild('top_menu.services', array('route' => 'dom_services'))
            ->setExtra('translation_domain', 'AntWebBundle');
        $menu
            ->addChild('top_menu.technologies', array('route' => 'dom_technologies'))
            ->setExtra('translation_domain', 'AntWebBundle');

        return $menu;
    }

    public function footerMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav nav-pills nav-justified')
            ->addChild('menu.frontend.index', array('route' => 'ad'))
            ->setExtra('translation_domain', 'AntWebBundle');
        $menu
            ->addChild('menu.frontend.news', array('route' => 'news'))
            ->setExtra('translation_domain', 'AntWebBundle');
        $menu
            ->addChild('menu.frontend.portfolio', array('route' => ''))
            ->setExtra('translation_domain', 'AntWebBundle');
        $menu
            ->addChild('menu.frontend.contacts', array('uri' => '#contacts'))
            ->setExtra('translation_domain', 'AntWebBundle');
        $menu
            ->addChild('menu.frontend.order', array('route' => 'order_new'))
            ->setExtra('translation_domain', 'AntWebBundle');
        $menu
            ->addChild('menu.frontend.services', array())
            ->setExtra('translation_domain', 'AntWebBundle');
        $menu['menu.frontend.services']->setUri('#');
        $menu['menu.frontend.services']
            ->addChild('menu.frontend.services_1', array('uri' => '#services_1'))
            ->setExtra('translation_domain', 'AntWebBundle');
        $menu['menu.frontend.services'
        ]->addChild('menu.frontend.services_2', array('route' => ''))
            ->setExtra('translation_domain', 'AntWebBundle');
        $menu['menu.frontend.services']
            ->setChildrenAttributes(array ('class'=>'nav nav-pills nav-stacked'));


        return $menu;
    }

} 
