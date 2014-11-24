<?php

namespace BtoB\SocialNetwork\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Relation (Define las amistades)
 *
 * @ORM\Table(name="relations",uniqueConstraints={@ORM\UniqueConstraint(name="unique_relation_friend", columns={"leader", "subscriber"})})
 * @ORM\Entity(repositoryClass="BtoB\SocialNetwork\CoreBundle\Repository\RelationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Relation
{
    /**
     * Amistad sin confirmar
     */
    const STATUS_UNCONFIRMED = 0;
    /**
     * Amistad confirmada
     */
    const STATUS_CONFIRMED = 1;
    /**
     * Amistad declinada (No aceptada)
     */
    const STATUS_DECLINE = 2;
    /**
     * Amistad bloqueada
     */
    const STATUS_BLOCKED = 3;
    
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
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\User",inversedBy="leaders")
     * @ORM\JoinColumn(name="leader",referencedColumnName="idu",nullable=false)
     */
    private $leader;

    /**
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\User",inversedBy="subscribers")
     * @ORM\JoinColumn(name="subscriber",referencedColumnName="idu",nullable=false)
     */
    private $subscriber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=false)
     */
    private $time;

    /**
     * ¿Amistad confimada?
     * 
     * @var integer
     * @ORM\Column(name="status", type="integer", options={"default" = 0})
     */
    private $status = self::STATUS_UNCONFIRMED;

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
     * Set leader
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\User $leader
     * @return Relation
     */
    public function setLeader(\BtoB\SocialNetwork\CoreBundle\Entity\User $leader)
    {
        $this->leader = $leader;

        return $this;
    }

    /**
     * Get leader
     *
     * @return \BtoB\SocialNetwork\CoreBundle\Entity\User 
     */
    public function getLeader()
    {
        return $this->leader;
    }

    /**
     * Set subscriber
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\User $subscriber
     * @return Relation
     */
    public function setSubscriber(\BtoB\SocialNetwork\CoreBundle\Entity\User $subscriber)
    {
        $this->subscriber = $subscriber;

        return $this;
    }

    /**
     * Get subscriber
     *
     * @return \BtoB\SocialNetwork\CoreBundle\Entity\User 
     */
    public function getSubscriber()
    {
        return $this->subscriber;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Relation
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    public static function getStatusAvailable()
    {
        return array(
            self::STATUS_UNCONFIRMED => 'unconfirmed',
            self::STATUS_CONFIRMED => 'confirmed',
            self::STATUS_DECLINE => 'decline',
            self::STATUS_BLOCKED => 'blocked',
        );
    }
}
