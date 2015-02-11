<?php

namespace BtoB\SocialNetwork\CoreBundle\Repository;

use BtoB\SocialNetwork\CoreBundle\Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
    function findPreHidrate($id) 
    {
        $qb = $this->createQueryBuilder('u');
        $qb
            ->addSelect('u_prcdn')
            ->leftJoin('u.profileResourceCDN', 'u_prcdn')
            ->leftJoin('u.coverResourceCDN', 'u_crcdn')
            ->andWhere('u.id = :user')
            ->setParameter('user', $id)
            ;
        return $qb->getQuery()->getOneOrNullResult();
    }
    
    /**
     * Busca un usuario con informacion extra
     * @param type $leaderId
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\User $subscriber
     * @return type
     */
    public function findOneById($leaderId,  \BtoB\SocialNetwork\CoreBundle\Entity\User $subscriber)
    {
        $qb = $this->createQueryBuilder('u');
        $qb
            ->addSelect('l')
            ->addSelect('s')
            ->leftJoin('u.leaders', 'l', \Doctrine\ORM\Query\Expr\Join::WITH,$qb->expr()->andX('l.leader = :leader','l.subscriber = :subscriber'),'l.id')
            ->leftJoin('u.subscribers', 's', \Doctrine\ORM\Query\Expr\Join::WITH,$qb->expr()->andX('s.leader = :subscriber','s.subscriber = :leader'),'s.id')
            ->andWhere('u.id = :leader')
                ->setParameter('leader', $leaderId)
                ->setParameter('subscriber', $subscriber)
            ;
        return $qb->getQuery()->getOneOrNullResult();
    }
    
    /**
     * Retorna los amigos de un usuario
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\User $user
     * @param type $query
     * @return type
     */
    public function getSearchFriendsByUser(\BtoB\SocialNetwork\CoreBundle\Entity\User $user,$query){
        $qb = $this->createQueryBuilder('u');
        $qb
            ->leftJoin('u.leaders', 'l', \Doctrine\ORM\Query\Expr\Join::WITH,'(l.status = :status)','l.id')
            ->leftJoin('u.subscribers', 's', \Doctrine\ORM\Query\Expr\Join::WITH,'(s.status = :status)','s.id')
            ->andWhere(
                $qb->expr()->orX('l.leader = :user','l.subscriber = :user','s.leader = :user','s.subscriber = :user')
            )
            ->andWhere(
                    $qb->expr()->orX(
                            $qb->expr()->like('u.username', "'%".$query."%'"),
                            $qb->expr()->like('u.email', "'%".$query."%'"),
                            $qb->expr()->like('u.firstName',"'%".$query."%'"),
                            $qb->expr()->like('u.lastName', "'%".$query."%'")
                            )
                    )
            ->andWhere('u.id != :user')
            ->setParameter('status', \BtoB\SocialNetwork\CoreBundle\Entity\Relation::STATUS_CONFIRMED)
            ->setParameter('user', $user)
            ;
        return $qb->getQuery()->getResult();
    }
    /**
     * Retorna las personas
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\User $user
     * @param type $query
     * @return type
     */
    public function getSearch($query,  \BtoB\SocialNetwork\CoreBundle\Entity\User $user){
        $qb = $this->createQueryBuilder('u');
        $qb
            ->addSelect('l')
            ->addSelect('s')
            ->leftJoin('u.leaders', 'l', \Doctrine\ORM\Query\Expr\Join::WITH,'(l.leader = :user OR l.subscriber = :user)','')
            ->leftJoin('u.subscribers', 's', \Doctrine\ORM\Query\Expr\Join::WITH,'(s.leader = :user OR s.subscriber = :user)','')
            ->andWhere(
                    $qb->expr()->orX(
                            $qb->expr()->like('u.username', "'%".$query."%'"),
                            $qb->expr()->like('u.email', "'%".$query."%'"),
                            $qb->expr()->like('u.firstName',"'%".$query."%'"),
                            $qb->expr()->like('u.lastName', "'%".$query."%'")
                            )
                    )
            ->andWhere('u.id != :user')
            ->setParameter('user',$user)
            ;
        return $this->getPaginator($qb);
    }
    
    /**
     * Retorna los amigos conectados al chat en los ultimos 10 minutos
     * 
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\User $user
     * @param type $query
     * @return type
     */
    public function getLastUsersChatOnLine(\BtoB\SocialNetwork\CoreBundle\Entity\User $user)
    {
        $date = new  \DateTime();
        $date->modify('-10 minutes');
        
        $qb = $this->createQueryBuilder('u');
        $qb
            ->leftJoin('u.leaders', 'l')
            ->leftJoin('u.subscribers', 's')
            ->andWhere(
                $qb->expr()->orX('l.leader = :user','l.subscriber = :user','s.leader = :user','s.subscriber = :user')
            )
            ->andWhere('u.lastDateChatOnLine >= :lastDateChatOnLine')
            ->andWhere('u.id != :user')
//            ->setParameter('status', \BtoB\SocialNetwork\CoreBundle\Entity\Relation::STATUS_CONFIRMED)
            ->setParameter('user', $user)
            ->setParameter('lastDateChatOnLine',$date)
            ;
        return $qb->getQuery()->getResult();
    }
    
    /**
     * Retorna los usuarios invitados por 
     * @param \BtoB\SocialNetwork\CoreBundle\Repository\BtoB\SocialNetwork\CoreBundle\Entity\User $user
     * @param type $criteria
     * @return type
     */
    public function findUserInvitedBy(\BtoB\SocialNetwork\CoreBundle\Entity\User $user,$criteria = array())
    {
        $qb = $this->createQueryBuilder('u');
        $qb
            ->andWhere('u.referredBy = :user')
            ->setParameter('user', $user)
            ;
        if(isset($criteria['dateStart'])){
            $qb
                ->andWhere('u.date >= :dateStart')
                ->setParameter('dateStart', $criteria['dateStart'])
                ;
        }
        if(isset($criteria['dateStartEnd'])){
            $qb
                ->andWhere('u.date <= :dateStartEnd')
                ->setParameter('dateStartEnd', $criteria['dateStartEnd'])
                ;
        }
        return $qb->getQuery()->getResult();
    }
}
