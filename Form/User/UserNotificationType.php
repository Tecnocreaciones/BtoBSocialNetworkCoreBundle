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
 * Formulario del usuario para cambiar la configuracion de las notificaciones
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 */
class UserNotificationType extends UserType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //Notificaciones
            ->add('notificationReward',null,array(
                'description' => 'Mostrar alertas y notificaciones para Me Reward',
                'required' => false,
            ))
            ->add('notificationComments',null,array(
                'description' => 'Mostrar alertas y notificaciones para Comentarios',
                'required' => false,
            ))
            ->add('notificationMessageShared',null,array(
                'description' => 'Mostrar alertas y notificaciones para Mensajes compartidos',
                'required' => false,
            ))
            ->add('notificationChat',null,array(
                'description' => 'Mostrar alertas y notificaciones para Chats',
                'required' => false,
            ))
            ->add('notificationAddFriend',null,array(
                'description' => 'Mostrar alertas y notificaciones para la Adición de amigos',
                'required' => false,
            ))
            
            //Sonidos
            ->add('soundNewNotification',null,array(
                'description' => 'Reproducir un sonido al recibir una nueva notificacion',
                'required' => false,
            ))
            ->add('soundNewChat',null,array(
                'description' => 'Reproducir un sonido al recibir un nuevo mensaje por chat',
                'required' => false,
            ))
                
            //Emails
            ->add('emailComment',null,array(
                'description' => 'Recibir un correo electrónico cuando alguien comente en tus mensajes',
                'required' => false,
            ))
            ->add('emailReward',null,array(
                'description' => 'Recibir corrreo electrónico cuando a alguien otorgue un reward a su comentario',
                'required' => false,
            ))
            ->add('emailNewFriend',null,array(
                'description' => 'Recibir correos electrónicos cuando alguien te agregue como amigo',
                'required' => false,
            ))
        ;
    }
}
