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

class NewsAdmin extends AbstractAdmin
{

    protected $baseRouteName = 'news';
    protected $baseRoutePattern = 'news';

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title',TextType::class, array(
                'label'=>'news.title',
                'attr' => array('class'=>'form-control')

            ))
            ->add('description',TextareaType::class, array(
                'label'=>'news.description',
                'attr' => array('class'=>'form-control')

            ))
            ->add('text',TextareaType::class, array(// TinymceType
                'required' => false,
                'label'=>'news.text',
            ))
            ->add('metaKey',TextType::class, array(
                'label'=>'news.metaKey',
                'required' => false,
                'attr' => array('class'=>'form-control')
            ))
            ->add('metaDesc',TextareaType::class, array(
                'label'=>'news.metaDesc',
                'required' => false,
                'attr' => array('class'=>'form-control')
            ))
            ->add('media', MediaType::class, array(
                'provider' => 'sonata.media.provider.image',
                'context'  => 'default',
                'required' => false))

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
                'label'=>'news.title',
            ))
            ->add(
                'description', 'text', array(
                'label'=>'news.description',
            ))
            ->add(
                'text', 'text', array(
                'required' => false,
                'label'=>'news.text'
                ))
            ->add(
                'metaKey', 'text',array(
                'label'=>'news.metaKey',
            ))
            ->add(
                'metaDesc', 'text', array(
                'label'=>'news.metaDesc',
            ))

           ;
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title', null, array(
                'label'=>'news.title',
            ))

            ->add('created', 'doctrine_orm_datetime_range', array(
                'input_type' => 'timestamp',
                'label'=>'news.created',
            ))
            ->add('updated', 'doctrine_orm_datetime_range', array(
                'input_type' => 'timestamp',
                'label'=>'news.updated',
            ))
            ->add('id', null, array(
                'label'=>'news.id',
            ));
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id', null, array(
        'label'=>'news.id',
    ))
            ->add('title', null, array(
                'label'=>'news.title',
            ))
            ->add('created',null, array(
        'label'=>'news.created',
    ))
            ->add('updated', null, array(
                'label'=>'news.updated',
            ))
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
