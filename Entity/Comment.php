<?php

namespace BtoB\SocialNetwork\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comentario
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity(repositoryClass="BtoB\SocialNetwork\CoreBundle\Repository\CommentRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Comment
{
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
     * @ORM\JoinColumn(name="uid",referencedColumnName="idu",nullable=false)
     */
    private $byUser;

    /**
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\Message
     *
     * @ORM\ManyToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\Message",inversedBy="comments")
     * @ORM\JoinColumn(name="mid",referencedColumnName="id",nullable=false)
     */
    private $message;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", nullable=false)
     */
    private $commentText;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=false)
     */
    private $time;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="likes", type="integer", nullable=false)
     */
    private $likes = 0;
    
    /**
     * Imagen del comentario
     * 
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\Document
     * @ORM\OneToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\Document",cascade={"persist","remove"})
     */
    private $imageDocument;

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
     * Set commentText
     *
     * @param string $commentText
     * @return Comment
     */
    public function setCommentText($commentText)
    {
        $this->commentText = $commentText;

        return $this;
    }

    /**
     * Get commentText
     *
     * @return string 
     */
    public function getCommentText()
    {
        return $this->commentText;
    }

    /**
     * Set likes
     *
     * @param integer $likes
     * @return Comment
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;

        return $this;
    }

    /**
     * Get likes
     *
     * @return integer 
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Set byUser
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\User $byUser
     * @return Comment
     */
    public function setByUser(\BtoB\SocialNetwork\CoreBundle\Entity\User $byUser)
    {
        $this->byUser = $byUser;

        return $this;
    }

    /**
     * Get byUser
     *
     * @return \BtoB\SocialNetwork\CoreBundle\Entity\User 
     */
    public function getByUser()
    {
        return $this->byUser;
    }

    /**
     * Set message
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\Message $message
     * @return Comment
     */
    public function setMessage(\BtoB\SocialNetwork\CoreBundle\Entity\Message $message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return \BtoB\SocialNetwork\CoreBundle\Entity\Message 
     */
    public function getMessage()
    {
        return $this->message;
    }
    
    /**
     * 
     * @return Document
     */
    function getImageDocument() 
    {
        return $this->imageDocument;
    }

    function setImageDocument(\BtoB\SocialNetwork\CoreBundle\Entity\Document $imageDocument) {
        $this->imageDocument = $imageDocument;
    }
}
