<?php

/*
 * This file is part of the TecnoCreaciones package.
 * 
 * (c) www.tecnocreaciones.com
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BtoB\SocialNetwork\CoreBundle\Controller;

use BtoB\SocialNetwork\CoreBundle\Entity\Invitation;
use BtoB\SocialNetwork\CoreBundle\Service\TwigSwiftMailer;
use DateTime;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controlador de correos masivos
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 */
class EmailController extends FOSRestController
{
    function sendInvitationAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('BtoB\SocialNetwork\CoreBundle\Entity\Invitation');
        
        $entities = $repository->findBy(array(
            'status' => Invitation::STATUS_DRAF
        ));
        
        $mailer = $this->getMailer();
        $fromEmail = 'no-reply@btobsocialnetwork.com';
        $i = 0;
        foreach ($entities as $entity) {
            $templateName = 'BtoBSocialNetworkCoreBundle:Email:invitation.en.html.twig';
            $user = $entity->getUser();
            
                    
            $username = $user->getUsername();
            if($user->getFirstName() != '' && $user->getLastName() != ''){
                $username = $user->getFirstName().' '.$user->getLastName();
            }
            
            $context = array(
                'username' => $username,
            );
            if($entity->getLanguage() == Invitation::LANGUAGE_SPANISH){
                $templateName = 'BtoBSocialNetworkCoreBundle:Email:invitation.es.html.twig';
            }
            $toEmail = $entity->getEmail();
            $mailer->sendMessage($templateName, $context, $fromEmail, $toEmail);
            $entity
                    ->setStatus(Invitation::STATUS_SEND)
                    ->setSentAt(new DateTime())
                    ;
            $em->persist($entity);
            $i++;
        }
        $data = array();
        $data['message_send'] = $i;
        $em->flush();
        
        $view = $this->view();
        $view->setData($data);
        return $this->handleView($view);
    }
    
    function sendInvitationTestAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $language = $request->get('lang','en');
        $toEmail = $request->get('toEmail','inhack20@gmail.com');
        $fromEmail = $request->get('fromEmail','no-reply@btobsocialnetwork.com');
        
        $mailer = $this->getMailerMemory();
        $i = 0;
        $templateName = 'BtoBSocialNetworkCoreBundle:Email:invitation.en.html.twig';
        $context = array(
            'username' => 'Carlos Mendoza',
        );
        if($language == 'es'){
            $templateName = 'BtoBSocialNetworkCoreBundle:Email:invitation.es.html.twig';
        }
        $mailer->sendMessage($templateName, $context, $fromEmail, $toEmail);
        $i++;
        $data = array();
        $data['message_send'] = $i;
        
        $view = $this->view();
        $view->setData($data);
        return $this->handleView($view);
    }
    
    /**
     * @return TwigSwiftMailer
     */
    protected function getMailer()
    {
        return $this->get('btob.mailer.twig_swift');
    }
    
    /**
     * @return TwigSwiftMailer
     */
    protected function getMailerMemory()
    {
        return $this->get('btob.mailer.twig_swift_memory');
    }
}