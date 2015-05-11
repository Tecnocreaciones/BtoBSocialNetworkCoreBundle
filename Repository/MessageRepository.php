<?php

namespace BtoB\SocialNetwork\CoreBundle\Repository;

use BtoB\SocialNetwork\CoreBundle\Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MessageRepository extends EntityRepository
{
    function findPreHidrate($id)
    {
        $qb = $this->createQueryBuilder('m');
        $qb
            ->addSelect('m_u')
            ->addSelect('m_u_prcdn')
            ->addSelect('m_u_crcdn')
            ->innerJoin('m.user', 'm_u')
            ->leftJoin('m_u.profileResourceCDN', 'm_u_prcdn')
            ->leftJoin('m_u.coverResourceCDN', 'm_u_crcdn')
            ->andWhere('m.id = :message')
            ->setParameter('message', $id)
            ;
        return $qb->getQuery()->getOneOrNullResult();
    }
    
    public function getMessagesByUser(\BtoB\SocialNetwork\CoreBundle\Entity\User $user)
    {
        $qb = $this->createQueryBuilder('m');
        $qb->select('m')
           ->where('m.user = :user')
           ->setParameter('user', $user)
            ;
        return $qb->getQuery()->getResult();
    }
    
    public function getLastMessageByUser(\BtoB\SocialNetwork\CoreBundle\Entity\User $user)
    {
        $qb = $this->createQueryBuilder('m');
        $qb->select('m')
           ->where('m.user = :user')
           ->setParameter('user', $user)
           ->orderBy("m.id","DESC")
           ->setMaxResults(1)
            ;
        return $qb->getQuery()->getOneOrNullResult();
    }
    
    /**
     * Retorna las ultimas noticias
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\User $user
     * @param type $maxResults
     * @return type
     */
    public function getNewsByUser(\BtoB\SocialNetwork\CoreBundle\Entity\User $user,$maxResults = 11)
    {
        $qbUser = $this->getEntityManager()->createQueryBuilder();
        $qbUser
                ->select('l.id')
                ->from('BtoB\SocialNetwork\CoreBundle\Entity\Relation', 'r')
                ->innerJoin('r.leader', 'l')
                ->andWhere('r.subscriber = :subscriber')
                ->setParameter('subscriber', $user)
                ;
        $queryLeaders = $qbUser->getQuery()->getScalarResult();
        $leaders = array();
        foreach ($queryLeaders as $leader) {
            $leaders[] = $leader['id'];
        }
        $leaders[] = $user->getId();
        
        $qb = $this->createQueryBuilder('m');
        $qb->select('m')
            ->addSelect('u')
            //->addSelect('l')
            //->addSelect('s')
                
            ->innerJoin('m.user', 'u')
            ->leftJoin('m.resourcesCDN', 'm_r')
            //->innerJoin('u.leaders', 'l', \Doctrine\ORM\Query\Expr\Join::WITH,'(l.leader = :user OR l.subscriber = :user)','')
            //->innerJoin('u.subscribers', 's', \Doctrine\ORM\Query\Expr\Join::WITH,'(s.leader = :user OR s.subscriber = :user)','')
           ->andWhere($qb->expr()->in('m.user', $leaders))
           ->andWhere('m.public = :public') 
                
           ->setParameter('public', true)
           //->setParameter('user', $user)
           ->orderBy('m.id','DESC')
           ->setMaxResults($maxResults)
            ;
        return $this->getPaginator($qb);
    }
    
    /**
     * Retorna el timeline
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\User $user
     * @param type $maxResults
     * @return type
     */
    public function getTimelineByUser(\BtoB\SocialNetwork\CoreBundle\Entity\User $user,$maxResults = 11)
    {
        $qb = $this->createQueryBuilder('m');
        $qb->select('m')
           ->where('m.user = :user')
           ->innerJoin('m.user', 'u')
           ->setParameter('user', $user)
           ->orderBy('m.id','DESC')
           ->setMaxResults($maxResults)
            ;
        return $this->getPaginator($qb);
    }
    
    /**
     * Retorna el timeline
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\User $user
     * @param type $maxResults
     * @return type
     */
    public function getProfileByUser(\BtoB\SocialNetwork\CoreBundle\Entity\User $user,\BtoB\SocialNetwork\CoreBundle\Entity\User $userLogged,$onlyPublic = true,$maxResults = 11)
    {
        $qb = $this->createQueryBuilder('m');
        $qb->select('m')
            ->addSelect('u')
            ->addSelect('l')
            ->addSelect('s')
                
           ->innerJoin('m.user', 'u')
                
           ->leftJoin('u.leaders', 'l', \Doctrine\ORM\Query\Expr\Join::WITH,'(l.leader = :userLogged OR l.subscriber = :userLogged)','')
           ->leftJoin('u.subscribers', 's', \Doctrine\ORM\Query\Expr\Join::WITH,'(s.leader = :userLogged OR s.subscriber = :userLogged)','')
                
           ->andWhere('m.user = :user')
           ->orderBy('m.id','DESC')
           ->setMaxResults($maxResults)
           ->setParameter('user', $user)
           ->setParameter('userLogged', $userLogged);
        
        if($onlyPublic){
            $qb
           ->andWhere('m.public = :onlyPublic')
           ->setParameter('onlyPublic', $onlyPublic)
            ;
        }
        return $this->getPaginator($qb);
    }
    
    function findRewardsByUser(\BtoB\SocialNetwork\CoreBundle\Entity\User $user,array $criteria = array(),array $sorting = array()) {
        $qb = $this->getQueryBuilder();
        $qb
                ->select("m as message")
                ->addSelect("l")
                ->addSelect($qb->expr()->count('l.id').' countRewards')
                ->innerJoin("m.likes", 'l')
                ->innerJoin('l.byUser', 'u')
                ->andWhere('m.user = :user')
//                ->andWhere('u.id != :user')
                ->groupBy('m.id')
                ->setParameter('user', $user)
                ->orderBy('countRewards','DESC')
                ;
        $sorting = new \Doctrine\Common\Collections\ArrayCollection($sorting);
        $criteria = new \Doctrine\Common\Collections\ArrayCollection($criteria);
        if(($userName = $criteria->remove('username'))){
            $qb->andWhere($qb->expr()->like("u.username","'%".$userName."%'"));
        }
        if(($dateStart = $criteria->remove('dateStart'))){
            $qb->andWhere('l.createdAt >= :dateStart')
            ->setParameter('dateStart', $dateStart)
            ;
        }
        if(($dateEnd = $criteria->remove('dateEnd'))){
            $qb->andWhere('l.createdAt <= :dateEnd')
            ->setParameter('dateEnd', $dateEnd)
            ;
        }
        if(($countRewards = $sorting->remove('countRewards'))){
            $qb->orderBy('countRewards',$countRewards);
        }
        $this->applySorting($qb,$sorting->toArray());
        return $this->getPaginator($qb);
    }
    
    function findRewardsDayWinnerByUser(\BtoB\SocialNetwork\CoreBundle\Entity\User $user,array $criteria = array(),array $sorting) {
        $qb = $this->getQueryBuilder();
        $qb
                ->select("m as message")
                ->addSelect($qb->expr()->substring('m.createdAt',1,10).' datePost')
                ->andWhere('m.user = :user')
//                ->andWhere('u.id != :user')
//                ->groupBy('m.id')
                ->groupBy('datePost')
                ->setParameter('user', $user)
                ->orderBy('m.likesCount','DESC')
                ;
        $sorting = new \Doctrine\Common\Collections\ArrayCollection($sorting);
        $criteria = new \Doctrine\Common\Collections\ArrayCollection($criteria);
        if(($userName = $criteria->remove('username'))){
            $qb->andWhere($qb->expr()->like("u.username","'%".$userName."%'"));
        }
        if(($dateStart = $criteria->remove('dateStart'))){
            $qb->andWhere('m.createdAt >= :dateStart')
            ->setParameter('dateStart', $dateStart)
            ;
        }
        if(($dateEnd = $criteria->remove('dateEnd'))){
            $qb->andWhere('m.createdAt <= :dateEnd')
            ->setParameter('dateEnd', $dateEnd)
            ;
        }
        if(($countRewards = $sorting->remove('countRewards'))){
            $qb->orderBy('countRewards',$countRewards);
        }
        $this->applySorting($qb,$sorting->toArray());
        return $this->getPaginator($qb);
    }
    
    function findMessages($param) {
        
    }
    
    function findRewards(array $criteria = array(),array $sorting = array()) {
        $qb = $this->getQueryBuilder();
        $qb
                ->select("m as message")
//                ->addSelect("l")
                ->addSelect('m.likesCount countRewards')
                ->addSelect('m_u')
//                ->innerJoin("m.likes", 'l')
                ->innerJoin("m.user", 'm_u')
//                ->innerJoin('l.byUser', 'u')
//                ->andWhere('u.id != :user')
                ->addGroupBy('m.id')
                ->addGroupBy('m_u.id')
                ->addOrderBy('countRewards','DESC')
                ->addOrderBy('m.createdAt','DESC')
                ->andHaving('countRewards >= 1')
                ;
        
        $sorting = new \Doctrine\Common\Collections\ArrayCollection($sorting);
        $criteria = new \Doctrine\Common\Collections\ArrayCollection($criteria);
        if(($userName = $criteria->remove('username'))){
            $qb->andWhere($qb->expr()->like("m_u.username","'%".$userName."%'"));
        }
        if(($user = $criteria->remove('user'))){
            $qb->andWhere('m_u.id = :user')
            ->setParameter('user', $user)
            ;
        }
        if(($dateStart = $criteria->remove('dateStart'))){
            $qb->andWhere('m.createdAt >= :dateStart')
            ->setParameter('dateStart', $dateStart)
            ;
        }
        if(($dateEnd = $criteria->remove('dateEnd'))){
            $qb->andWhere('m.createdAt <= :dateEnd')
            ->setParameter('dateEnd', $dateEnd)
            ;
        }
        
        $qb->setMaxResults(100);
        $results = $qb->getQuery()->getResult();
        $messagesId = array();
        foreach ($results as $result) {
            $message = $result['message'];
            $message->getUser()->getId();
            $userId = $message->getUser()->getId();
            if(isset($messagesId[$userId])){
                continue;
            }
            $messagesId[$userId] = $message->getId();
        }
        if(count($messagesId) > 0){
            $qb->andWhere($qb->expr()->in('m.id', $messagesId));
        }
        $qb->orderBy('countRewards','DESC');
        
        if(($countRewards = $sorting->remove('countRewards'))){
            $qb->orderBy('countRewards',$countRewards);
        }
        $this->applySorting($qb,$sorting->toArray());
        return $this->getPaginator($qb);
    }
    
    /**
     * Retorna el post con mas rewards del mes
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\User $user
     * @param array $criteria
     * @param array $sorting
     * @return type
     */
    function findMaxRewardByUser(\BtoB\SocialNetwork\CoreBundle\Entity\User $user,array $criteria = array(),array $sorting = array()) {
        $qb = $this->getQueryBuilder();
        $qb
                ->select("m as message")
                ->addSelect("l")
                ->addSelect($qb->expr()->count('l.id').' countRewards')
                ->innerJoin("m.likes", 'l')
                ->innerJoin('l.byUser', 'u')
                ->andWhere('m.user = :user')
                ->groupBy('m.id')
                ->setParameter('user', $user)
                ->orderBy('countRewards','DESC')
                ->addOrderBy('m.createdAt','DESC')
                ->setMaxResults(1)
                ;
        $sorting = new \Doctrine\Common\Collections\ArrayCollection($sorting);
        $criteria = new \Doctrine\Common\Collections\ArrayCollection($criteria);
        if(($userName = $criteria->remove('username'))){
            $qb->andWhere($qb->expr()->like("u.username","'%".$userName."%'"));
        }
        if(($dateStart = $criteria->remove('dateStart'))){
            $qb->andWhere('l.time >= :dateStart')
            ->setParameter('dateStart', $dateStart)
            ;
        }
        if(($dateEnd = $criteria->remove('dateEnd'))){
            $qb->andWhere('l.time <= :dateEnd')
            ->setParameter('dateEnd', $dateEnd)
            ;
        }
        if(($countRewards = $sorting->remove('countRewards'))){
            $qb->orderBy('countRewards',$countRewards);
        }
        $this->applySorting($qb,$sorting->toArray());
        return $qb->getQuery()->getOneOrNullResult();
    }
    
    /**
     * Cuenta los mensajes publicados de un usuario
     * @param type $user
     * @return type
     */
    public function countMessagesByUser($user)
    {
        $qb = $this->createQueryBuilder("m");
        $qb
            ->addSelect($qb->expr()->count("m.id")." countMessages")
            ->andWhere("m.user = :user")
            ->innerJoin("m.user", "m_u")
            ->groupBy("m_u.id")
            ->setParameter("user", $user)
        ;
        
        return $qb->getQuery()->getArrayResult();
    }
    
    protected function getAlias() {
        return 'm';
    }
    
}
