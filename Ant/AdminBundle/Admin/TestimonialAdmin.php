<?php

namespace Ant\AdminBundle\Admin;

use Ant\AdminBundle\Form\TinymceType;
use Ant\MediaBundle\Entity\Gallery;
use Ant\MediaBundle\Entity\Media;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\MediaBundle\Form\Type\ApiGalleryType;
use Sonata\MediaBundle\Form\Type\MediaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TestimonialAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'testimonial';
    protected $baseRoutePattern = 'testimonial';

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', TextType::class, array(
                'label' => 'testimonial.title',
                'attr' => array('class' => 'form-control')

            ))
            ->add('text',TextareaType::class, array(
                'label'=>'testimonial.text',
                'attr' => array('class'=>'form-control')

            ))
            ->add('photo', MediaType::class, [
                    'required' => false,
                    'provider' => 'sonata.media.provider.image',
                    'context'  => 'default'
                ]
            )
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add(
                'title', 'text', [
                'label' => 'testimonial.title',
            ])
            ->add(
                'text', 'text', [
                'label' => 'testimonial.text',
            ])
            ->add(
                'photo', 'text', [
                'label' => 'testimonial.photo',
                'template' => '@SonataMedia/MediaAdmin/list_image.html.twig'
            ])

        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title', null, array(
                'label' => 'testimonial.title',
            ))
//
//            ->add('created', 'doctrine_orm_datetime_range', array(
//                'input_type' => 'timestamp',
//                'label'=>'testimonial.created',
//            ))
//            ->add('updated', 'doctrine_orm_datetime_range', array(
//                'input_type' => 'timestamp',
//                'label'=>'testimonial.updated',
//            ))
//            ->add('id', null, array(
//                'label'=>'testimonial.id',
//            ));
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('title', null, [
                'label' => 'testimonial.title',
            ])
            ->add('photo', null, [
                'label' => 'testimonial.photo',
                'template' => '@SonataMedia/MediaAdmin/list_image.html.twig'
            ])
            ->add(
                'text', null, [
                'label' => 'testimonial.description',
            ])
            ->add('_action', 'actions', array(
                'label' => 'admin.actions',
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ));
    }
}
