<?php

namespace BtoB\SocialNetwork\CoreBundle\Doctrine\ORM;

use Doctrine\ORM\EntityRepository as BaseEntityRepository;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\QueryBuilder;

/**
 * Repositorio base para todas las entidades
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 */
class EntityRepository extends BaseEntityRepository
{
    protected $container;
    
    /**
     * Retorna un paginador
     * @param \Doctrine\ORM\QueryBuilder $queryBuilder
     * @return \BtoB\SocialNetwork\CoreBundle\Doctrine\ORM\Paginator
     */
    public function getPaginator(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        $pagerfanta = new Paginator(new DoctrineORMAdapter($queryBuilder));
        $pagerfanta->setContainer($this->container);
        return $pagerfanta;
    }
    
    /**
     * Retorna todos los resultados paginados
     * @return \BtoB\SocialNetwork\CoreBundle\Doctrine\ORM\Paginator
     */
    public function findAllPaginated()
    {
        return $this->getPaginator($this->getQueryBuilder());
    }
    
    /**
     * Get a user from the Security Context
     *
     * @return mixed
     *
     * @throws \LogicException If SecurityBundle is not available
     *
     * @see Symfony\Component\Security\Core\Authentication\Token\TokenInterface::getUser()
     */
    public function getUser()
    {
        if (!$this->container->has('security.context')) {
            throw new \LogicException('The SecurityBundle is not registered in your application.');
        }

        if (null === $token = $this->container->get('security.context')->getToken()) {
            return null;
        }

        if (!is_object($user = $token->getUser())) {
            return null;
        }

        return $user;
    }
    
    /**
     * 
     * @return \Symfony\Component\Security\Core\SecurityContext
     * @throws \LogicException
     */
    public function getSecurityContext()
    {
        if (!$this->container->has('security.context')) {
            throw new \LogicException('The SecurityBundle is not registered in your application.');
        }
        return $this->container->get('security.context');
    }
    
    /**
     * Retorna un paginador con valores escalares (Sin hidratar)
     * @param \Doctrine\ORM\QueryBuilder $queryBuilder
     * @return \Tecnocreaciones\Bundle\ResourceBundle\Model\Paginator\Paginator
     */
    public function getScalarPaginator(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        $pagerfanta = new Paginator(new \Pagerfanta\Adapter\ArrayAdapter($queryBuilder->getQuery()->getScalarResult()));
        $pagerfanta->setContainer($this->container);
        return $pagerfanta;
    }
    
    /**
     * Retorna un paginador con valores escalares (Sin hidratar)
     * @param \Doctrine\ORM\QueryBuilder $queryBuilder
     * @return \Tecnocreaciones\Bundle\ResourceBundle\Model\Paginator\Paginator
     */
    public function getArrayPaginator(\Doctrine\ORM\QueryBuilder $queryBuilder)
    {
        $pagerfanta = new Paginator(new \Pagerfanta\Adapter\ArrayAdapter($queryBuilder->getQuery()->getArrayResult()));
        $pagerfanta->setContainer($this->container);
        return $pagerfanta;
    }
    
    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }
    
    /**
     * 
     * @return \Doctrine\ORM\QueryBuilder
     */
    protected function getQueryBuilder()
    {
        return $this->createQueryBuilder($this->getAlias());
    }
    
    /**
     * @param QueryBuilder $queryBuilder
     *
     * @param array $criteria
     */
    protected function applyCriteria(QueryBuilder $queryBuilder, array $criteria = null)
    {
        if (null === $criteria) {
            return;
        }

        foreach ($criteria as $property => $value) {
            if (null === $value) {
                $queryBuilder
                    ->andWhere($queryBuilder->expr()->isNull($this->getPropertyName($property)));
            } elseif (!is_array($value)) {
                $queryBuilder
                    ->andWhere($queryBuilder->expr()->eq($this->getPropertyName($property), ':' . $property))
                    ->setParameter($property, $value);
            } else {
                $queryBuilder->andWhere($queryBuilder->expr()->in($this->getPropertyName($property), $value));
            }
        }
    }

    /**
     * @param QueryBuilder $queryBuilder
     *
     * @param array $sorting
     */
    protected function applySorting(QueryBuilder $queryBuilder, array $sorting = null)
    {
        if (null === $sorting) {
            return;
        }

        foreach ($sorting as $property => $order) {
            if (!empty($order)) {
                $queryBuilder->orderBy($this->getPropertyName($property), $order);
            }
        }
    }
    
    /**
     * @param string $name
     *
     * @return string
     */
    protected function getPropertyName($name)
    {
        if (false === strpos($name, '.')) {
            return $this->getAlias().'.'.$name;
        }

        return $name;
    }
    
    protected function getAlias()
    {
        return 'o';
    }
}
