<?php

namespace Ant\WebBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;


/**
 * Ad controller.
 *
 */
class AdController extends AbstractController
{


    /**
     * Lists all Ad entities.
     * @Cache(expires="+7 days")
     */


    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $repository = $em
            ->getRepository('AntWebBundle:Ad');
        $adGroupRepository = $em
            ->getRepository('AntWebBundle:AdGroup');
        $entities = $repository->findBy(
            array('active' => true),
            array('position' => 'ASC')

        );

        return $this->render('/ant_web_bundle/technology/_pie.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Show list ads in group
     *
     */
    public function listOneGroupAction($id, $adGroupTemplate)
    {
        $em = $this->getDoctrine()->getManager();
        $ads = $em->getRepository('AntWebBundle:Ad')->findByAdGroup($id);

        $adGroup = $this->getDoctrine()
            ->getRepository('AntWebBundle:AdGroup')
            ->find($id);
        $adGroupTitle = $adGroup->getTitle();

        return $this->render($adGroupTemplate, array(
            'ads'=>$ads,
            'adGroupTitle'=>$adGroupTitle,
        ));
    }


    /**
     * Finds and displays a Ad entity.
     *
     */
    public function showAction($id, $adTemplate)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AntWebBundle:Ad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ad entity.');
        }

        return $this->render($adTemplate, array(
            'entity'      => $entity,
        ));
    }
}
