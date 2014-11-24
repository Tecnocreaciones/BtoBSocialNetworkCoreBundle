<?php

namespace BtoB\SocialNetwork\CoreBundle\Repository;

use BtoB\SocialNetwork\CoreBundle\Doctrine\ORM\EntityRepository;
use BtoB\SocialNetwork\CoreBundle\Entity\Relation;
use BtoB\SocialNetwork\CoreBundle\Entity\User;

/**
 * Repositorio de amistades
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RelationRepository extends EntityRepository
{
    /**
     * Busca la suscripcion de un usuario sin aprobar
     * @param User $leader
     * @param User $subscriber
     */
    public function findSuscriberByUser(User $leader,User $subscriber)
    {
        $qb = $this->getQueryBuilder();
        $qb
                
                ->where(
                        $qb->expr()->orX(
                                $qb->expr()->andX('r.leader = :leader','r.subscriber = :subscriber'),
                                $qb->expr()->andX('r.leader = :subscriber','r.subscriber = :leader')
                            )
                        )
                //->andWhere('r.status = :status')
                ->setParameter('leader', $leader)
                ->setParameter('subscriber', $subscriber)
                //->setParameter('status', Relation::STATUS_UNCONFIRMED)
                ->setMaxResults(1)
                ;
        return $qb->getQuery()->getOneOrNullResult();
    }
    
    protected function getAlias() {
        return 'r';
    }
}
