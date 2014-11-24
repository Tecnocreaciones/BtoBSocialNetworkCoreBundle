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

use FOS\UserBundle\Form\Type\ChangePasswordFormType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Formulario para cambiar la contraseña
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 */
class UserChangePasswordFormType extends ChangePasswordFormType 
{
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BtoB\SocialNetwork\CoreBundle\Entity\User',
            'intention'  => 'change_password',
        ));
    }
    
    public function getName()
    {
        return 'user';
    }
}
