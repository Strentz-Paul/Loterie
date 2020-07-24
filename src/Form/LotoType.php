<?php

namespace App\Form;


use App\Entity\Draw;
use PhpParser\Builder\Property;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numberOfDraw',IntegerType::class, ['label'=>'Nombre de tirage'])
            ->add('numberTotalOfNum',IntegerType::class, ['label'=>'Nombre total de numéro'])
            ->add('nbToDraw',IntegerType::class, ['label'=>'Nombre de numéro à tirer'])
            ->add('numberTotalOfChance',IntegerType::class, ['label'=>'Nombre total de numéro chance'])
            ->add('numberTotalOfChanceToDraw',IntegerType::class, ['label'=>'Nombre de numéro chance à tirer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data-class' => Draw::class
        ]);
    }
}
