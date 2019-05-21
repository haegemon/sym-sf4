<?php

namespace App\Controller;

use App\Entity\House;
use App\Entity\Testimonial;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HBDOMController
 * @package App\Controller
 * @Route("/dom")
 */
class HBDOMController extends AbstractController
{
    private const OTHER_LIMIT = 4;

    /**
     * Index page
     * @Route("/", name="dom_index")
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
     * @Route("/houses", name="dom_houses")
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

    /**
     * Index page
     * @Route("/services", name="dom_services")
     */
    public function servicesAction()
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
     * @Route("/technologies", name="dom_technologies")
     */
    public function technologiesAction()
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
     * @Route("/others/{id}", name="dom_others")
     */
    public function othersAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $houses = $em->getRepository(House::class)->selectOther($id, self::OTHER_LIMIT);

        return $this->render('ant_web_bundle/house/house_others.html.twig', array(
            'houses' => $houses,
        ));
    }

    public function testimonialsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $testimonials = $em->getRepository(Testimonial::class)->findAll();

        return $this->render('testimonials.html.twig', array(
            'testimonials' => $testimonials,
        ));
    }
}
