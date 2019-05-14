<?php

namespace Ant\AdminBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Ant\AdminBundle\Admin\AdAdmin as BaseAdmin;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Sonata\AdminBundle\Form\Type\ModelType;


class ThirdAdAdmin extends BaseAdmin
{
    protected $baseRouteName = 'ad_third';
    protected $baseRoutePattern = 'ad_third';

    public function createQuery($context = 'list')
    {
        return new ProxyQuery($this->AdQuery (3));
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);

        $queryBuilder = $this->AdGroupQuery(3);


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
