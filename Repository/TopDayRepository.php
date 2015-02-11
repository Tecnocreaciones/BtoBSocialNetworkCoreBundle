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
 * Description of TopDayRepository
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 */
class TopDayRepository extends EntityRepository
{
    function findTopRewardsSummary(array $criteria = array(),array $sorting = array()) 
    {
        $qb = $this->getQueryBuilder();
        $qb
            ->addSelect('t_p')
            ->innerJoin('t.publicationsWinner', 't_p')
            ;
        $criteria = new \Doctrine\Common\Collections\ArrayCollection($criteria);
        if(($dateStart = $criteria->remove('dateStart'))){
            $qb->andWhere('t.dateTop >= :dateStart')
            ->setParameter('dateStart', $dateStart)
            ;
        }
        if(($dateEnd = $criteria->remove('dateEnd'))){
            $qb->andWhere('t.dateTop <= :dateEnd')
            ->setParameter('dateEnd', $dateEnd)
            ;
        }
        $qb
            ->orderBy('t_p.user')
            ->addOrderBy('t_p.amountRewards')
            ->addOrderBy('t_p.amountRewards')
            ->addOrderBy('t.dateTop')
            ;
        return $qb->getQuery()->getResult();
    }
    
    protected function getAlias() {
        return 't';
    }
}
