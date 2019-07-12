<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;

class SecurityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('password', RepeatedType::class, [
             'type' => PasswordType::class,
             'invalid_message' => 'The password fields must match.',
             'options' => ['attr' => [
                'class' => 'password-field']],
             'required' => true,
             'first_options'  => ['label' => false,
                'attr' => ['placeholder' => 'Mot de passe']],
             'second_options' => ['label' => false,
                'attr' => ['placeholder' => 'Confirmez votre mot de passe']]]);
    }
}
