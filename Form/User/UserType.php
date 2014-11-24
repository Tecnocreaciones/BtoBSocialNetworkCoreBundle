<?php

namespace BtoB\SocialNetwork\CoreBundle\Form\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Formulario del usuario
 */
class UserType extends AbstractType
{
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
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ))
            ->add('gender',null,array(
                'description' => 'Genero',
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
            ->add('website',null,array(
                'description' => 'Sitio web',
                'required' => false,
            ))
            ->add('codigoPostal',null,array(
                'description' => 'Codigo postal',
                'required' => false,
            ))
            ->add('biography',null,array(
                'description' => 'Biografia',
                'required' => false,
            ))
            
            //Informacion extra
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
            ->add('libro',null,array(
                'description' => 'Título de tu Libro Favorito',
                'required' => false,
            ))
            ->add('pelicula',null,array(
                'description' => 'Nombre de tu Película Favorita',
                'required' => false,
            ))
              
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
                'description' => 'Privacidad del chat',
                'required' => false,
            ))
                
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
            
            //Notificaciones
            ->add('notificationReward',"choice",array(
                'description' => 'Mostrar alertas y notificaciones para Me Reward',
                'choices' => array(false,true),
                'required' => false,
            ))
            ->add('notificationComments',"choice",array(
                'description' => 'Mostrar alertas y notificaciones para Comentarios',
                'required' => false,
                'choices' => array(false,true),
            ))
            ->add('notificationMessageShared',"choice",array(
                'description' => 'Mostrar alertas y notificaciones para Mensajes compartidos',
                'required' => false,
                'choices' => array(false,true),
            ))
            ->add('notificationChat',"choice",array(
                'description' => 'Mostrar alertas y notificaciones para Chats',
                'required' => false,
                'choices' => array(false,true),
            ))
            ->add('notificationAddFriend',"choice",array(
                'description' => 'Mostrar alertas y notificaciones para la Adición de amigos',
                'required' => false,
                'choices' => array(false,true),
            ))
            
            //Emails
            ->add('emailComment',"choice",array(
                'description' => 'Recibir un correo electrónico cuando alguien comente en tus mensajes',
                'required' => false,
                'choices' => array(false,true),
            ))
            ->add('emailReward',"choice",array(
                'description' => 'Recibir corrreo electrónico cuando a alguien otorgue un reward a su comentario',
                'required' => false,
                'choices' => array(false,true),
            ))
            ->add('emailNewFriend',"choice",array(
                'description' => 'Recibir correos electrónicos cuando alguien te agregue como amigo',
                'required' => false,
                'choices' => array(false,true),
            ))
            
            //Sonidos
            ->add('soundNewNotification',"choice",array(
                'description' => 'Reproducir un sonido al recibir una nueva notificacion',
                'required' => false,
                'choices' => array(false,true),
            ))
            ->add('soundNewChat',"choice",array(
                'description' => 'Reproducir un sonido al recibir un nuevo mensaje por chat',
                'required' => false,
                'choices' => array(false,true),
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BtoB\SocialNetwork\CoreBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'user';
    }
}
