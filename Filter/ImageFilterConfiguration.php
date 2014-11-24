<?php

namespace BtoB\SocialNetwork\CoreBundle\Filter;

use Liip\ImagineBundle\Imagine\Filter\FilterConfiguration;

/**
 * Description of ImageFilterConfiguration
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 */
class ImageFilterConfiguration extends FilterConfiguration 
{
    function hasFilter($filter){
        return isset($this->filters[$filter]);
    }
}
