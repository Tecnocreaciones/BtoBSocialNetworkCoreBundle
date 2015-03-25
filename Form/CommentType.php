<?php

namespace BtoB\SocialNetwork\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('commentText',null,array(
                "required" => true,
            ))
            ->add('image',"file",array(
                "required" => false,
                "mapped" => false,
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BtoB\SocialNetwork\CoreBundle\Entity\Comment',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'btob_socialnetwork_corebundle_comment';
    }
}
