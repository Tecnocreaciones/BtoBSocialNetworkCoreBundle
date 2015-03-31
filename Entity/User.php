<?php

namespace BtoB\SocialNetwork\CoreBundle\Entity;

use BtoB\SocialNetwork\CoreBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="BtoB\SocialNetwork\CoreBundle\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idu", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=32, nullable=true)
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=32, nullable=true)
     */
    protected $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=128, nullable=true)
     */
    protected $location;

    /**
     * @var string
     *
     * @ORM\Column(name="localtionEstado", type="string", length=250, nullable=true)
     */
    protected $locationEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="localtionCiudad", type="string", length=250, nullable=true)
     */
    protected $locationCiudad;

    /**
     * @var string
     *
     * @ORM\Column(name="codigoPostal", type="string", length=250, nullable=true)
     */
    protected $codigoPostal;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=128, nullable=true)
     */
    protected $website;

    /**
     * @var string
     *
     * @ORM\Column(name="bio", type="string", length=160, nullable=true)
     */
    protected $biography;

    /**
     * Fecha de registro
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    protected $date;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=256, nullable=true)
     */
    protected $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=128, nullable=true)
     */
    protected $twitter;

    /**
     * @var string
     *
     * @ORM\Column(name="gplus", type="string", length=256, nullable=true)
     */
    protected $gplus;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=128, nullable=true)
     */
    protected $image = "default.png";

    /**
     * Privacidad del Perfil
     * @var integer
     *
     * @ORM\Column(name="private", type="integer", nullable=true)
     */
    protected $private;

    /**
     * @var string
     *
     * @ORM\Column(name="salted", type="string", length=256, nullable=true)
     */
    protected $salted;

    /**
     * @var string
     *
     * @ORM\Column(name="background", type="string", length=256, nullable=true)
     */
    protected $background;

    /**
     * @var string
     *
     * @ORM\Column(name="cover", type="string", length=128, nullable=false)
     */
    protected $cover = "default.png";

    /**
     * @var integer
     *
     * @ORM\Column(name="verified", type="integer", nullable=true)
     */
    protected $verified;

    /**
     * La forma habitual de publicar mensajes
     * @var integer
     *
     * @ORM\Column(name="privacy", type="integer", nullable=false)
     */
    protected $privacy = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="gender", type="integer", nullable=true)
     */
    protected $gender;

    /**
     * @var integer
     *
     * @ORM\Column(name="online", type="integer", nullable=true)
     */
    protected $online;

    /**
     * Estatus del chat
     * @var integer
     *
     * @ORM\Column(name="offline", type="integer", nullable=true)
     */
    protected $offline;

    /**
     * Mostrar alertas y notificaciones para Me Reward
     * @var boolean
     *
     * @ORM\Column(name="notificationl", type="boolean", nullable=true)
     */
    protected $notificationReward = true;

    /**
     * Mostrar alertas y notificaciones para Comentarios
     * @var boolean
     *
     * @ORM\Column(name="notificationc", type="boolean", nullable=true)
     */
    protected $notificationComments = true;

    /**
     * Mostrar alertas y notificaciones para Mensajes compartidos
     * @var boolean
     *
     * @ORM\Column(name="notifications", type="boolean", nullable=true)
     */
    protected $notificationMessageShared = true;

    /**
     * Mostrar alertas y notificaciones para Chats
     * @var boolean
     *
     * @ORM\Column(name="notificationd", type="boolean", nullable=true)
     */
    protected $notificationChat = true;

    /**
     * Mostrar alertas y notificaciones para la Adición de amigos
     * @var boolean
     *
     * @ORM\Column(name="notificationf", type="boolean", nullable=true)
     */
    protected $notificationAddFriend = true;

    /**
     * Recibir un correo electrónico cuando alguien comente en tus mensajes
     * @var boolean
     *
     * @ORM\Column(name="email_comment", type="boolean", nullable=true)
     */
    protected $emailComment = true;

    /**
     * Recibir corrreo electrónico cuando a alguien otorgue un reward a su comentario
     * @var boolean
     *
     * @ORM\Column(name="email_like", type="boolean", nullable=true)
     */
    protected $emailReward = true;

    /**
     * Recibir correos electrónicos cuando alguien te agregue como amigo
     * @var boolean
     *
     * @ORM\Column(name="email_new_friend", type="boolean", nullable=true)
     */
    protected $emailNewFriend = true;

    /**
     * Reproducir un sonido al recibir una nueva notificacion
     * @var boolean
     *
     * @ORM\Column(name="sound_new_notification", type="boolean", nullable=true)
     */
    protected $soundNewNotification = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sound_new_chat", type="boolean", nullable=true)
     */
    protected $soundNewChat=true;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="born", type="date", nullable=false)
     */
    protected $born;

    /**
     * @var string
     *
     * @ORM\Column(name="condiciones", type="string", length=5, nullable=false)
     */
    protected $condiciones = "si";

    /**
     * @var string
     *
     * @ORM\Column(name="libro", type="string", length=250, nullable=true)
     */
    protected $libro;

    /**
     * @var string
     *
     * @ORM\Column(name="pelicula", type="string", length=250, nullable=true)
     */
    protected $pelicula;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fNacimiento", type="date", nullable=true)
     */
    protected $fnacimiento;
    
    /**
     * Mensajes
     * 
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\Message
     * @ORM\OneToMany(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\Message",mappedBy="user")
     */
    protected $messages;
    
    /**
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\Relation
     * 
     * @ORM\OneToMany(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\Relation",mappedBy="subscriber") 
     */
    protected $subscribers;
    
    /**
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\Relation
     * 
     * @ORM\OneToMany(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\Relation",mappedBy="leader") 
     */
    protected $leaders;
    
    /**
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\Like
     * 
     * @ORM\OneToMany(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\Like",mappedBy="byUser") 
     */
    protected $likes;
    
    /**
     * Usuario que te refirio a BtoB
     * 
     * @var User
     * @ORM\ManyToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\User",inversedBy="myReferrals")
     * @ORM\JoinColumn(name="referredBy_id",referencedColumnName="idu")
     */
    protected $referredBy;
    
    /**
     * Mis referidos
     * @var User
     * @ORM\OneToMany(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\User",mappedBy="referredBy")
     */
    protected $myReferrals;

    /**
     * Recursos en CDN del Perfil
     * 
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\ResourceCDN
     * @ORM\ManyToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\ResourceCDN",cascade={"persist","remove"})
     */
    private $profileResourceCDN;
    
    /**
     * Recursos en CDN de la imagen de portada
     * 
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\ResourceCDN
     * @ORM\ManyToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\ResourceCDN",cascade={"persist","remove"})
     */
    private $coverResourceCDN;
    
    /**
     * Porcentaje del perfil completo
     * @var string
     * @ORM\Column(name="percentage_complete",type="float",nullable=true)
     */
    protected $percentageComplete = 0;
    
    /**
     * Tipo de cuenta
     * 
     * @var string
     * @ORM\Column(name="type_charge",type="string",length=50,nullable=true)
     */
    private $typeCharge;
    
    /**
     * Cuenta de paypal
     * 
     * @var string
     * @ORM\Column(name="paypal_account",type="string",length=100,nullable=true)
     */
    private $paypalAccount;
    
    /**
     * Nombre a emitir el cheque
     * 
     * @var string
     * @ORM\Column(name="name_check",type="string",length=100,nullable=true)
     */
    private $nameCheck;
    
    /**
     * Direccion a emitir el cheque
     * 
     * @var string
     * @ORM\Column(name="direction_check",type="text",nullable=true)
     */
    private $directionCheck;
    
    /**
     * Zona horario
     * @var string
     * @ORM\Column(name="timezone",type="string",length=64,nullable=true)
     */
    private $timezone;
    
    /**
     * Cuenta del banco
     * 
     * @var string
     * @ORM\Column(name="number_bank_account",type="string",length=30,nullable=true)
     */
    private $numberBankAccount;
    
    /**
     * Nombre del banco
     * 
     * @var string
     * @ORM\Column(name="bank_name_bank_account",type="string",length=100,nullable=true)
     */
    private $bankNameBankAccount;
    
    /**
     * Nombre del titular de la cuenta del banco
     * 
     * @var string
     * @ORM\Column(name="name_titular_bank_account",type="string",length=100,nullable=true)
     */
    private $nameTitularBankAccount;
    
    /**
     * Id del titula de la cuenta del banco
     * 
     * @var string
     * @ORM\Column(name="id_titular_bank_account",type="string",length=100,nullable=true)
     */
    private $idTitularBankAccount;
    
    /**
     *
     * @var \DateTest
     * @ORM\Column(name="lastDateChatOnLine",type="datetime",nullable=true)
     */
    private $lastDateChatOnLine;

    public function __construct() {
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->subscribers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->leaders = new \Doctrine\Common\Collections\ArrayCollection();
        $this->likes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->myReferrals = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get idu
     *
     * @return integer 
     */
    public function getIdu()
    {
        return $this->idu;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setEmail($email) {
        parent::setEmail($email);
        if(strpos($email,'@') !== false){
            $data = explode('@', $email);
            $username = $data[0].'_'. rand(1, 99999);
            parent::setUsername($username);
        }
    }
    
    /**
     * Valida la fecha de nacimiento
     * @return boolean
     */
    public function isValidBorn(){
        $date = $this->born;
        if($date != null){
            if($this->calculaEdad($date->format('Y-m-d')) >= 18){
                return true;
            }
        }
        
        return false;
    }
    
    private function calculaEdad($fecha) {
        list($Y,$m,$d) = explode("-",$fecha);
        return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return User
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set locationEstado
     *
     * @param string $locationEstado
     * @return User
     */
    public function setLocationEstado($locationEstado)
    {
        $this->locationEstado = $locationEstado;

        return $this;
    }

    /**
     * Get locationEstado
     *
     * @return string 
     */
    public function getLocationEstado()
    {
        return $this->locationEstado;
    }

    /**
     * Set locationCiudad
     *
     * @param string $locationCiudad
     * @return User
     */
    public function setLocationCiudad($locationCiudad)
    {
        $this->locationCiudad = $locationCiudad;

        return $this;
    }

    /**
     * Get locationCiudad
     *
     * @return string 
     */
    public function getLocationCiudad()
    {
        return $this->locationCiudad;
    }

    /**
     * Set codigoPostal
     *
     * @param string $codigoPostal
     * @return User
     */
    public function setCodigoPostal($codigoPostal)
    {
        $this->codigoPostal = $codigoPostal;

        return $this;
    }

    /**
     * Get codigoPostal
     *
     * @return string 
     */
    public function getCodigoPostal()
    {
        return $this->codigoPostal;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return User
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set biography
     *
     * @param string $biography
     * @return User
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * Get biography
     *
     * @return string 
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return User
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     * @return User
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string 
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     * @return User
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string 
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set gplus
     *
     * @param string $gplus
     * @return User
     */
    public function setGplus($gplus)
    {
        $this->gplus = $gplus;

        return $this;
    }

    /**
     * Get gplus
     *
     * @return string 
     */
    public function getGplus()
    {
        return $this->gplus;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return User
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set private
     *
     * @param integer $private
     * @return User
     */
    public function setPrivate($private)
    {
        $this->private = $private;

        return $this;
    }

    /**
     * Get private
     *
     * @return integer 
     */
    public function getPrivate()
    {
        return $this->private;
    }

    /**
     * Set salted
     *
     * @param string $salted
     * @return User
     */
    public function setSalted($salted)
    {
        $this->salted = $salted;

        return $this;
    }

    /**
     * Get salted
     *
     * @return string 
     */
    public function getSalted()
    {
        return $this->salted;
    }

    /**
     * Set background
     *
     * @param string $background
     * @return User
     */
    public function setBackground($background)
    {
        $this->background = $background;

        return $this;
    }

    /**
     * Get background
     *
     * @return string 
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * Set cover
     *
     * @param string $cover
     * @return User
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return string 
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set verified
     *
     * @param integer $verified
     * @return User
     */
    public function setVerified($verified)
    {
        $this->verified = $verified;

        return $this;
    }

    /**
     * Get verified
     *
     * @return integer 
     */
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * Set privacy
     *
     * @param integer $privacy
     * @return User
     */
    public function setPrivacy($privacy)
    {
        $this->privacy = $privacy;

        return $this;
    }

    /**
     * Get privacy
     *
     * @return integer 
     */
    public function getPrivacy()
    {
        return $this->privacy;
    }

    /**
     * Set gender
     *
     * @param integer $gender
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return integer 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set online
     *
     * @param integer $online
     * @return User
     */
    public function setOnline($online)
    {
        $this->online = $online;

        return $this;
    }

    /**
     * Get online
     *
     * @return integer 
     */
    public function getOnline()
    {
        return $this->online;
    }

    /**
     * Set offline
     *
     * @param boolean $offline
     * @return User
     */
    public function setOffline($offline)
    {
        $this->offline = $offline;

        return $this;
    }

    /**
     * Get offline
     *
     * @return boolean 
     */
    public function getOffline()
    {
        return $this->offline;
    }

    /**
     * Set notificationReward
     *
     * @param boolean $notificationReward
     * @return User
     */
    public function setNotificationReward($notificationReward)
    {
        $this->notificationReward = $notificationReward;

        return $this;
    }

    /**
     * Get notificationReward
     *
     * @return boolean 
     */
    public function getNotificationReward()
    {
        return $this->notificationReward;
    }

    /**
     * Set notificationComments
     *
     * @param boolean $notificationComments
     * @return User
     */
    public function setNotificationComments($notificationComments)
    {
        $this->notificationComments = $notificationComments;

        return $this;
    }

    /**
     * Get notificationComments
     *
     * @return boolean 
     */
    public function getNotificationComments()
    {
        return $this->notificationComments;
    }

    /**
     * Set notificationMessageShared
     *
     * @param boolean $notificationMessageShared
     * @return User
     */
    public function setNotificationMessageShared($notificationMessageShared)
    {
        $this->notificationMessageShared = $notificationMessageShared;

        return $this;
    }

    /**
     * Get notificationMessageShared
     *
     * @return boolean 
     */
    public function getNotificationMessageShared()
    {
        return $this->notificationMessageShared;
    }

    /**
     * Set notificationChat
     *
     * @param boolean $notificationChat
     * @return User
     */
    public function setNotificationChat($notificationChat)
    {
        $this->notificationChat = $notificationChat;

        return $this;
    }

    /**
     * Get notificationChat
     *
     * @return boolean 
     */
    public function getNotificationChat()
    {
        return $this->notificationChat;
    }

    /**
     * Set notificationAddFriend
     *
     * @param boolean $notificationAddFriend
     * @return User
     */
    public function setNotificationAddFriend($notificationAddFriend)
    {
        $this->notificationAddFriend = $notificationAddFriend;

        return $this;
    }

    /**
     * Get notificationAddFriend
     *
     * @return boolean 
     */
    public function getNotificationAddFriend()
    {
        return $this->notificationAddFriend;
    }

    /**
     * Set emailComment
     *
     * @param boolean $emailComment
     * @return User
     */
    public function setEmailComment($emailComment)
    {
        $this->emailComment = $emailComment;

        return $this;
    }

    /**
     * Get emailComment
     *
     * @return boolean 
     */
    public function getEmailComment()
    {
        return $this->emailComment;
    }

    /**
     * Set emailReward
     *
     * @param boolean $emailReward
     * @return User
     */
    public function setEmailReward($emailReward)
    {
        $this->emailReward = $emailReward;

        return $this;
    }

    /**
     * Get emailReward
     *
     * @return boolean 
     */
    public function getEmailReward()
    {
        return $this->emailReward;
    }

    /**
     * Set emailNewFriend
     *
     * @param boolean $emailNewFriend
     * @return User
     */
    public function setEmailNewFriend($emailNewFriend)
    {
        $this->emailNewFriend = $emailNewFriend;

        return $this;
    }

    /**
     * Get emailNewFriend
     *
     * @return boolean 
     */
    public function getEmailNewFriend()
    {
        return $this->emailNewFriend;
    }

    /**
     * Set soundNewNotification
     *
     * @param boolean $soundNewNotification
     * @return User
     */
    public function setSoundNewNotification($soundNewNotification)
    {
        $this->soundNewNotification = $soundNewNotification;

        return $this;
    }

    /**
     * Get soundNewNotification
     *
     * @return boolean 
     */
    public function getSoundNewNotification()
    {
        return $this->soundNewNotification;
    }

    /**
     * Set soundNewChat
     *
     * @param boolean $soundNewChat
     * @return User
     */
    public function setSoundNewChat($soundNewChat)
    {
        $this->soundNewChat = $soundNewChat;

        return $this;
    }

    /**
     * Get soundNewChat
     *
     * @return boolean 
     */
    public function getSoundNewChat()
    {
        return $this->soundNewChat;
    }

    /**
     * Set born
     *
     * @param \DateTime $born
     * @return User
     */
    public function setBorn($born)
    {
        $this->born = $born;

        return $this;
    }

    /**
     * Get born
     *
     * @return \DateTime 
     */
    public function getBorn()
    {
        return $this->born;
    }

    /**
     * Set condiciones
     *
     * @param string $condiciones
     * @return User
     */
    public function setCondiciones($condiciones)
    {
        $this->condiciones = $condiciones;

        return $this;
    }

    /**
     * Get condiciones
     *
     * @return string 
     */
    public function getCondiciones()
    {
        return $this->condiciones;
    }

    /**
     * Set libro
     *
     * @param string $libro
     * @return User
     */
    public function setLibro($libro)
    {
        $this->libro = $libro;

        return $this;
    }

    /**
     * Get libro
     *
     * @return string 
     */
    public function getLibro()
    {
        return $this->libro;
    }

    /**
     * Set pelicula
     *
     * @param string $pelicula
     * @return User
     */
    public function setPelicula($pelicula)
    {
        $this->pelicula = $pelicula;

        return $this;
    }

    /**
     * Get pelicula
     *
     * @return string 
     */
    public function getPelicula()
    {
        return $this->pelicula;
    }

    /**
     * Set fnacimiento
     *
     * @param \DateTime $fnacimiento
     * @return User
     */
    public function setFnacimiento($fnacimiento)
    {
        $this->fnacimiento = $fnacimiento;

        return $this;
    }

    /**
     * Get fnacimiento
     *
     * @return \DateTime 
     */
    public function getFnacimiento()
    {
        return $this->fnacimiento;
    }

    /**
     * Add messages
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\Message $messages
     * @return User
     */
    public function addMessage(\BtoB\SocialNetwork\CoreBundle\Entity\Message $messages)
    {
        $this->messages[] = $messages;

        return $this;
    }

    /**
     * Remove messages
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\Message $messages
     */
    public function removeMessage(\BtoB\SocialNetwork\CoreBundle\Entity\Message $messages)
    {
        $this->messages->removeElement($messages);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Add subscribers
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\Relation $subscribers
     * @return User
     */
    public function addSubscriber(\BtoB\SocialNetwork\CoreBundle\Entity\Relation $subscribers)
    {
        $this->subscribers[] = $subscribers;

        return $this;
    }

    /**
     * Remove subscribers
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\Relation $subscribers
     */
    public function removeSubscriber(\BtoB\SocialNetwork\CoreBundle\Entity\Relation $subscribers)
    {
        $this->subscribers->removeElement($subscribers);
    }

    /**
     * Get subscribers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubscribers()
    {
        return $this->subscribers;
    }

    /**
     * Add leaders
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\Relation $leaders
     * @return User
     */
    public function addLeader(\BtoB\SocialNetwork\CoreBundle\Entity\Relation $leaders)
    {
        $this->leaders[] = $leaders;

        return $this;
    }

    /**
     * Remove leaders
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\Relation $leaders
     */
    public function removeLeader(\BtoB\SocialNetwork\CoreBundle\Entity\Relation $leaders)
    {
        $this->leaders->removeElement($leaders);
    }

    /**
     * Get leaders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLeaders()
    {
        return $this->leaders;
    }

    /**
     * Add likes
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\Like $likes
     * @return User
     */
    public function addLike(\BtoB\SocialNetwork\CoreBundle\Entity\Like $likes)
    {
        $this->likes[] = $likes;

        return $this;
    }

    /**
     * Remove likes
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\Like $likes
     */
    public function removeLike(\BtoB\SocialNetwork\CoreBundle\Entity\Like $likes)
    {
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

    /**
     * Set referredBy
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\User $referredBy
     * @return User
     */
    public function setReferredBy(\BtoB\SocialNetwork\CoreBundle\Entity\User $referredBy = null)
    {
        $this->referredBy = $referredBy;

        return $this;
    }

    /**
     * Get referredBy
     *
     * @return \BtoB\SocialNetwork\CoreBundle\Entity\User 
     */
    public function getReferredBy()
    {
        return $this->referredBy;
    }

    
    
    /** 
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\ResourceCDN $resourceCDN
     * @return \BtoB\SocialNetwork\CoreBundle\Entity\User
     */
    function getProfileResourceCDN() {
        return $this->profileResourceCDN;
    }
    
    /**
     * 
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\ResourceCDN $resourceCDN
     * @return \BtoB\SocialNetwork\CoreBundle\Entity\User
     */
    function getCoverResourceCDN() {
        return $this->coverResourceCDN;
    }

    /**
     * @return \BtoB\SocialNetwork\CoreBundle\Entity\ResourceCDN
     */
    function setProfileResourceCDN(\BtoB\SocialNetwork\CoreBundle\Entity\ResourceCDN $profileResourceCDN) {
        $this->profileResourceCDN = $profileResourceCDN;
        
        return $this;
    }

    /**
     * @return \BtoB\SocialNetwork\CoreBundle\Entity\ResourceCDN
     */
    function setCoverResourceCDN(\BtoB\SocialNetwork\CoreBundle\Entity\ResourceCDN $coverResourceCDN) {
        $this->coverResourceCDN = $coverResourceCDN;
        
        return $this;
    }
    
    /**
     * @ORM\PrePersist()
     */
    public function prePersist()
    {
        $this->date = new \DateTime();
    }
    
    public function __toString() {
        $firstNameLen = strlen($this->getFirstName());
        $fullname = '';
        if($firstNameLen > 0){
            $fullname = $this->getFirstName().' '. $this->getLastName();
        }else{
            $fullname = $this->username;
        }
        return $fullname;
    }

    /**
     * Set percentageComplete
     *
     * @param float $percentageComplete
     * @return User
     */
    public function setPercentageComplete($percentageComplete)
    {
        $this->percentageComplete = $percentageComplete;

        return $this;
    }

    /**
     * Get percentageComplete
     *
     * @return float 
     */
    public function getPercentageComplete()
    {
        return $this->percentageComplete;
    }

    /**
     * Set timezone
     *
     * @param string $timezone
     * @return User
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Get timezone
     *
     * @return string 
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Set typeCharge
     *
     * @param string $typeCharge
     * @return User
     */
    public function setTypeCharge($typeCharge)
    {
        $this->typeCharge = $typeCharge;

        return $this;
    }

    /**
     * Get typeCharge
     *
     * @return string 
     */
    public function getTypeCharge()
    {
        return $this->typeCharge;
    }

    /**
     * Set paypalAccount
     *
     * @param string $paypalAccount
     * @return User
     */
    public function setPaypalAccount($paypalAccount)
    {
        $this->paypalAccount = $paypalAccount;

        return $this;
    }

    /**
     * Get paypalAccount
     *
     * @return string 
     */
    public function getPaypalAccount()
    {
        return $this->paypalAccount;
    }

    /**
     * Set nameCheck
     *
     * @param string $nameCheck
     * @return User
     */
    public function setNameCheck($nameCheck)
    {
        $this->nameCheck = $nameCheck;

        return $this;
    }

    /**
     * Get nameCheck
     *
     * @return string 
     */
    public function getNameCheck()
    {
        return $this->nameCheck;
    }

    /**
     * Set directionCheck
     *
     * @param string $directionCheck
     * @return User
     */
    public function setDirectionCheck($directionCheck)
    {
        $this->directionCheck = $directionCheck;

        return $this;
    }

    /**
     * Get directionCheck
     *
     * @return string 
     */
    public function getDirectionCheck()
    {
        return $this->directionCheck;
    }

    /**
     * Set numberBankAccount
     *
     * @param string $numberBankAccount
     * @return User
     */
    public function setNumberBankAccount($numberBankAccount)
    {
        $this->numberBankAccount = $numberBankAccount;

        return $this;
    }

    /**
     * Get numberBankAccount
     *
     * @return string 
     */
    public function getNumberBankAccount()
    {
        return $this->numberBankAccount;
    }

    /**
     * Set bankNameBankAccount
     *
     * @param string $bankNameBankAccount
     * @return User
     */
    public function setBankNameBankAccount($bankNameBankAccount)
    {
        $this->bankNameBankAccount = $bankNameBankAccount;

        return $this;
    }

    /**
     * Get bankNameBankAccount
     *
     * @return string 
     */
    public function getBankNameBankAccount()
    {
        return $this->bankNameBankAccount;
    }

    /**
     * Set nameTitularBankAccount
     *
     * @param string $nameTitularBankAccount
     * @return User
     */
    public function setNameTitularBankAccount($nameTitularBankAccount)
    {
        $this->nameTitularBankAccount = $nameTitularBankAccount;

        return $this;
    }

    /**
     * Get nameTitularBankAccount
     *
     * @return string 
     */
    public function getNameTitularBankAccount()
    {
        return $this->nameTitularBankAccount;
    }

    /**
     * Set idTitularBankAccount
     *
     * @param string $idTitularBankAccount
     * @return User
     */
    public function setIdTitularBankAccount($idTitularBankAccount)
    {
        $this->idTitularBankAccount = $idTitularBankAccount;

        return $this;
    }

    /**
     * Get idTitularBankAccount
     *
     * @return string 
     */
    public function getIdTitularBankAccount()
    {
        return $this->idTitularBankAccount;
    }

    /**
     * Set lastDateChatOnLine
     *
     * @param \DateTime $lastDateChatOnLine
     * @return User
     */
    public function setLastDateChatOnLine($lastDateChatOnLine)
    {
        $this->lastDateChatOnLine = $lastDateChatOnLine;

        return $this;
    }

    /**
     * Get lastDateChatOnLine
     *
     * @return \DateTime 
     */
    public function getLastDateChatOnLine()
    {
        return $this->lastDateChatOnLine;
    }
}
