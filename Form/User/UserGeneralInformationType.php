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
 * Formulario de la informacion general del usuario
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 */
class UserGeneralInformationType extends UserType {
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //Informacion general
            ->add('firstName',null,array(
                'description' => 'Primer nombre',
                'required' => false,
            ))
            ->add('lastName',null,array(
                'description' => 'Segundo nombre',
                'required' => false,
            ))
            ->add('born',null,array(
                'description' => 'Fecha de nacimiento',
                'required' => false,
            ))
            ->add('gender',null,array(
                'description' => 'Genero',
                'required' => false,
            ))
            ->add('website',null,array(
                'description' => 'Sitio web',
                'required' => false,
            ))
            ->add('location',null,array(
                'description' => 'Pais',
                'required' => false,
            ))
            ->add('locationEstado',null,array(
                'description' => 'Estado',
                'required' => false,
            ))
            ->add('locationCiudad',null,array(
                'description' => 'Ciudad',
                'required' => false,
            ))
        ;
    }
}
