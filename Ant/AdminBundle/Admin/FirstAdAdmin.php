<?php

namespace Ant\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Ant\AdminBundle\Admin\AdAdmin as BaseAdmin;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Sonata\AdminBundle\Form\Type\ModelType;




class FirstAdAdmin extends BaseAdmin
{
    protected $baseRouteName = 'ad_first';
    protected $baseRoutePattern = 'ad_first';

    public function createQuery($context = 'list')
    {
        return new ProxyQuery(
            $this->AdQuery (1)
        );
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);

        $queryBuilder = $this->AdGroupQuery(1);


        $adGroupFieldOptions = array(
            'property'=>'title',
            'label'=>'ad.group',
            'attr' => array('class'=>'form-control'),
            'query'=>$queryBuilder
        );

        $formMapper
            ->add('adGroup', ModelType::class, $adGroupFieldOptions);

    }
}
