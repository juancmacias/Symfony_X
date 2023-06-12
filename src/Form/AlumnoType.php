<?php

namespace App\Form;

use App\Entity\Alumno;
//use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AlumnoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, array(
                'label' => "Nombre",
                'required' => true,
                'attr' => array('class'=>'form-control',
                                'placeholder' => 'Pon aquí el nombre del alumno')
       ))

            ->add('apellido', TextType::class, array(
                'label' => "Apellido",
                'required' => true,
                'attr' => array('class'=>'form-control',
                                'placeholder' => 'Pon aquí el apellido del alumno')
        ))

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => alumno::class,
        ]);
    }
}
