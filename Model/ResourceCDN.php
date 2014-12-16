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
    
    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    
    function getNameFile() {
        $name = $this->getUrl();
        $nameExplode = explode('/', $name);
        $nameCount = count($nameExplode);
        if($nameCount > 0){
            $name = $nameExplode[$nameCount - 1];
        }
        return $name;
    }
    
    function getThumb($parameters = array())
    {
        $parametersDef = array_merge(array(
            'width' => 60,
            "height" => 60,
            "crop" => "thumb",
            'radius' => 6
        ),$parameters);
        return cloudinary_url($this->getNameFile(),$parametersDef);
    }
    
    function getAvatar()
    {
         $parameters = array(
            'radius' => 0
        );
        return $this->getThumb($parameters);
    }
}
