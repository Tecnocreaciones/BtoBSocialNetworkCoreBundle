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
use BtoB\SocialNetwork\CoreBundle\Model\ResourceCDN as Base;

/**
 * Recurso en cdn
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 * 
 * @ORM\Table(name="resourceCdn")
 * @ORM\Entity(repositoryClass="BtoB\SocialNetwork\CoreBundle\Repository\ResourceCDNRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class ResourceCDN extends Base
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
     * Nombre o id del recurso
     * 
     * @var string
     * @ORM\Column(name="name",type="string",length=250)
     */
    protected $name;
    
    /**
     * Datos del cdn
     * @var array
     * @ORM\Column(name="data",type="array")
     */
    protected $data;
    
    /**
     * Tipo de CDN
     * @var integer
     * @ORM\Column(name="type",type="string",length=30)
     */
    private $type = self::TYPE_CLOUDINARY;

    /**
     * @var \BtoB\SocialNetwork\CoreBundle\Entity\Message
     *
     * @ORM\ManyToMany(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\Message",mappedBy="resourcesCDN")
     */
    private $messages;
    
    public function __construct() {
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set data
     *
     * @param array $data
     * @return ResourceCDN
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return array 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return ResourceCDN
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
     * Set name
     *
     * @param string $name
     * @return ResourceCDN
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Add messages
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\Message $messages
     * @return ResourceCDN
     */
    public function addMessage(\BtoB\SocialNetwork\CoreBundle\Entity\Message $messages)
    {
        $this->messages->add($messages);

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
}
