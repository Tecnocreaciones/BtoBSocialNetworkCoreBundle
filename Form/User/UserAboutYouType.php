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
 * Formulario de la informacion acerca del usuario
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 */
class UserAboutYouType extends UserType {
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           //Acerca de ti
            ->add('biography',null,array(
                'description' => 'Biografia',
                'required' => false,
            ))
            
            //Hobbies
            ->add('libro',null,array(
                'description' => 'Título de tu Libro Favorito',
                'required' => false,
            ))
            ->add('pelicula',null,array(
                'description' => 'Nombre de tu Película Favorita',
                'required' => false,
            ))
                
            //Redes sociales
            ->add('facebook',null,array(
                'description' => 'Su perfil facebook ID',
                'required' => false,
            ))
            ->add('twitter',null,array(
                'description' => 'Su perfil de twitter ID',
                'required' => false,
            ))
            ->add('gplus',null,array(
                'description' => 'Su perfil de Google+ ID',
                'required' => false,
            ))
        ;
    }
}
