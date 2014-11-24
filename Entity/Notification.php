<?php

namespace BtoB\SocialNetwork\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notificacion
 *
 * @ORM\Table(name="notifications")
 * @ORM\Entity(repositoryClass="BtoB\SocialNetwork\CoreBundle\Repository\NotificationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Notification
{
    /**
     * Notificacion de comentario
     */
    const TYPE_COMMENT = 1;
    /**
     * Notificacion de reward a publicacion(Antiguo like)
     */
    const TYPE_REWARD = 2;
    /**
     * Notificacion de compartir contenido
     */
    const TYPE_SHARED = 3;
    /**
     * Notificacion cuando te agrega un amigo
     */
    const TYPE_FRIEND = 4;
    /**
     * Notificacion de reward a comentario
     */
    const TYPE_REWARD_COMMENT = 5;
    /**
     * Notificacion de compartido de un amigo
     */
    const TYPE_SHARED_FRIEND  = 6;
    /**
     * Notificacion de mensaje por el chat
     */
    const TYPE_CHAT = 'chat';
    
    /**
     * Notificacion sin leer
     */
    const NOTIFICATION_UNREAD = 0;
    /**
     * Notificacion leida
     */
    const NOTIFICATION_READ = 1;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\User")
     * @ORM\JoinColumn(name="`from`",referencedColumnName="idu",nullable=false)
     */
    private $from;

    /**
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\User")
     * @ORM\JoinColumn(name="`to`",referencedColumnName="idu",nullable=false)
     */
    private $to;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="parent", type="integer", nullable=false)
     */
    private $parent;

    /**
     * @var integer
     *
     * @ORM\Column(name="child", type="integer", nullable=false)
     */
    private $child;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer", nullable=false)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="read", type="boolean", nullable=false)
     */
    private $read = self::NOTIFICATION_UNREAD;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=false)
     */
    private $time;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set time
     *
     * @ORM\PrePersist
     * @param \DateTime $time
     * @return Message
     */
    public function setTime()
    {
        
        $this->time = new \DateTime();

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set parent
     *
     * @param integer $parent
     * @return Notification
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return integer 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set child
     *
     * @param integer $child
     * @return Notification
     */
    public function setChild($child)
    {
        $this->child = $child;

        return $this;
    }

    /**
     * Get child
     *
     * @return integer 
     */
    public function getChild()
    {
        return $this->child;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Notification
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set read
     *
     * @param integer $read
     * @return Notification
     */
    public function setRead($read)
    {
        $this->read = $read;

        return $this;
    }

    /**
     * Get read
     *
     * @return integer 
     */
    public function getRead()
    {
        return $this->read;
    }

    /**
     * Set from
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\User $from
     * @return Notification
     */
    public function setFrom(\BtoB\SocialNetwork\CoreBundle\Entity\User $from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Get from
     *
     * @return \BtoB\SocialNetwork\CoreBundle\Entity\User 
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set to
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\User $to
     * @return Notification
     */
    public function setTo(\BtoB\SocialNetwork\CoreBundle\Entity\User $to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get to
     *
     * @return \BtoB\SocialNetwork\CoreBundle\Entity\User 
     */
    public function getTo()
    {
        return $this->to;
    }
}
