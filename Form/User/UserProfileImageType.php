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
 * Formulario del usuario para cambiar la foto de portada y perfil
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 */
class UserProfileImageType extends UserType 
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image_profile','file',array(
                'description' => 'Foto de perfil',
                'mapped' => false,
                'required' => false,
                'multiple' => false,
            ))
            ->add('image_cover','file',array(
                'description' => 'Foto de portada',
                'required' => false,
                'mapped' => false,
                'multiple' => false,
            ))
        ;
    }
}
