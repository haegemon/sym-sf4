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
            ->add('name',TextType::class, array (
                'required' => true,
                'attr' => array('class'=>'form-control'),
                'label'=>'order.name'))
            ->add('surname',TextType::class, array (
                'required' => true,
                'attr' => array('class'=>'form-control'),
                'label'=>'order.surname'))
            ->add('email',EmailType::class, array (
                'required' => true,
                'attr' => array('class'=>'form-control'),
                'label'=>'order.email'))
            ->add('phone',TextType::class, array (
                'required' => true,
                'attr' => array('class'=>'form-control'),
                'label'=>'order.phone'))
            ->add('text',TextareaType::class, array (
                'required' => true,
                'attr' => array('class'=>'form-control'),
                'label'=>'order.text'))
            ->add('agreement',CheckboxType::class, array (
                'required' => true,
                'value'=>true,
                'attr' => array(
                    'class'=>'form-control',
                    'checked' => 'checked',
                    'label'=>'order.agreement')
            ))
            ->add('captcha', CaptchaType::class);
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
