<?php

namespace BtoB\SocialNetwork\CoreBundle\Service;

use Tecnocreaciones\Bundle\ToolsBundle\Model\Configuration\ConfigurationManager;
use Tecnocreaciones\Bundle\ToolsBundle\Entity\Configuration\BaseGroup as Group;

/**
 * Configuracion general de BtoB
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 */
class Configuration extends ConfigurationManager
{
    const PAGINATOR_LIMIT = 'PAGINATOR_LIMIT';
    
    public function getPaginatorLimit($default = 10)
    {
        return $this->get(self::PAGINATOR_LIMIT,$default);
    }
    
    public function setPaginatorLimit($default = 10,$description = null, Group $group = null) 
    {
        return $this->set(self::PAGINATOR_LIMIT, $default, $description,$group);
    }
}
