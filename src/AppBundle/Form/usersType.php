<?php

namespace AppBundle\Form;

use AppBundle\Entity\users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class usersType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class)
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => users::class,
        ));
    }
    /**
     * {@inheritdoc}
     */
   /* public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username')->add('name')->add('email')->add('password');
    }*/
    
    /**
     * {@inheritdoc}
     */
   /* public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\users'
        ));
    }*/

    /**
     * {@inheritdoc}
     */
    /*public function getBlockPrefix()
    {
        return 'appbundle_users';
    }*/


}
