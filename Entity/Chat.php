<?php

namespace BtoB\SocialNetwork\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chat
 *
 * @ORM\Table(name="chat")
 * @ORM\Entity(repositoryClass="BtoB\SocialNetwork\CoreBundle\Repository\ChatRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Chat
{
    /**
     * Mensaje sin leer
     */
    const STATUS_UNREAD = 0;
    
    /**
     * Mensaje leido
     */
    const STATUS_READ = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\User")
     * @ORM\JoinColumn(name="`from`",referencedColumnName="idu",nullable=false)
     */
    protected $from;

    /**
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\User")
     * @ORM\JoinColumn(name="`to`",referencedColumnName="idu",nullable=false)
     */
    protected $to;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", nullable=false)
     */
    protected $message;

    /**
     * @var integer
     *
     * @ORM\Column(name="`read`", type="integer", nullable=false)
     */
    protected $read = self::STATUS_UNREAD;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="`time`", type="datetime", nullable=false)
     */
    protected $time;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="readTime", type="datetime", nullable=true)
     */
    protected $readTime;
    
    /**
     * Historiales del chat
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\ChatHistory
     *
     * @ORM\OneToMany(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\ChatHistory",mappedBy="chat",cascade={"persist"})
     */
    protected $chatHistorys;
    
    public function __construct() {
        $this->chatHistorys = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set from
     *
     * @param integer $from
     * @return Chat
     */
    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Get from
     *
     * @return integer 
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set to
     *
     * @param integer $to
     * @return Chat
     */
    public function setTo($to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get to
     *
     * @return integer 
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Chat
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set read
     *
     * @param integer $read
     * @return Chat
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
     * Set readTime
     *
     * @param \DateTime $readTime
     * @return Chat
     */
    public function setReadTime($readTime)
    {
        $this->readTime = $readTime;

        return $this;
    }

    /**
     * Get readTime
     *
     * @return \DateTime 
     */
    public function getReadTime()
    {
        return $this->readTime;
    }
    
    function getChatHistorys() {
        return $this->chatHistorys;
    }

    function addChatHistory(\BtoB\SocialNetwork\CoreBundle\Entity\ChatHistory $chatHistorys) 
    {
        $chatHistorys->setChat($this);
        $this->chatHistorys->add($chatHistorys);
    }

    public function __clone() {
        if($this->id)
        {
            $this->id = null;
        }
    }
}
