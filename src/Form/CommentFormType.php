<?php

namespace App\Form;

use App\Entity\Comments;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CommentFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Name:',
                'required' => true,
            ])
            ->add('rating', ChoiceType::class, [
                'choices' => array_flip(['5', '4', '3', '2', '1']),
                'attr' => ['class' => 'form-control'],
                'label' => 'Rating:',
                'required' => true,
            ])
            ->add('comment', TextareaType::class, [
                'attr' => ['class' => 'form-control', 'rows' => 4],
                'label' => 'Comment:',
                'required' => true,
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary'],
                'label' => 'Submit Comment',
            ]);
    }
}

