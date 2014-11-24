<?php

namespace BtoB\SocialNetwork\CoreBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Formulario de registro
 *
 * @author Carlos Mendoza <inhak20@tecnocreaciones.com>
 */
class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $years = array();
        for($i = 1950 ; $i < date('Y'); $i++){
            $years[] = $i;
        }
        $builder
            ->add('email', 'email', array(
                'description' => 'Correo electronico',
                'label' => 'form.email', 'translation_domain' => 'FOSUserBundle'
            ))
            ->add('plainPassword', 'repeated', array(
                'description' => 'Contraseña',
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
        ;

        // add your custom field
        $builder->add('born','date',array(
            'description' => 'Fecha de nacimiento',
            //'years' => $years,
            'widget' => 'single_text',
            'format' => 'yyyy-MM-dd',
        ));
        $builder->add('location',null,array(
            'description' => 'Pais',
        ));
    }

     public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
         parent::setDefaultOptions($resolver);
         $resolver->replaceDefaults(array(
            'csrf_protection' => false,
        ));
    }
    
    public function getName()
    {
        return 'btob_core_user_registration';
    }
}
