<?php

namespace CampaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

use Doctrine\ORM\EntityRepository;



class DistritosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',TextType::class)
            ->add('lider',TextType::class)
            ->add('valor',NumberType::class)
            ->add('Zona',EntityType::class,array(
                'class'=>'CampaBundle:Zonas',
                'query_builder' => function (EntityRepository $er) {
              return $er->createQueryBuilder('z')
            ->orderBy('z.nombre', 'ASC');
    },
                'choice_label'=>'Nombre',
                    ))

            ->add('submit',submitType::class, array('label' => 'Guardar'))
            ->getForm()
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CampaBundle\Entity\Distritos'
        ));
    }
    
  
}
