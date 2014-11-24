<?php

namespace BtoB\SocialNetwork\CoreBundle\Service;

/**
 * Herramientas comunes
 *
 * @author Carlos Mendoza <inhak20@tecnocreaciones.com>
 */
class CommonCoreTools implements \Symfony\Component\DependencyInjection\ContainerAwareInterface
{
    private $container;
    
    private $cdnInit = false;
    
    /**
     * Subiendo imagen de perfil
     */
    const UPLOAD_TYPE_PROFILE = 'profile';
    /**
     * Subiendo imagen de portada
     */
    const UPLOAD_TYPE_COVER = 'cover';
    /**
     * Sube uno o varios archivos y devuelve un nombre unico
     * 
     * @param array $files
     * @param type $type
     * @return type
     */
    public function uploadFiles(array $files,$type) {
        $value = '';
        $path = __DIR__.'/../../../../../web/uploads/';
        
        if($type == \BtoB\SocialNetwork\CoreBundle\Entity\Message::TYPE_PICTURE){
            $subPath = 'media/';
        }elseif($type == self::UPLOAD_TYPE_PROFILE){
            $subPath = 'avatars/';
        }elseif($type == self::UPLOAD_TYPE_COVER){
            $subPath = 'covers/';
        }
        $finalPath = $path.$subPath;
        $cdn = array();
        foreach ($files as $file) {
            $filename = sha1(uniqid(mt_rand(), true)) .'.'.$file->guessExtension();
            $value .= $filename.',';
            $file->move($finalPath,$filename);
            $cdn[] = $this->cdnUpload($finalPath, $filename);
        }
        $value = substr($value, 0, -1);
        
        $result = array(
            'value' => $value,
            'cdn' => $cdn,
        );
        return $result;
    }
    
    /**
     * Retorna el ultimo dia del mes y año necesitado
     * @param type $elAnio
     * @param type $elMes
     * @return type
     */
    public static function getLastDayMonth($elAnio,$elMes) {
        return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
    }
    
    public static function getDateMonthStart($month = null)
    {
        $dateStart = new \DateTime();
        if($month === null){
            $month = $dateStart->format('m');
        }
        $dateStart->setDate($dateStart->format('Y'),$month, 1);
        $dateStart->setTime(0, 0, 0);
        return $dateStart;
    }
    public static function getDateMonthEnd($month = null)
    {
        $dateEnd = new \DateTime();
        $anio = $dateEnd->format('Y');
        if($month === null){
            $month = $dateEnd->format('m');
        }
        $dateEnd->setDate($anio, $month,  self::getLastDayMonth($anio, $month));
        $dateEnd->setTime(23, 59, 59);
        
        return $dateEnd;
    }

    public function setContainer(\Symfony\Component\DependencyInjection\ContainerInterface $container = null) {
        $this->container = $container;
    }
    
    public function initCdn() {
        if($this->cdnInit === false){
            \Cloudinary::config(array(
              "cloud_name" => $this->container->getParameter('api_cloudinary_name'), 
              "api_key" => $this->container->getParameter('api_cloudinary_client_key'), 
              "api_secret" => $this->container->getParameter('api_cloudinary_client_secret')
            ));
            $this->cdnInit = true;
        }
    }
    
    public function cdnUpload($path,$finalName) {
        $this->initCdn();
        $finalPath = $path.$finalName;
        $dataResource = \Cloudinary\Uploader::upload($finalPath,array(
            'public_id' => $finalName,
            "tags" => array("media"),
            "crop" => "limit", "height" => "800",
        ));
        
        $resourceCDN = new \BtoB\SocialNetwork\CoreBundle\Entity\ResourceCDN();
        $resourceCDN
                ->setData($dataResource)
                ->setName($finalName)
                ->setType(\BtoB\SocialNetwork\CoreBundle\Entity\ResourceCDN::TYPE_CLOUDINARY)
                ;
        return $resourceCDN;
    }
    
    public function cdnDelete(\BtoB\SocialNetwork\CoreBundle\Entity\ResourceCDN $resourceCDN) {
        $this->initCdn();
        \Cloudinary\Uploader::destroy($resourceCDN->getName());
    }

}
