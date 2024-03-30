<?php

declare(strict_types=1);

namespace App\Form\Type;

use Symfony\Component\Form\{AbstractType,
    Extension\Core\Type\EmailType,
    Extension\Core\Type\SubmitType,
    Extension\Core\Type\TextareaType,
    Extension\Core\Type\TextType,
    FormBuilderInterface};

final class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullName', TextType::class, [
                'attr' => [
                    'placeholder' => 'Your name',
                    'class' => 'form-control',
                ],
                'label' => false,
            ])
            ->add('email', EmailType::class, [
                'label' => false,
            ])
            ->add('subject', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Subject',
                ],
            ])
            ->add('message', TextareaType::class, [
                'label' => false,
                'attr' => [
                    'rows' => 6,
                    'cols' => 20,
                    'placeholder' => 'message',
                    'maxlength' => 100,
                ],
            ])
            /*->add('send', SubmitType::class, [
                'label' => 'Send feedback',
                'attr' => [
                    'class' => 'btn btn-primary',
                ],
            ])*/;
    }
}
