<?php

namespace BtoB\SocialNetwork\CoreBundle\Form;

use BtoB\SocialNetwork\CoreBundle\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MessageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = null;//Asi se puede ver en la api
        if($builder->getData()){
            $user = $builder->getData()->getUser();
        }
        $builder
            ->add('message','text',array(
                'description' => 'Mensaje a publicar',
            ))
            ->add('tag',null,array(
                'required' => false,
            ))
            ->add('type','choice',array(
                'description' => 'Tipos de publicaciones disponibles',
                'choices' => Message::getTypesAvailable(),
                'required' => false,
            ))
            ->add('value',null,array(
                'required' => false
            ))
            ->add('public')
            ->add('album','entity',array(
                'class' => 'BtoB\SocialNetwork\CoreBundle\Entity\Album',
                'required' => false,
                'description' => 'Asignar a un album existente',
                'query_builder' => function(\Doctrine\ORM\EntityRepository $er) use ($user){
                    return $er->createQueryBuilder('a')
                            ->andWhere('a.user = :user')
                            ->setParameter('user', $user);
                }
            ))
            ->add('new_album',null,array(
                'required' => false,
                'description' => 'Crea y asigna el nuevo album',
                'mapped' => false,
            ))
            ->add('images','file',array(
                'description' => 'Imagenes a subir en forma de array (messages[images][0],messages[images][1]...)',
                'required' => false,
                'mapped' => false,
                'multiple' => true,
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BtoB\SocialNetwork\CoreBundle\Entity\Message',
            'csrf_protection' => false
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'message';
    }
}
