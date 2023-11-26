<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchVehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('dateDebut', DateType::class, [
            'widget' => 'single_text',
            'label' => 'Date de début',
            // Ajoutez d'autres options selon vos besoins
        ])
        ->add('dateFin', DateType::class, [
            'widget' => 'single_text',
            'label' => 'Date de fin',
            // Ajoutez d'autres options selon vos besoins
        ])
            ->add('submit', SubmitType::class, ['label' => 'Rechercher'])
        ;
    }
}

