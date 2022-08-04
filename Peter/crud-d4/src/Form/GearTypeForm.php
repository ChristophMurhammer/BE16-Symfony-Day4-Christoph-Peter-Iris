<?php

namespace App\Form;

use App\Entity\Gear;
use App\Entity\Beginner;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;


class GearTypeForm extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
      $builder
          ->add('gear_name', TextType::class, [
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']
          ])
          ->add('gear_type', TextType::class, [
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']
          ])
          ->add('gear_producer', TextType::class, [
               'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']
          ])
          ->add('gear_price', NumberType::class,[
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']
          ])
          ->add('fkBeginner', EntityType::class, [
            'class' => Beginner::class,
            'choice_label' => 'friendly'
          ],
          [
                'attr' =>['class' => 'form-control', 'style' => 'margin-bottom:15px']
          ])
          ->add('Submit', SubmitType::class, [
            'label' => 'Submit',
            'attr' => ['class' => 'btn-info mt-5', 'style' => 'margin-bottom:15px']
          ])

        
          ;
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
      $resolver->setDefaults([
          'data_class' => Gear::class,
      ]);
  }
}