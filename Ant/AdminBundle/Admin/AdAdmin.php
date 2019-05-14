<?php
/**
 * Created by PhpStorm.
 * User: nevada
 * Date: 07.01.14
 * Time: 14:53
 */

namespace Ant\AdminBundle\Admin;
use Ant\AdminBundle\Form\TinymceType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Ant\WebBundle\Entity\Ad;
use Ant\WebBundle\Entity\AdGroup;
use Sonata\MediaBundle\Form\Type\MediaType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AdAdmin extends AbstractAdmin {

    protected $baseRouteName = 'ads';
    protected $baseRoutePattern = 'ads';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $adGroupFieldOptions = array(
            'property'=>'title',
            'label'=>'ad.group',
            'attr' => array('class'=>'form-control')
        );
        $formMapper
            ->add('title',TextType::class, array(
                'required' => false,
                'label'=>'ad.title',
            ))
            ->add('text',TextareaType::class, array(//TinymceType::class
                'required' => false,
                'label'=>'ad.text',
            ))
            ->add('icon', TextType::class, array(
                'required' => false,
                'label'=>'ad.icon',
            ))
            ->add('adGroup', ModelType::class, $adGroupFieldOptions)
            ->add('position',TextType::class, array (
                'required' => false,
                'attr' => array('class'=>'form-control'),
                'label'=>'ad.position'
            ))

            ->add('url',TextType::class, array (
                'required' => false,
                'attr' => array('class'=>'form-control'),
                'label'=>'ad.url'
            ))
            ->add('media', MediaType::class, array(
                'provider' => 'sonata.media.provider.image',
                'context'  => 'default',
                'required' => false))
            ->add('active', null, array('required' => false,
                'label'=>'ad.active'
            ))


        ;
    }

    protected  function AdQuery ($id) {
        $em = $this->modelManager->getEntityManager(Ad::class);

        $queryBuilder = $em
            ->createQueryBuilder('a')
            ->select('a')
            ->from('AntWebBundle:Ad', 'a')
            ->where('a.adGroup = :id')
            ->setParameter('id', $id);

        return $queryBuilder;
    }

    protected function AdGroupQuery ($id) {
        $em = $this->modelManager->getEntityManager(AdGroup::class);

        $queryBuilder = $em
            ->createQueryBuilder('a')
            ->select('a')
            ->from('AntWebBundle:AdGroup', 'a')
            ->where('a.id = :id')
            ->setParameter('id', $id);

        return $queryBuilder;

    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id',null, array(
                'label'=>'ad.id'))
            ->add('adGroup.title',null,array('label'=>'ad.group'))
            ->add('title', null, array('label'=>'ad.title'))
            ->add('position', null, array('label'=>'ad.position'))
            ->add('active', 'boolean', array('label'=>'ad.active'))
            ->add('url','url', array(
                'label'=>'ad.url'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

} 