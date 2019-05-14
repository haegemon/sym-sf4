<?php

namespace Ant\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Ant\AdminBundle\Admin\AdAdmin as BaseAdmin;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Sonata\AdminBundle\Form\Type\ModelType;

class SecondAdAdmin extends BaseAdmin
{
    protected $baseRouteName = 'ad_second';
    protected $baseRoutePattern = 'ad_second';

    public function createQuery($context = 'list')
    {
        return new ProxyQuery(
            $this->AdQuery (2)
        );
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);

        $queryBuilder = $this->AdGroupQuery(2);


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
