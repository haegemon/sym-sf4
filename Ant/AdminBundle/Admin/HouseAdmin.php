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
            ->add('title', TextType::class, array(
                'label' => 'house.title',
                'attr' => array('class' => 'form-control')

            ))
            ->add('url', TextType::class, array(
                'label' => 'house.url',
                'attr' => array('class' => 'form-control')

            ))
            ->add('description',TextareaType::class, array(
                'label'=>'house.description',
                'attr' => array('class'=>'form-control')

            ))
            ->add('size',NumberType::class, array(
                'label'=>'house.size',
                'attr' => array('class'=>'form-control')

            ))
            ->add('price',IntegerType::class, array(
                'label'=>'house.price',
                'attr' => array('class'=>'form-control')

            ))
            ->add('bedroomCount',IntegerType::class, array(
                'label'=>'house.bedroomCount',
                'attr' => array('class'=>'form-control')

            ))
            ->add('floorCount',IntegerType::class, array(
                'label'=>'house.floorCount',
                'attr' => array('class'=>'form-control')

            ))
            ->add('bathroomCount',IntegerType::class, array(
                'label'=>'house.bathroomCount',
                'attr' => array('class'=>'form-control')

            ))
            ->add('gallery', EntityType::class, [
                    'required' => false,
                    'class'=> Gallery::class,
                    'choice_label' => 'name',
                ]
            )
            ->add('planGallery', EntityType::class, [
                    'required' => false,
                    'class'=> Gallery::class,
                    'choice_label' => 'name',
                ]
            )
            ->add('mainPhoto', MediaType::class, [
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
                'label' => 'house.title',
            ])
            ->add(
                'url', 'text', [
                'label' => 'house.url',
            ])
            ->add(
                'description', 'text', [
                'label' => 'house.description',
            ])
            ->add(
                'size', 'text', [
                'label' => 'house.size',
            ])
            ->add(
                'price', 'text', [
                'label' => 'house.price',
            ])
            ->add(
                'bedroomCount', 'text', [
                'label' => 'house.bedroomCount',
            ])
            ->add(
                'floorCount', 'text', [
                'label' => 'house.floorCount',
            ])
            ->add(
                'bathroomCount', 'text', [
                'label' => 'house.bathroomCount',
            ])
            ->add(
                'mainPhoto', 'text', [
                'label' => 'house.mainPhoto',
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
                'label' => 'house.title',
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
        $listMapper
            ->add('title', null, [
                'label' => 'house.title',
            ])
            ->add('mainPhoto', 'string', [
                'label' => 'house.mainPhoto',
                'template' => '@SonataMedia/MediaAdmin/list_image.html.twig'
            ])
            ->add(
                'description', null, [
                'label' => 'house.description',
            ])
            ->add(
                'price', null, [
                'label' => 'house.price',
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
