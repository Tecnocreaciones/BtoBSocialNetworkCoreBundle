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
 * Base del recurso CDN
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 */
abstract class ResourceCDN
{
    const TYPE_CLOUDINARY = 'cloudinary';
    
    protected $data;
            
    function getUrl() {
        return $this->data['url'];
    }
}
