<?php

namespace BtoB\SocialNetwork\CoreBundle\Form;

use BtoB\SocialNetwork\CoreBundle\Entity\Relation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Formulario de las relaciones
 */
class RelationType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choices = Relation::getStatusAvailable();
        unset($choices[Relation::STATUS_UNCONFIRMED]);
        
        $builder
            ->add('status','choice',array(
                'description' => 'Estatus de la solicitud',
                'choices' => $choices,
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BtoB\SocialNetwork\CoreBundle\Entity\Relation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'btob_socialnetwork_corebundle_relation';
    }
}
