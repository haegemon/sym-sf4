<?php

namespace Ant\WebBundle\Form;

use Gregwar\CaptchaBundle\Type\CaptchaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderFormType extends AbstractType
{
   /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                TextType::class,
                [
                    'required' => true,
                    'attr' => ['class'=>'form-control'],
                    'label'=>'order.name',
                    'translation_domain' => 'AntWebBundle'
                ]
            )
            ->add(
                'surname',
                TextType::class,
                [
                    'required' => true,
                    'attr' => ['class'=>'form-control'],
                    'label'=>'order.surname',
                    'translation_domain' => 'AntWebBundle'
                ]
            )
            ->add('email',EmailType::class, [
                'required' => true,
                'attr' => ['class'=>'form-control'],
                'label'=>'order.email',
                'translation_domain' => 'AntWebBundle'])
            ->add('phone',TextType::class, [
                'required' => true,
                'attr' => ['class'=>'form-control'],
                'label'=>'order.phone',
                'translation_domain' => 'AntWebBundle'])
            ->add('text',TextareaType::class, [
                'required' => true,
                'attr' => ['class'=>'form-control'],
                'label'=>'order.text',
                'translation_domain' => 'AntWebBundle'])
            ->add('agreement',CheckboxType::class, [
                'required' => true,
                'value'=>true,
                'attr' => [
                    'class'=>'form-control',
                    'checked' => 'checked',
                    'label'=>'order.agreement'],
                'translation_domain' => 'AntWebBundle'

            ])
            ->add('captcha', CaptchaType::class, array(
                'width' => 120,
                'height' => 60,
                'reload' => true,
                'as_url'=>true,
                'quality'=>80,
                'max_front_lines'=>0,
                'max_behind_lines'=>0,
                'length'=>3,
                'distortion'=>false,
    ));
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ant\WebBundle\Entity\OrderForm',
            'translation_domain' => 'AntWebBundle'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ant_bundle_orderform';
    }
}
