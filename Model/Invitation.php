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

/**
 * Modelo de invitacion
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 */
abstract class Invitation
{
    /**
     * Borrador (Mensaje no enviado)
     */
    const STATUS_DRAF = 0;
    
    /**
     * Mensaje enviado
     */
    const STATUS_SEND = 1;
}
