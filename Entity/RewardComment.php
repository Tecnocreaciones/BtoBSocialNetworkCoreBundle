<?php

namespace BtoB\SocialNetwork\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reward coments
 *
 * @ORM\Table(name="likesComments")
 * @ORM\Entity(repositoryClass="BtoB\SocialNetwork\CoreBundle\Repository\RewardCommentRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class RewardComment
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
     *
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\Comment
     * @ORM\ManyToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\Comment")
     * @ORM\JoinColumn(name="`post`",referencedColumnName="id",nullable=false)
     */
    private $comment;

    /**
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\User",inversedBy="likes")
     * @ORM\JoinColumn(name="`by`",referencedColumnName="idu",nullable=false)
     */
    private $byUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="`time`", type="datetime", nullable=false)
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
     * Set byUser
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\User $byUser
     * @return Like
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
     * @return Like
     */
    public function setMessage(\BtoB\SocialNetwork\CoreBundle\Entity\Message $message)
    {
        $message->addLike($this);
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
     * Set comment
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\Comment $comment
     * @return RewardComment
     */
    public function setComment(\BtoB\SocialNetwork\CoreBundle\Entity\Comment $comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return \BtoB\SocialNetwork\CoreBundle\Entity\Comment 
     */
    public function getComment()
    {
        return $this->comment;
    }
}
