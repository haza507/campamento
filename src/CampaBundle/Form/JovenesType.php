<?php

namespace CampaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JovenesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cedula')
            ->add('nombre')
            ->add('apellido')
            ->add('sexo')
            ->add('edad')
            ->add('idIglesia')
            ->add('saldo')
            ->add('estado')
            ->add('idCabana')
            ->add('cama')
            ->add('telefono')
            ->add('correo')
            ->add('Iglesias')
            ->add('Cabana')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CampaBundle\Entity\Jovenes'
        ));
    }
}
