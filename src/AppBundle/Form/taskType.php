<?php

namespace AppBundle\Form;

use Doctrine\DBAL\Types\ArrayType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class taskType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('author', EntityType::class, array(
            'class' => 'AppBundle\Entity\users',
            'choice_label' => 'getUsername'
        ))
            ->add('taskname', TextType::class, [
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('taskcomment')
            ->add('priority')
            ->add('taskcreated')
            ->add('taskdueto')
            ->add('status')
            ->add('category', EntityType::class, array(
            'class' => 'AppBundle\Entity\categories',
            'choice_label' => 'getCategoryname'
        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\task'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_task';
    }


}
