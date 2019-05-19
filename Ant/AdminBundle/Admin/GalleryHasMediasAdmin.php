<?php
/**
 * Created by PhpStorm.
 * User: nevada
 * Date: 09.03.14
 * Time: 16:10
 */

namespace Ant\AdminBundle\Admin;


use Ant\MediaBundle\Entity\Gallery;
use Ant\MediaBundle\Entity\GalleryHasMedia;
use Ant\MediaBundle\Entity\Media;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\Type\CollectionType;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\CoreBundle\Form\Type\TranslatableChoiceType;
use Sonata\MediaBundle\Admin\GalleryHasMediaAdmin;
use Sonata\MediaBundle\Form\Type\ApiGalleryHasMediaType;
use Sonata\MediaBundle\Model\GalleryHasMediaInterface;
use Sonata\MediaBundle\Provider\Pool;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;


class GalleryHasMediasAdmin extends GalleryHasMediaAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $link_parameters = [];

        if ($this->hasParentFieldDescription()) {
            $link_parameters = $this->getParentFieldDescription()->getOption('link_parameters', []);
        }

        if ($this->hasRequest()) {
            $context = $this->getRequest()->get('context', null);

            if (null !== $context) {
                $link_parameters['context'] = $context;
            }
        }

        $formMapper
            ->add('media', EntityType::class, [
                    'required' => false,
                    'class'=> Media::class,
                    'choice_label' => 'name',
                ],
                [
                    'link_parameters' => $link_parameters,
                ]
            )
            ->add('gallery', EntityType::class, [
                    'required' => false,
                    'class'=> Gallery::class,
                    'choice_label' => 'name',
                ]
            )
            ->add('enabled', null, ['required' => false])
            ->add('position', HiddenType::class)
        ;
    }

}
