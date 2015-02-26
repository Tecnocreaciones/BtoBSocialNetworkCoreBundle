<?php

namespace BtoB\SocialNetwork\CoreBundle\Repository;

use BtoB\SocialNetwork\CoreBundle\Doctrine\ORM\EntityRepository;
use BtoB\SocialNetwork\CoreBundle\Entity\User;

/**
 * Repositorio del chat
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 */
class ChatRepository extends EntityRepository
{
    /**
     * Retorna los chats abiertos con el ultimo mensaje
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\User $user
     * @return type
     */
    function findActiveChat(User $user)
    {
        //Buscar id de los amigos que tienen chat abiertos
        $qbListChatsFrieds = $this->getQueryBuilder();
        $qbListChatsFrieds
                ->select('f.id as idFrom,t.id as idTo')
                ->innerJoin('c.from', 'f')
                ->innerJoin('c.to', 't')
                ->where(
                    $qbListChatsFrieds->expr()->orX('c.from = :user','c.to = :user')
                )
                ->addGroupBy('c.from')
                ->addGroupBy('c.to')
                ->orderBy('c.time','DESC')
                ->setParameter('user',$user);
        $idPeopleChat = array();
        foreach ($qbListChatsFrieds->getQuery()->getArrayResult() as $result) {
            $idFrom = (int) $result['idFrom'];
            $idTo = (int) $result['idTo'];
            
            if($user->getId() != $idFrom){
                $idPeopleChat[$idFrom] = $idFrom;
            }
            
            if($user->getId() != $idTo){
                $idPeopleChat[$idTo] = $idTo;
            }
        }
        //unset($idPeopleChat[$user->getId()]);
        
        
        $idLastChats = array();
        //Ultimo mensaje de chat de cada usuario
        foreach ($idPeopleChat as $idPeople) {
            $qbLastMessage = $this->getQueryBuilder();
            $qbLastMessage
                ->select('c.id')
                ->where(
                        $qbLastMessage->expr()->orX(
                                $qbLastMessage->expr()->andX('c.from = :user','c.to = :friend'),
                                $qbLastMessage->expr()->andX('c.from = :friend','c.to = :user')
                        )
                )
                ->orderBy('c.time','DESC')
                ->setParameter('user', $user)
                ->setParameter('friend', $idPeople)
                ->setMaxResults(1)
                ;
                $result = $qbLastMessage->getQuery()->getOneOrNullResult(\Doctrine\ORM\AbstractQuery::HYDRATE_ARRAY);
                $idLastChats[] = $result['id'];
        }
        
        $qb = $this->getQueryBuilder();
        $qb
            ->andWhere($qb->expr()->in('c.id', $idLastChats))
            ->orderBy('c.time','DESC')
            ;
        
        return $this->getPaginator($qb);
    }
    
    public function findChatsByUsers(User $userFrom,User $userTo)
    {
        $qb = $this->getQueryBuilder();
        $qb
                ->select('c,f,t')
                ->innerJoin('c.from','f')
                ->innerJoin('c.to','t')
                ->innerJoin('c.chatHistorys','c_h',  \Doctrine\ORM\Query\Expr\Join::WITH,'c.id = c_h.chat AND c_h.userOwner = :user')
                ->where(
                        $qb->expr()->orX(
                                $qb->expr()->andX('c.from = :user','c.to = :friend'),
                                $qb->expr()->andX('c.from = :friend','c.to = :user')
                        )
                )
                ->orderBy('c.time','DESC')
                ->setParameter('user', $userFrom)
                ->setParameter('friend', $userTo)
            ->orderBy('c.id','ASC')
            ;
        
        return $this->getPaginator($qb);
    }
    
    protected function getAlias() {
        return 'c';
    }
}
