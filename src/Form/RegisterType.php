<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\{TextType, EmailType, PasswordType, SubmitType};

class RegisterType extends AbstractType 
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', TextType::class, array(
            'label' => 'Nombre',
            'attr' => array(
                'id' => 'name',
                'placeholder' => 'John'
            ),
            'row_attr' => array('class' => 'input-group')
        ))
        ->add('surname', TextType::class, array(
            'label' => 'Apellidos',
            'attr' => array(
                'id' => 'surname',
                'placeholder' => 'Doe'
            ),
            'row_attr' => array('class' => 'input-group')
        ))
        ->add('email', EmailType::class, array(
            'label' => 'Correo',
            'attr' => array(
                'id' => 'email',
                'placeholder' => 'johndoe@example.com'
            ),
            'row_attr' => array('class' => 'input-group')
        ))
        ->add('password', PasswordType::class, array(
            'label' => 'Contraseña',
            'attr' => array(
                'id' => 'password'
            ),
            'row_attr' => array('class' => 'input-group')
        ))
        ->add('submit', SubmitType::class, array(
            'label' => 'Registrarse',
            'attr' => array(
                'class' => 'button button--checkout')
        ));
    }
}