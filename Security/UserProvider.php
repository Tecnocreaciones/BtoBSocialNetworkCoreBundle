<?php

namespace BtoB\SocialNetwork\CoreBundle\Security;

use FOS\UserBundle\Model\User;
use FOS\UserBundle\Propel\User as PropelUser;
use FOS\UserBundle\Security\UserProvider as BaseUserProvider;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Proveedor de usuarios
 *
 * @author Carlos Mendoza <inhak20@tecnocreaciones.com>
 */
class UserProvider extends BaseUserProvider
{
    public function refreshUser(UserInterface $user) {
        if (!$user instanceof User && !$user instanceof PropelUser) {
            throw new UnsupportedUserException(sprintf('Expected an instance of FOS\UserBundle\Model\User, but got "%s".', get_class($user)));
        }

        if (!$this->supportsClass(get_class($user))) {
            throw new UnsupportedUserException(sprintf('Expected an instance of %s, but got "%s".', $this->userManager->getClass(), get_class($user)));
        }

        if (null === $reloadedUser = $this->userManager->findUserBy(array('idu' => $user->getId()))) {
            throw new UsernameNotFoundException(sprintf('User with ID "%d" could not be reloaded.', $user->getId()));
        }

        return $reloadedUser;
    }
}
