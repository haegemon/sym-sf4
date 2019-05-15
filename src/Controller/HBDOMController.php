<?php

namespace App\Controller;

use App\Entity\House;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HBDOMController
 * @package App\Controller
 * @Route("/dom")
 */
class HBDOMController extends AbstractController
{

    /**
     * Index page
     * @Route("/",)
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $houses = $em->getRepository(House::class)->findBy(
            [],
            ['id' => 'DESC'],
            3
        );

        return $this->render('index.html.twig', array(
            'houses' => $houses,
        ));
    }

    /**
     * Index page
     * @Route("/houses",)
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();

        $houses = $em->getRepository(House::class)->findBy(
            [],
            ['id' => 'DESC'],
            30
        );

        return $this->render('houses_list.html.twig', array(
            'houses' => $houses,
        ));
    }

    /**
     * House Page
     * @Route("/house/{url}", name="house_page")
     */
    public function housePageAction(string $url)
    {
        $em = $this->getDoctrine()->getManager();

        $house = $em->getRepository(House::class)->findOneBy(
            [
                'url' => $url
            ]
        );

        return $this->render('house.html.twig', array(
            'house' => $house,
        ));
    }
}
