<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Lot;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LotType extends AbstractType implements FormTypeInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('prixDeDepart')
            ->add('prixDeVente')
            ->add('prixDeReserve')
            ->add('statut')
            ->add('idVendeur')
            ->add('idAcheteur')
            ->add('categories', EntityType::class, [
                'class' => Categorie::class,
                'multiple'=> true,
                'expanded'=> false,
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lot::class,
        ]);
    }
}
