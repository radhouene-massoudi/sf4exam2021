<?php

namespace App\Form;

use App\Entity\TicketPeage;
use App\Entity\Voiture;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nomPeage')
        ->add('dateticket')
        ->add('prix')
        ->add('voiture',EntityType::class,[
            'class'=>Voiture::class,
            'choice_label'=>'type'
        ])
        ->add('save',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TicketPeage::class,
        ]);
    }
}
