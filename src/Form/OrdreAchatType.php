<?php

namespace App\Form;

use App\Entity\OrdreAchat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrdreAchatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('offreAcheteur')
            ->add('date', DateTimeType::class,[
                'date_label'=>'Starts On',
            ])
            ->add('idVente')
            ->add('idAcheteur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OrdreAchat::class,
        ]);
    }
}
