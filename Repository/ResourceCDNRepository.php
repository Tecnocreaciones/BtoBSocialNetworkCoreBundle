<?php

/*
 * This file is part of the TecnoCreaciones package.
 * 
 * (c) www.tecnocreaciones.com
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BtoB\SocialNetwork\CoreBundle\Repository;

use BtoB\SocialNetwork\CoreBundle\Doctrine\ORM\EntityRepository;

/**
 * Description of ResourceCDNRepository
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 */
class ResourceCDNRepository extends EntityRepository
{
    function findResourcesByMessageAndName($idMessage,$nameResource) {
        $qb = $this->createQueryBuilder('r');
        $qb
            ->innerJoin('r.messages', 'm')
            ->andWhere('m.id = :message')
            ->andWhere('r.name = :name')
            ->setParameter('message', $idMessage)
            ->setParameter('name', $nameResource)
            ;
        return $qb->getQuery()->getOneOrNullResult();
    }
}
