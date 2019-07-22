<?php

namespace App\Form;

use App\Entity\Training;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrainingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('goal', TextareaType::class)
            ->add('prerequisite', TextareaType::class)
            ->add('period')
            ->add('public', TextareaType::class)
            ->add('pedagogy', TextareaType::class)
            ->add('trainer', TextareaType::class)
            ->add('program', TextareaType::class)
            ->add('methodEvaluation', TextareaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Training::class,
        ]);
    }
}
