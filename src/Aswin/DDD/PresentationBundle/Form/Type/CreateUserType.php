<?php

namespace Aswin\DDD\PresentationBundle\Form\Type;

use Aswin\DDD\Domain\ValueObject\Name;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class CreateUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', null, array('required'=>false))
            ->add('lastName', null, array('required'=>false))
            ->add('save', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Aswin\DDD\Domain\ValueObject\Name',
            'empty_data' => function (FormInterface $form) {
                return new Name(
                    $form->get('firstName')->getData(),
                    $form->get('lastName')->getData()
                );
            }
        ));
    }

    public function getName()
    {
        return 'create_user';
    }
} 