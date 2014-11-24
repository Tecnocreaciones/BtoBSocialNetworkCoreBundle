<?php

namespace BtoB\SocialNetwork\CoreBundle\Security;

/**
 * Proveedor de usuario por email o usuario
 *
 * @author Carlos Mendoza <inhak20@tecnocreaciones.com>
 */
class EmailUserProvider extends UserProvider
{
    /**
     * {@inheritDoc}
     */
    protected function findUser($username)
    {
        return $this->userManager->findUserByUsernameOrEmail($username);
    }
}
