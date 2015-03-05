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
 * Description of PublicationWinnerRepository
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 */
class PublicationWinnerRepository extends EntityRepository
{
    function findPublicationsWinner(array $criteria = array(),array $sorting = array()) 
    {
        $qb = $this->getQueryBuilder();
        $qb
            ->addSelect('SUM(p.amountRewards) AS amountRewards')
            ->addSelect('p_t')
            ->innerJoin('p.topDay', 'p_t')
            ;
        $criteria = new \Doctrine\Common\Collections\ArrayCollection($criteria);
        if(($dateStart = $criteria->remove('dateStart'))){
            $qb->andWhere('p_t.dateTop >= :dateStart')
            ->setParameter('dateStart', $dateStart)
            ;
        }
        if(($dateEnd = $criteria->remove('dateEnd'))){
            $qb->andWhere('p_t.dateTop <= :dateEnd')
            ->setParameter('dateEnd', $dateEnd)
            ;
        }
        if(($user = $criteria->remove('user'))){
            $qb->andWhere('p.user = :user')
            ->setParameter('user', $user)
            ;
        }
        $qb
            ->addOrderBy('p.amountRewards')
            ;
        return $qb->getQuery()->getResult();
    }
    
    function getAlias()
    {
        return 'p';
    }
}
