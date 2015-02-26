<?php

/*
 * This file is part of the TecnoCreaciones package.
 * 
 * (c) www.tecnocreaciones.com
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BtoB\SocialNetwork\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Historial del chat individual de cada conversacion
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 * @ORM\Table(name="chatHistory")
 * @ORM\Entity(repositoryClass="BtoB\SocialNetwork\CoreBundle\Repository\ChatHistoryRepository")
 */
class ChatHistory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    
    /**
     * Dueño del historial
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\User")
     * @ORM\JoinColumn(referencedColumnName="idu",nullable=false)
     */
    protected $userOwner;
    
    /**
     * Chat original a mostrar
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\Chat
     *
     * @ORM\ManyToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\Chat",inversedBy="chatHistorys")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $chat;
    
    function getId() 
    {
        return $this->id;
    }
    
    function getUserOwner() 
    {
        return $this->userOwner;
    }

    function getChat() {
        return $this->chat;
    }

    function setChat(\BtoB\SocialNetwork\CoreBundle\Entity\Chat $chat)
    {
        $this->chat = $chat;
    }
    
    function setUserOwner(\BtoB\SocialNetwork\CoreBundle\Entity\User $userOwner)
    {
        $this->userOwner = $userOwner;
    }
}
