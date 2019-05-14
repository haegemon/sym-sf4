<?php

namespace Ant\AdminBundle\Admin;

use Ant\AdminBundle\Form\TinymceType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\MediaBundle\Form\Type\MediaType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class HouseAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'house';
    protected $baseRoutePattern = 'house';

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title',TextType::class, array(
                'label'=>'house.title',
                'attr' => array('class'=>'form-control')

            ))
//            ->add('description',TextareaType::class, array(
//                'label'=>'house.description',
//                'attr' => array('class'=>'form-control')
//
//            ))
//            ->add('text',TextareaType::class, array(// TinymceType
//                'required' => false,
//                'label'=>'house.text',
//            ))
//            ->add('metaKey',TextType::class, array(
//                'label'=>'house.metaKey',
//                'required' => false,
//                'attr' => array('class'=>'form-control')
//            ))
//            ->add('metaDesc',TextareaType::class, array(
//                'label'=>'house.metaDesc',
//                'required' => false,
//                'attr' => array('class'=>'form-control')
//            ))
//            ->add('media', MediaType::class, array(
//                'provider' => 'sonata.media.provider.image',
//                'context'  => 'default',
//                'required' => false))
//
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add(
                'title', 'text', array(
                'label'=>'house.title',
            ))
            ->add(
                'description', 'text', array(
                'label'=>'house.description',
            ))
//            ->add(
//                'text', 'text', array(
//                'required' => false,
//                'label'=>'house.text'
//                ))
//            ->add(
//                'metaKey', 'text',array(
//                'label'=>'house.metaKey',
//            ))
//            ->add(
//                'metaDesc', 'text', array(
//                'label'=>'house.metaDesc',
//            ))
//
           ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title', null, array(
                'label'=>'house.title',
            ))
//
//            ->add('created', 'doctrine_orm_datetime_range', array(
//                'input_type' => 'timestamp',
//                'label'=>'house.created',
//            ))
//            ->add('updated', 'doctrine_orm_datetime_range', array(
//                'input_type' => 'timestamp',
//                'label'=>'house.updated',
//            ))
//            ->add('id', null, array(
//                'label'=>'house.id',
//            ));
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id', null, [
            'label'=>'house.id',
        ])->add('title', null, [
            'label'=>'house.title',
        ])
//            ->add('created',null, array(
//        'label'=>'house.created',
//    ))
//            ->add('updated', null, array(
//                'label'=>'house.updated',
//            ))
            ->add('_action', 'actions', array(
                'label'=>'admin.actions',
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }
}
