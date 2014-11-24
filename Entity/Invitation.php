<?php

namespace BtoB\SocialNetwork\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BtoB\SocialNetwork\CoreBundle\Model\Invitation as Model;

/**
 * Invitacion
 *
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(name="invitation_idx", columns={"user_id", "email"})})
 * @ORM\Entity(repositoryClass="BtoB\SocialNetwork\CoreBundle\Repository\InvitationRepository")
 */
class Invitation extends Model
{
    const LANGUAGE_ENGLISH = 'english';
    const LANGUAGE_SPANISH = 'espanol';
    
    const SOURCE_API_GMAIL = 'gmail';
    const SOURCE_API_HOTMAIL = 'hotmail';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * Email
     * @var string
     * @ORM\Column(name="email",type="string",length=150)
     */
    private $email;
    
    /**
     * Fuente de api
     * @var string
     * @ORM\Column(name="sourceApi",type="string",length=30)
     */
    private $sourceApi;
    
    /**
     * Idioma en el que se enviara el correo
     * @var string
     * @ORM\Column(name="language",type="string",length=15)
     */
    private $language;
    
    /**
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="idu",nullable=false)
     */
    private $user;
    
    /**
     * Estatus de la invitacion
     * @var integer
     * @ORM\Column(name="status",type="integer")
     */
    private $status = self::STATUS_DRAF;
    
    /**
     *
     * @var \DateTime
     * @ORM\Column(name="createAt",type="datetime",nullable=false)
     */
    private $createAt;
    
    /**
     * Enviado en fecha
     * @var \DateTime
     * @ORM\Column(name="sentAt",type="datetime",nullable=true)
     */
    private $sentAt;


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
     * Set email
     *
     * @param string $email
     * @return Invitation
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Invitation
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

    /**
     * Set user
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\User $user
     * @return Invitation
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
     * Set createAt
     *
     * @param \DateTime $createAt
     * @return Invitation
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime 
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set sentAt
     *
     * @param \DateTime $sentAt
     * @return Invitation
     */
    public function setSentAt($sentAt)
    {
        $this->sentAt = $sentAt;

        return $this;
    }

    /**
     * Get sentAt
     *
     * @return \DateTime 
     */
    public function getSentAt()
    {
        return $this->sentAt;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Invitation
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }
    
    function getSourceApi() {
        return $this->sourceApi;
    }

    function setSourceApi($sourceApi) {
        $this->sourceApi = $sourceApi;
        return $this;
    }


}
