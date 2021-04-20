<?php

namespace App\Form;

use App\Entity\VenteEnchere;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VenteEnchereType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('heureDebut')
            ->add('heureFin')
            ->add('type')
            ->add('idDate')
            ->add('idSalleDeVente')
            ->add('idDevise')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => VenteEnchere::class,
        ]);
    }
}
