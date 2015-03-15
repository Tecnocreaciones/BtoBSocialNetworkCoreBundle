<?php

namespace BtoB\SocialNetwork\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Messages
 *
 * @ORM\Table(name="messages", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity(repositoryClass="BtoB\SocialNetwork\CoreBundle\Repository\MessageRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Message
{
    /**
     * Mensaje simple
     */
    const TYPE_MESSAGE = 'message';
    /**
     * Foto
     */
    const TYPE_PICTURE = 'picture';
    /**
     * Mapa
     */
    const TYPE_MAP = 'map';
    /**
     * Comida
     */
    const TYPE_FOOD = 'food';
    /**
     * Sitio visitado
     */
    const TYPE_VISITED = 'visited';
    /**
     * Juego
     */
    const TYPE_GAME = 'game';
    /**
     * Pelicula
     */
    const TYPE_MOVIE = 'movie';
    /**
     * Musica
     */
    const TYPE_MUSIC = 'music';
    /**
     * Compartido
     */
    const TYPE_SHARED = 'shared';
    /**
     * Video
     */
    const TYPE_VIDEO = 'video';
    /**
     * Compartido de un amigo
     */
    const TYPE_SHARED_FRIEND = 'shared_friend';
    
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
     * @ORM\ManyToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\User",inversedBy="messages")
     * @ORM\JoinColumn(name="uid",referencedColumnName="idu",nullable=false)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", nullable=true)
     */
    private $message;

    /**
     * @var string
     *
     * @ORM\Column(name="tag", type="string", length=256, nullable=true)
     */
    private $tag;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=16, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", nullable=true)
     */
    private $value;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=false)
     */
    private $time;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="public", type="integer", nullable=false)
     */
    private $public;

    /**
     * @var integer
     *
     * @ORM\Column(name="likes", type="integer", nullable=false)
     */
    private $likesCount = 0;

    /**
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\Album
     *
     * @ORM\ManyToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\Album")
     * @ORM\JoinColumn(name="album",referencedColumnName="id")
     */
    private $album;
    
    /**
     * Rewards
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\Like
     * @ORM\OneToMany(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\Like",mappedBy="message",cascade={"remove"})
     */
    private $likes;

    /**
     * Comentarios
     * 
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\Comment
     * @ORM\OneToMany(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\Comment",mappedBy="message",cascade={"remove"})
     */
    private $comments;

    /**
     * Recursos en CDN
     * 
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\ResourceCDN
     * @ORM\ManyToMany(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\ResourceCDN",inversedBy="messages",cascade={"persist","remove"})
     */
    private $resourcesCDN;
    
    /**
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\User")
     * @ORM\JoinColumn(referencedColumnName="idu")
     */
    private $fromUser;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->likes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->resourcesCDN = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set message
     *
     * @param string $message
     * @return Message
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
     * Set tag
     *
     * @param string $tag
     * @return Message
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Message
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return Message
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
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
     * Set public
     *
     * @param integer $public
     * @return Message
     */
    public function setPublic($public)
    {
        $this->public = $public;

        return $this;
    }

    /**
     * Get public
     *
     * @return integer 
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * Set album
     *
     * @param integer $album
     * @return Message
     */
    public function setAlbum($album)
    {
        $this->album = $album;

        return $this;
    }

    /**
     * Get album
     *
     * @return integer 
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * Set user
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\User $user
     * @return Message
     */
    public function setUser(\BtoB\SocialNetwork\CoreBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \BtoB\SocialNetwork\CoreBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    function validateData(){
        if($this->type == self::TYPE_MESSAGE){
            $this->type = null;
        }
    }
    
    /**
     * Retorna los tipos de publicaciones disponibles
     * @return type
     */
    public static function getTypesAvailable(){
        return array(
            self::TYPE_MESSAGE => self::TYPE_MESSAGE,
            self::TYPE_PICTURE => self::TYPE_PICTURE,
            self::TYPE_FOOD => self::TYPE_FOOD,
            self::TYPE_GAME => self::TYPE_GAME,
            self::TYPE_MAP => self::TYPE_MAP,
            self::TYPE_MOVIE => self::TYPE_MOVIE,
            self::TYPE_MUSIC => self::TYPE_MUSIC,
            self::TYPE_SHARED => self::TYPE_SHARED,
            self::TYPE_VIDEO => self::TYPE_VIDEO,
            self::TYPE_VISITED => self::TYPE_VISITED,
        );
    }

    /**
     * Set likesCount
     *
     * @param integer $likesCount
     * @return Message
     */
    public function setLikesCount($likesCount)
    {
        $this->likesCount = $likesCount;

        return $this;
    }

    /**
     * Get likesCount
     *
     * @return integer 
     */
    public function getLikesCount()
    {
        return $this->likesCount;
    }

    /**
     * Add likes
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\Like $likes
     * @return Message
     */
    public function addLike(\BtoB\SocialNetwork\CoreBundle\Entity\Like $likes)
    {
        $this->likesCount++;
        $this->likes->add($likes);

        return $this;
    }

    /**
     * Remove likes
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\Like $likes
     */
    public function removeLike(\BtoB\SocialNetwork\CoreBundle\Entity\Like $likes)
    {
        $this->likesCount--;
        $this->likes->removeElement($likes);
    }

    /**
     * Get likes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLikes()
    {
        return $this->likes;
    }
    
    public function __toString() {
        return $this->message."(".$this->id.")";
    }

    /**
     * Add comments
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\Comment $comments
     * @return Message
     */
    public function addComment(\BtoB\SocialNetwork\CoreBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\Comment $comments
     */
    public function removeComment(\BtoB\SocialNetwork\CoreBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @ORM\PrePersist()
     * @return Message
     */
    public function setCreatedAt()
    {
        $this->createdAt = new \DateTime();

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Add resourcesCDN
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\ResourceCDN $resourcesCDN
     * @return Message
     */
    public function addResourcesCDN(\BtoB\SocialNetwork\CoreBundle\Entity\ResourceCDN $resourcesCDN)
    {
        $this->resourcesCDN->add($resourcesCDN);

        return $this;
    }

    /**
     * Remove resourcesCDN
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\ResourceCDN $resourcesCDN
     */
    public function removeResourcesCDN(\BtoB\SocialNetwork\CoreBundle\Entity\ResourceCDN $resourcesCDN)
    {
        $this->resourcesCDN->removeElement($resourcesCDN);
    }

    /**
     * Get resourcesCDN
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResourcesCDN()
    {
        return $this->resourcesCDN;
    }
    
    /**
     * 
     * @return \BtoB\SocialNetwork\CoreBundle\Entity\User
     */
    function getFromUser() 
    {
        return $this->fromUser;
    }

    function setFromUser(\BtoB\SocialNetwork\CoreBundle\Entity\User $fromUser) 
    {
        $this->fromUser = $fromUser;
    }
}
