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

/**
 * Top del dia
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 * @ORM\Table(name="top_day",uniqueConstraints={@ORM\UniqueConstraint(name="top_idx", columns={"dateTop"})})
 * @ORM\Entity(repositoryClass="BtoB\SocialNetwork\CoreBundle\Repository\TopDayRepository")
 */
class TopDay 
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
     * Fecha del cierre
     * @var \DateTime
     * @ORM\Column(name="dateTop",type="date")
     */
    private $dateTop;
    
    /**
     * Fecha y hora del cierre
     * @var \DateTime
     * @ORM\Column(name="dateTimeTop",type="datetime")
     */
    private $dateTimeTop;
    
    /**
     *
     * @var PublicationWinner
     * @ORM\OneToMany(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\PublicationWinner",mappedBy="topDay",cascade={"persist","remove"})
     */
    private $publicationsWinner;
    
    public function __construct() 
    {
        $this->publicationsWinner = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    function getId() {
        return $this->id;
    }

    function getDateTop() {
        return $this->dateTop;
    }

    function getDateTimeTop() {
        return $this->dateTimeTop;
    }

    function getPublicationsWinner() {
        return $this->publicationsWinner;
    }

    function setDateTop(\DateTime $dateTop) {
        $this->dateTop = $dateTop;
    }

    function setDateTimeTop(\DateTime $dateTimeTop) {
        $this->dateTimeTop = $dateTimeTop;
        $this->setDateTop($dateTimeTop);
    }

    function setPublicationsWinner(PublicationWinner $publicationsWinner) {
        $this->publicationsWinner = $publicationsWinner;
    }
    
    function addPublicationWinner(PublicationWinner $publicationWinner) {
        $publicationWinner->setTopDay($this);
        $this->publicationsWinner->add($publicationWinner);
    }

}
