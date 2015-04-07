<?php

namespace BtoB\SocialNetwork\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Settings
 *
 * @ORM\Table(name="settings")
 * @ORM\Entity
 */
class Settings
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=64, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="theme", type="string", length=32, nullable=false)
     */
    private $theme;

    /**
     * @var integer
     *
     * @ORM\Column(name="perpage", type="integer", nullable=false)
     */
    private $perpage;

    /**
     * @var string
     *
     * @ORM\Column(name="censor", type="string", length=2048, nullable=false)
     */
    private $censor;

    /**
     * @var integer
     *
     * @ORM\Column(name="captcha", type="integer", nullable=false)
     */
    private $captcha;

    /**
     * @var integer
     *
     * @ORM\Column(name="intervalm", type="integer", nullable=false)
     */
    private $intervalm;

    /**
     * @var integer
     *
     * @ORM\Column(name="intervaln", type="integer", nullable=false)
     */
    private $intervaln;

    /**
     * @var integer
     *
     * @ORM\Column(name="time", type="integer", nullable=false)
     */
    private $time;

    /**
     * @var integer
     *
     * @ORM\Column(name="message", type="integer", nullable=false)
     */
    private $message;

    /**
     * @var integer
     *
     * @ORM\Column(name="size", type="integer", nullable=false)
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=256, nullable=false)
     */
    private $format;

    /**
     * @var integer
     *
     * @ORM\Column(name="mail", type="integer", nullable=false)
     */
    private $mail;

    /**
     * @var integer
     *
     * @ORM\Column(name="sizemsg", type="integer", nullable=false)
     */
    private $sizemsg;

    /**
     * @var string
     *
     * @ORM\Column(name="formatmsg", type="string", length=256, nullable=false)
     */
    private $formatmsg;

    /**
     * @var integer
     *
     * @ORM\Column(name="cperpage", type="integer", nullable=false)
     */
    private $cperpage;

    /**
     * @var integer
     *
     * @ORM\Column(name="mprivacy", type="integer", nullable=false)
     */
    private $mprivacy;

    /**
     * @var integer
     *
     * @ORM\Column(name="ilimit", type="integer", nullable=false)
     */
    private $ilimit;

    /**
     * @var integer
     *
     * @ORM\Column(name="climit", type="integer", nullable=false)
     */
    private $climit;

    /**
     * @var boolean
     *
     * @ORM\Column(name="qperpage", type="boolean", nullable=false)
     */
    private $qperpage;

    /**
     * @var integer
     *
     * @ORM\Column(name="rperpage", type="integer", nullable=false)
     */
    private $rperpage;

    /**
     * @var integer
     *
     * @ORM\Column(name="uperpage", type="integer", nullable=false)
     */
    private $uperpage;

    /**
     * @var integer
     *
     * @ORM\Column(name="sperpage", type="integer", nullable=false)
     */
    private $sperpage;

    /**
     * @var boolean
     *
     * @ORM\Column(name="nperpage", type="boolean", nullable=false)
     */
    private $nperpage;

    /**
     * @var boolean
     *
     * @ORM\Column(name="nperwidget", type="boolean", nullable=false)
     */
    private $nperwidget;

    /**
     * @var integer
     *
     * @ORM\Column(name="lperpost", type="integer", nullable=false)
     */
    private $lperpost;

    /**
     * @var integer
     *
     * @ORM\Column(name="conline", type="integer", nullable=false)
     */
    private $conline;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ronline", type="boolean", nullable=false)
     */
    private $ronline;

    /**
     * @var boolean
     *
     * @ORM\Column(name="mperpage", type="boolean", nullable=false)
     */
    private $mperpage;

    /**
     * @var integer
     *
     * @ORM\Column(name="verified", type="integer", nullable=false)
     */
    private $verified;

    /**
     * @var boolean
     *
     * @ORM\Column(name="notificationl", type="boolean", nullable=false)
     */
    private $notificationl;

    /**
     * @var boolean
     *
     * @ORM\Column(name="notificationc", type="boolean", nullable=false)
     */
    private $notificationc;

    /**
     * @var boolean
     *
     * @ORM\Column(name="notifications", type="boolean", nullable=false)
     */
    private $notifications;

    /**
     * @var boolean
     *
     * @ORM\Column(name="notificationd", type="boolean", nullable=false)
     */
    private $notificationd;

    /**
     * @var boolean
     *
     * @ORM\Column(name="notificationf", type="boolean", nullable=false)
     */
    private $notificationf;

    /**
     * @var integer
     *
     * @ORM\Column(name="chatr", type="integer", nullable=false)
     */
    private $chatr;

    /**
     * @var boolean
     *
     * @ORM\Column(name="email_comment", type="boolean", nullable=false)
     */
    private $emailComment;

    /**
     * @var boolean
     *
     * @ORM\Column(name="email_like", type="boolean", nullable=false)
     */
    private $emailLike;

    /**
     * @var boolean
     *
     * @ORM\Column(name="email_new_friend", type="boolean", nullable=false)
     */
    private $emailNewFriend;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sound_new_notification", type="boolean", nullable=false)
     */
    private $soundNewNotification;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sound_new_chat", type="boolean", nullable=false)
     */
    private $soundNewChat;

    /**
     * @var boolean
     *
     * @ORM\Column(name="smiles", type="boolean", nullable=false)
     */
    private $smiles;

    /**
     * @var string
     *
     * @ORM\Column(name="ad1", type="text", nullable=false)
     */
    private $ad1;

    /**
     * @var string
     *
     * @ORM\Column(name="ad2", type="text", nullable=false)
     */
    private $ad2;

    /**
     * @var string
     *
     * @ORM\Column(name="ad3", type="text", nullable=false)
     */
    private $ad3;

    /**
     * @var string
     *
     * @ORM\Column(name="ad4", type="text", nullable=false)
     */
    private $ad4;

    /**
     * @var string
     *
     * @ORM\Column(name="ad5", type="text", nullable=false)
     */
    private $ad5;

    /**
     * @var string
     *
     * @ORM\Column(name="ad6", type="text", nullable=false)
     */
    private $ad6;

    /**
     * @var string
     *
     * @ORM\Column(name="ad7", type="text", nullable=false)
     */
    private $ad7;

    /**
     * Valor de los rewards
     * @var float
     * @ORM\Column(name="value_reward",type="float")
     */
    private $valueReward;

    /**
     * Cantidad de rewards a regalar en su primer post
     * @var integer
     * @ORM\Column(name="new_user_gift_reward",type="integer")
     */
    private $newUserGiftReward;

    /**
     * Fecha valida de donde se regalaran rewards en publicaciones
     * @var integer
     * @ORM\Column(name="date_new_user_gift_reward",type="date")
     */
    private $dateNewUserGiftReward;

    /**
     * Cantidad de rewards a regalar en las publicaciones por cada invitado.
     * @var integer
     * @ORM\Column(name="gift_reward_by_invited",type="integer")
     */
    private $giftRewardByInvited;
    
    public function getParameter($name,$default = null)
    {
        if(isset($this->$name)){
            return $this->$name;
        }
        return $default;
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
     * Set title
     *
     * @param string $title
     * @return Settings
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set theme
     *
     * @param string $theme
     * @return Settings
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return string 
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Set perpage
     *
     * @param integer $perpage
     * @return Settings
     */
    public function setPerpage($perpage)
    {
        $this->perpage = $perpage;

        return $this;
    }

    /**
     * Get perpage
     *
     * @return integer 
     */
    public function getPerpage()
    {
        return $this->perpage;
    }

    /**
     * Set censor
     *
     * @param string $censor
     * @return Settings
     */
    public function setCensor($censor)
    {
        $this->censor = $censor;

        return $this;
    }

    /**
     * Get censor
     *
     * @return string 
     */
    public function getCensor()
    {
        return $this->censor;
    }

    /**
     * Set captcha
     *
     * @param integer $captcha
     * @return Settings
     */
    public function setCaptcha($captcha)
    {
        $this->captcha = $captcha;

        return $this;
    }

    /**
     * Get captcha
     *
     * @return integer 
     */
    public function getCaptcha()
    {
        return $this->captcha;
    }

    /**
     * Set intervalm
     *
     * @param integer $intervalm
     * @return Settings
     */
    public function setIntervalm($intervalm)
    {
        $this->intervalm = $intervalm;

        return $this;
    }

    /**
     * Get intervalm
     *
     * @return integer 
     */
    public function getIntervalm()
    {
        return $this->intervalm;
    }

    /**
     * Set intervaln
     *
     * @param integer $intervaln
     * @return Settings
     */
    public function setIntervaln($intervaln)
    {
        $this->intervaln = $intervaln;

        return $this;
    }

    /**
     * Get intervaln
     *
     * @return integer 
     */
    public function getIntervaln()
    {
        return $this->intervaln;
    }

    /**
     * Set time
     *
     * @param integer $time
     * @return Settings
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return integer 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set message
     *
     * @param integer $message
     * @return Settings
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return integer 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set size
     *
     * @param integer $size
     * @return Settings
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set format
     *
     * @param string $format
     * @return Settings
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string 
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set mail
     *
     * @param integer $mail
     * @return Settings
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return integer 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set sizemsg
     *
     * @param integer $sizemsg
     * @return Settings
     */
    public function setSizemsg($sizemsg)
    {
        $this->sizemsg = $sizemsg;

        return $this;
    }

    /**
     * Get sizemsg
     *
     * @return integer 
     */
    public function getSizemsg()
    {
        return $this->sizemsg;
    }

    /**
     * Set formatmsg
     *
     * @param string $formatmsg
     * @return Settings
     */
    public function setFormatmsg($formatmsg)
    {
        $this->formatmsg = $formatmsg;

        return $this;
    }

    /**
     * Get formatmsg
     *
     * @return string 
     */
    public function getFormatmsg()
    {
        return $this->formatmsg;
    }

    /**
     * Set cperpage
     *
     * @param integer $cperpage
     * @return Settings
     */
    public function setCperpage($cperpage)
    {
        $this->cperpage = $cperpage;

        return $this;
    }

    /**
     * Get cperpage
     *
     * @return integer 
     */
    public function getCperpage()
    {
        return $this->cperpage;
    }

    /**
     * Set mprivacy
     *
     * @param integer $mprivacy
     * @return Settings
     */
    public function setMprivacy($mprivacy)
    {
        $this->mprivacy = $mprivacy;

        return $this;
    }

    /**
     * Get mprivacy
     *
     * @return integer 
     */
    public function getMprivacy()
    {
        return $this->mprivacy;
    }

    /**
     * Set ilimit
     *
     * @param integer $ilimit
     * @return Settings
     */
    public function setIlimit($ilimit)
    {
        $this->ilimit = $ilimit;

        return $this;
    }

    /**
     * Get ilimit
     *
     * @return integer 
     */
    public function getIlimit()
    {
        return $this->ilimit;
    }

    /**
     * Set climit
     *
     * @param integer $climit
     * @return Settings
     */
    public function setClimit($climit)
    {
        $this->climit = $climit;

        return $this;
    }

    /**
     * Get climit
     *
     * @return integer 
     */
    public function getClimit()
    {
        return $this->climit;
    }

    /**
     * Set qperpage
     *
     * @param boolean $qperpage
     * @return Settings
     */
    public function setQperpage($qperpage)
    {
        $this->qperpage = $qperpage;

        return $this;
    }

    /**
     * Get qperpage
     *
     * @return boolean 
     */
    public function getQperpage()
    {
        return $this->qperpage;
    }

    /**
     * Set rperpage
     *
     * @param integer $rperpage
     * @return Settings
     */
    public function setRperpage($rperpage)
    {
        $this->rperpage = $rperpage;

        return $this;
    }

    /**
     * Get rperpage
     *
     * @return integer 
     */
    public function getRperpage()
    {
        return $this->rperpage;
    }

    /**
     * Set uperpage
     *
     * @param integer $uperpage
     * @return Settings
     */
    public function setUperpage($uperpage)
    {
        $this->uperpage = $uperpage;

        return $this;
    }

    /**
     * Get uperpage
     *
     * @return integer 
     */
    public function getUperpage()
    {
        return $this->uperpage;
    }

    /**
     * Set sperpage
     *
     * @param integer $sperpage
     * @return Settings
     */
    public function setSperpage($sperpage)
    {
        $this->sperpage = $sperpage;

        return $this;
    }

    /**
     * Get sperpage
     *
     * @return integer 
     */
    public function getSperpage()
    {
        return $this->sperpage;
    }

    /**
     * Set nperpage
     *
     * @param boolean $nperpage
     * @return Settings
     */
    public function setNperpage($nperpage)
    {
        $this->nperpage = $nperpage;

        return $this;
    }

    /**
     * Get nperpage
     *
     * @return boolean 
     */
    public function getNperpage()
    {
        return $this->nperpage;
    }

    /**
     * Set nperwidget
     *
     * @param boolean $nperwidget
     * @return Settings
     */
    public function setNperwidget($nperwidget)
    {
        $this->nperwidget = $nperwidget;

        return $this;
    }

    /**
     * Get nperwidget
     *
     * @return boolean 
     */
    public function getNperwidget()
    {
        return $this->nperwidget;
    }

    /**
     * Set lperpost
     *
     * @param integer $lperpost
     * @return Settings
     */
    public function setLperpost($lperpost)
    {
        $this->lperpost = $lperpost;

        return $this;
    }

    /**
     * Get lperpost
     *
     * @return integer 
     */
    public function getLperpost()
    {
        return $this->lperpost;
    }

    /**
     * Set conline
     *
     * @param integer $conline
     * @return Settings
     */
    public function setConline($conline)
    {
        $this->conline = $conline;

        return $this;
    }

    /**
     * Get conline
     *
     * @return integer 
     */
    public function getConline()
    {
        return $this->conline;
    }

    /**
     * Set ronline
     *
     * @param boolean $ronline
     * @return Settings
     */
    public function setRonline($ronline)
    {
        $this->ronline = $ronline;

        return $this;
    }

    /**
     * Get ronline
     *
     * @return boolean 
     */
    public function getRonline()
    {
        return $this->ronline;
    }

    /**
     * Set mperpage
     *
     * @param boolean $mperpage
     * @return Settings
     */
    public function setMperpage($mperpage)
    {
        $this->mperpage = $mperpage;

        return $this;
    }

    /**
     * Get mperpage
     *
     * @return boolean 
     */
    public function getMperpage()
    {
        return $this->mperpage;
    }

    /**
     * Set verified
     *
     * @param integer $verified
     * @return Settings
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
     * Set notificationl
     *
     * @param boolean $notificationl
     * @return Settings
     */
    public function setNotificationl($notificationl)
    {
        $this->notificationl = $notificationl;

        return $this;
    }

    /**
     * Get notificationl
     *
     * @return boolean 
     */
    public function getNotificationl()
    {
        return $this->notificationl;
    }

    /**
     * Set notificationc
     *
     * @param boolean $notificationc
     * @return Settings
     */
    public function setNotificationc($notificationc)
    {
        $this->notificationc = $notificationc;

        return $this;
    }

    /**
     * Get notificationc
     *
     * @return boolean 
     */
    public function getNotificationc()
    {
        return $this->notificationc;
    }

    /**
     * Set notifications
     *
     * @param boolean $notifications
     * @return Settings
     */
    public function setNotifications($notifications)
    {
        $this->notifications = $notifications;

        return $this;
    }

    /**
     * Get notifications
     *
     * @return boolean 
     */
    public function getNotifications()
    {
        return $this->notifications;
    }

    /**
     * Set notificationd
     *
     * @param boolean $notificationd
     * @return Settings
     */
    public function setNotificationd($notificationd)
    {
        $this->notificationd = $notificationd;

        return $this;
    }

    /**
     * Get notificationd
     *
     * @return boolean 
     */
    public function getNotificationd()
    {
        return $this->notificationd;
    }

    /**
     * Set notificationf
     *
     * @param boolean $notificationf
     * @return Settings
     */
    public function setNotificationf($notificationf)
    {
        $this->notificationf = $notificationf;

        return $this;
    }

    /**
     * Get notificationf
     *
     * @return boolean 
     */
    public function getNotificationf()
    {
        return $this->notificationf;
    }

    /**
     * Set chatr
     *
     * @param integer $chatr
     * @return Settings
     */
    public function setChatr($chatr)
    {
        $this->chatr = $chatr;

        return $this;
    }

    /**
     * Get chatr
     *
     * @return integer 
     */
    public function getChatr()
    {
        return $this->chatr;
    }

    /**
     * Set emailComment
     *
     * @param boolean $emailComment
     * @return Settings
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
     * Set emailLike
     *
     * @param boolean $emailLike
     * @return Settings
     */
    public function setEmailLike($emailLike)
    {
        $this->emailLike = $emailLike;

        return $this;
    }

    /**
     * Get emailLike
     *
     * @return boolean 
     */
    public function getEmailLike()
    {
        return $this->emailLike;
    }

    /**
     * Set emailNewFriend
     *
     * @param boolean $emailNewFriend
     * @return Settings
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
     * @return Settings
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
     * @return Settings
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
     * Set smiles
     *
     * @param boolean $smiles
     * @return Settings
     */
    public function setSmiles($smiles)
    {
        $this->smiles = $smiles;

        return $this;
    }

    /**
     * Get smiles
     *
     * @return boolean 
     */
    public function getSmiles()
    {
        return $this->smiles;
    }

    /**
     * Set ad1
     *
     * @param string $ad1
     * @return Settings
     */
    public function setAd1($ad1)
    {
        $this->ad1 = $ad1;

        return $this;
    }

    /**
     * Get ad1
     *
     * @return string 
     */
    public function getAd1()
    {
        return $this->ad1;
    }

    /**
     * Set ad2
     *
     * @param string $ad2
     * @return Settings
     */
    public function setAd2($ad2)
    {
        $this->ad2 = $ad2;

        return $this;
    }

    /**
     * Get ad2
     *
     * @return string 
     */
    public function getAd2()
    {
        return $this->ad2;
    }

    /**
     * Set ad3
     *
     * @param string $ad3
     * @return Settings
     */
    public function setAd3($ad3)
    {
        $this->ad3 = $ad3;

        return $this;
    }

    /**
     * Get ad3
     *
     * @return string 
     */
    public function getAd3()
    {
        return $this->ad3;
    }

    /**
     * Set ad4
     *
     * @param string $ad4
     * @return Settings
     */
    public function setAd4($ad4)
    {
        $this->ad4 = $ad4;

        return $this;
    }

    /**
     * Get ad4
     *
     * @return string 
     */
    public function getAd4()
    {
        return $this->ad4;
    }

    /**
     * Set ad5
     *
     * @param string $ad5
     * @return Settings
     */
    public function setAd5($ad5)
    {
        $this->ad5 = $ad5;

        return $this;
    }

    /**
     * Get ad5
     *
     * @return string 
     */
    public function getAd5()
    {
        return $this->ad5;
    }

    /**
     * Set ad6
     *
     * @param string $ad6
     * @return Settings
     */
    public function setAd6($ad6)
    {
        $this->ad6 = $ad6;

        return $this;
    }

    /**
     * Get ad6
     *
     * @return string 
     */
    public function getAd6()
    {
        return $this->ad6;
    }

    /**
     * Set ad7
     *
     * @param string $ad7
     * @return Settings
     */
    public function setAd7($ad7)
    {
        $this->ad7 = $ad7;

        return $this;
    }

    /**
     * Get ad7
     *
     * @return string 
     */
    public function getAd7()
    {
        return $this->ad7;
    }
}
