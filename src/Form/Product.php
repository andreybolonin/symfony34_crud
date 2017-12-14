<?php

namespace App\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;


/**
 * Class ProductType.
 */
class Product extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Название'])
            ->add('price', MoneyType::class, ['label' => 'Цена'])
            ->add('description', TextType::class, ['label' => 'Описание', 'required' => false])
            ->add('company', EntityType::class, [
                'class' => 'App:Company',
                'choice_label' => 'name',
                'label' => 'Компания',
            ])
            ->add('save', SubmitType::class, ['label' => 'Зберегти', 'attr' => ['class' => 'button button __info']]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => \App\Entity\Product::class,
        ));
    }
}
