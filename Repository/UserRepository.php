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
    /**
     * Busca un usuario por email o nombre de usuario
     * @param type $username
     * @return type
     */
    function findOneUser($username)
    {
        $qb = $this->createQueryBuilder('u');
        $qb
            ->andWhere($qb->expr()->orX('u.email = :username','u.username = :username'))
            ->setParameter('username', $username)
            ;
        
        return $qb->getQuery()->getOneOrNullResult();
    }
    
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
     * Retorna los
     * @param array $criteria
     * @return type
     */
    public function findUserTopByReferrals(array $criteria = array())
    {
        $qb = $this->createQueryBuilder("u");
        $qb
//           ->addSelect("u as user")
//           ->addSelect("u_r")
           ->addSelect($qb->expr()->count('u_r.id')." countReferrals")
           ->innerJoin("u.myReferrals", "u_r")
           ->groupBy("u.id") 
           ->orderBy("countReferrals","DESC")
        ;
        $criteria = new \Doctrine\Common\Collections\ArrayCollection($criteria);
        if(($dateStart = $criteria->remove("dateStart"))){
            $qb
                ->andWhere("u.date >= :dateStart")
                ->setParameter("dateStart", $dateStart)
            ;
        }
        
        if(($dateEnd = $criteria->remove("dateEnd"))){
            $qb
                ->andWhere("u.date <= :dateEnd")
                ->setParameter("dateEnd", $dateEnd)
            ;
        }
        return $this->getPaginator($qb);
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
    
    /**
     * Busca los usuarios que cumplen año en una fecha
     * @param \DateTime $date
     * @return type
     */
    public function findBirthdaysOfTheDay(\DateTime $date)
    {
        $qb = $this->createQueryBuilder('u');
        $month = $date->format('m');
        $day = $date->format('d');
        $like = '____-'.$month.'-'.$day;
        $qb
            ->andWhere($qb->expr()->like('u.born',"'".$like."'" ))
            ->setMaxResults(100)
            ;
        return $qb->getQuery()->getResult();
    }
}
