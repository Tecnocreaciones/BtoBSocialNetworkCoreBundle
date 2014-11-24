<?php

/*
 * This file is part of the TecnoCreaciones package.
 * 
 * (c) www.tecnocreaciones.com
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BtoB\SocialNetwork\CoreBundle\Form\User;

use Symfony\Component\Form\FormBuilderInterface;

/**
 * Formulario de la privacidad del usuario
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 */
class UserPrivacyType extends UserType {
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           //Privacidad
            ->add('private',null,array(
                'description' => 'Privacidad del Perfil',
                'required' => false,
            ))
            ->add('privacy',null,array(
                'description' => 'La forma habitual de publicar mensajes',
                'required' => false,
            ))
            ->add('offline',null,array(
                'description' => 'Estado del chat',
                'required' => false,
            ))
        ;
    }
}
