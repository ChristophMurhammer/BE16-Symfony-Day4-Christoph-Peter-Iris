<?php

namespace App\Form;

use App\Entity\Gear;
use App\Entity\Beginner;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
// use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
// use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
          ->add('name', TextType::class, [
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']
          ])
          ->add('type', TextType::class, [
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']
          ])
          ->add('producer', TextType::class, [
               'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']
          ])
          ->add('price', NumberType::class,[
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']
          ])
          ->add('fk_beginner_id', EntityType::class,[
                'class' => Beginner::class,
                'choice_lable'=> 'beginnerfriendly'
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