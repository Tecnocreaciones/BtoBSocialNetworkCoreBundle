<?php

/*
 * This file is part of the TecnoCreaciones package.
 * 
 * (c) www.tecnocreaciones.com
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BtoB\SocialNetwork\CoreBundle\Model;

use FOS\UserBundle\Model\User as BaseUser;

/**
 * Description of User
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 */
abstract class User extends BaseUser
{
    protected $percentageComplete;
    
    function isValidProfile()
    {
        if($this->percentageComplete >= 100){
            return true;
        }
        return false;
    }
}
