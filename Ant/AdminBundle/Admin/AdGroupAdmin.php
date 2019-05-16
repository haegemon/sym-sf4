<?php
/**
 * Simple class to create adGroups in backend
 *
 * User: Ant
 * Date: 07.01.14
 * Time: 15:04
 */

namespace Ant\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class AdGroupAdmin extends AbstractAdmin {

    protected $baseRouteName = 'ant';
    protected $baseRoutePattern = 'adGroup';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('Title',TextType::class, array(
                'label'=>'adGroup.title',
                'attr' => array('class'=>'form-control')
            ))
            ->add('active', CheckboxType::class, array(
		'required' => false,
                'label'=>'ad.active'
            ))
        ;
    }


    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id',null, array(
                'label'=>'adGroup.title',
                'attr' => array('class'=>'form-control')


            ))
            ->add('title',null, array(
                'label'=>'adGroup.title',
                'attr' => array('class'=>'form-control')

            ))


        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id',null, array(
                'label'=>'adGroup.id'
            ))
            ->add('title',null, array(
                'label'=>'adGroup.title'
            ))
            ->add('active', 'boolean', array('label'=>'ad.active'))

        ;
    }
} 