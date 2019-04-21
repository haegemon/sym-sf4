<?php

namespace Ant\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Ant\WebBundle\Entity\OrderForm;
use Ant\WebBundle\Form\OrderFormType;

/**
 * OrderForm controller.
 *
 */
class OrderFormController extends AbstractController
{
    /**
     * Creates a new OrderForm entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new OrderForm();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $message = (new \Swift_Message())
                ->setSubject('order')
                ->setFrom($form->get('email')->getData())
                ->setBody(
                    $this->renderView(
                        'AntWebBundle:OrderForm:email.txt.twig',
                        array(
                            'name' => $entity->getName(),
                            'text' => $entity->getText()
                        )
                    )
                );

            $this->get('mailer')->send($message);
            $this->get('session')->getFlashBag()->add(
                'notice',
                'Сообщение отправлено!'
            );
        }


        return $this->render('AntWebBundle:OrderForm:new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * Creates a form to create a OrderForm entity.
     *
     * @param OrderForm $entity The entity
     *
     * @return \Symfony\Component\Form\FormInterface The form
     */
    private function createCreateForm(OrderForm $entity)
    {
        $form = $this->createForm(
            OrderFormType::class,
            $entity,
            [
                'action' => $this->generateUrl('order_create_front'),
                'method' => 'POST',
            ]
        );

        $form->add('submit', SubmitType::class, array('label' => 'Create'));


        return $form;
    }

    /**
     * Displays a form to create a new OrderForm entity.
     *
     */
    public function newAction()
    {
        $entity = new OrderForm();
        $form = $this->createCreateForm(new OrderForm());

        return $this->render('AntWebBundle:OrderForm:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }


}
