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
 * Publicacion ganadora de cada usuario
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 * @ORM\Table(name="publication_winner",uniqueConstraints={@ORM\UniqueConstraint(name="top_idx", columns={"idu","topDay_id"})})
 * @ORM\Entity(repositoryClass="BtoB\SocialNetwork\CoreBundle\Repository\PublicationWinnerRepository")
 */
class PublicationWinner
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
     * @ORM\ManyToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\User",inversedBy="messages")
     * @ORM\JoinColumn(name="idu",referencedColumnName="idu",nullable=false)
     */
    private $user;
    
    /**
     *
     * @var TopDay
     * @ORM\ManyToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\TopDay",inversedBy="publicationsWinner",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $topDay;
    
    /**
     *
     * @var Message
     * @ORM\OneToOne(targetEntity="BtoB\SocialNetwork\CoreBundle\Entity\Message")
     * @ORM\JoinColumn(nullable=false)
     */
    private $message;
    
    /**
     * Cantidad de rewards con la que gano la publicacion
     * @var integer
     * @ORM\Column(name="amountRewards",type="integer")
     */
    private $amountRewards = 0;
    
    function getId() {
        return $this->id;
    }

    function getUser() {
        return $this->user;
    }

    function getTopDay() {
        return $this->topDay;
    }

    function getMessage() {
        return $this->message;
    }

    function getAmountRewards() {
        return $this->amountRewards;
    }

    function setUser(\BtoB\SocialNetwork\CoreBundle\Entity\User $user) {
        $this->user = $user;
    }

    function setTopDay(TopDay $topDay) {
        $this->topDay = $topDay;
    }

    function setMessage(Message $message) {
        $this->message = $message;
    }

    function setAmountRewards($amountRewards) {
        $this->amountRewards = $amountRewards;
    }


}
