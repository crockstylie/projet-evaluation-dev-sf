<?php

namespace Crock\StarShipManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StarShipType extends AbstractType
{

  /**
   * @param FormBuilderInterface $builder
   * @param array $options
   */
  public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('nom',                   TextType::class)
          ->add('modele',                TextType::class)
          ->add('longueur',              NumberType::class)
          ->add('vitesseMax',            NumberType::class)
          ->add('prix',                  NumberType::class)
          ->add('nbPersonnelsNavigants', NumberType::class)
          ->add('nbPassagers',           NumberType::class)
          ->add('save',                  SubmitType::class)
        ;
    }

  /**
   * @param OptionsResolver $resolver
   */
  public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Crock\StarShipManagerBundle\Entity\StarShip'
        ));
    }
}
