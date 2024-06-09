<?php

declare(strict_types=1);

namespace App\Form\Type;

use Symfony\Component\Form\{AbstractType,
    Extension\Core\Type\EmailType,
    Extension\Core\Type\SubmitType,
    Extension\Core\Type\TextareaType,
    Extension\Core\Type\TextType,
    FormBuilderInterface};
use Symfony\Component\Validator\Constraints as Assert;

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
                'constraints' => [
                    new Assert\NotNull(),
                    new Assert\NotBlank(),
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'constraints' => [
                    new Assert\Email(message: 'Please provide a correct email address'),
                    new Assert\NotNull(),
                    new Assert\NotBlank(),
                ],
            ])
            ->add('subject', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Subject',
                ],
                'constraints' => [
                    new Assert\NotNull(message: 'You need to specify the subject'),
                    new Assert\NotBlank(),
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
                'constraints' => [
                    new Assert\NotNull(),
                    new Assert\NotBlank(),
                    new Assert\Length(min: 10, max: 100)
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
