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

class StaffAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'staff';
    protected $baseRoutePattern = 'staff';

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('fullName', TextType::class, array(
                'label' => 'staff.fullName',
                'attr' => array('class' => 'form-control')

            ))
            ->add('position', TextType::class, array(
                'label' => 'staff.position',
                'attr' => array('class' => 'form-control')

            ))
            ->add('description',TextareaType::class, array(
                'label'=>'staff.description',
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
                'fullName', 'text', [
                'label' => 'staff.fullName',
            ])
            ->add(
                'position', 'text', [
                'label' => 'staff.position',
            ])
            ->add(
                'description', 'text', [
                'label' => 'staff.description',
            ])
            ->add(
                'photo', 'text', [
                'label' => 'staff.photo',
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
            ->add('fullName', null, array(
                'label' => 'staff.fullName',
            ))
            ->add('position', null, array(
                'label' => 'staff.position',
            ))
//
//            ->add('created', 'doctrine_orm_datetime_range', array(
//                'input_type' => 'timestamp',
//                'label'=>'staff.created',
//            ))
//            ->add('updated', 'doctrine_orm_datetime_range', array(
//                'input_type' => 'timestamp',
//                'label'=>'staff.updated',
//            ))
//            ->add('id', null, array(
//                'label'=>'staff.id',
//            ));
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('fullName', null, [
                'label' => 'staff.fullName',
            ])
            ->add('position', null, [
                'label' => 'staff.position',
            ])
            ->add('photo', null, [
                'label' => 'staff.photo',
                'template' => '@SonataMedia/MediaAdmin/list_image.html.twig'
            ])
            ->add(
                'description', null, [
                'label' => 'staff.description',
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
