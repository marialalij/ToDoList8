<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'label' => "Nom d'utilisateur",
                "attr" => [
                    "class" => "form-control"
                ]
            ])

            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les deux mots de passe doivent correspondre.',
                'required' =>  true,
                'first_options' => ['label' => 'Mot de passe',  "attr" => [
                    "class" => "form-control"
                ]],
                'second_options' => ['label' => 'Tapez le mot de passe à nouveau',  "attr" => [
                    "class" => "form-control"
                ]],

            ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse email',
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Utilisateur' => 'ROLE_USER',
                    'Administrateur' => 'ROLE_ADMIN',
                ],
                'multiple' => true,
                'expanded' => false,
                'label' => 'Rôle',
                'required' => true,
                "attr" => [
                    "class" => "form-control"
                ]

            ]);
    }
}
