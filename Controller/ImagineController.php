<?php

namespace BtoB\SocialNetwork\CoreBundle\Controller;

use Liip\ImagineBundle\Controller\ImagineController as BaseController;
use Imagine\Exception\RuntimeException;
use Liip\ImagineBundle\Exception\Binary\Loader\NotLoadableException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Controlador de imagenes
 *
 * @author Carlos Mendoza <inhack20@tecnocreaciones.com>
 */
class ImagineController extends BaseController implements \Symfony\Component\DependencyInjection\ContainerAwareInterface
{
    /**
     *
     * @var \Symfony\Component\DependencyInjection\ContainerInterface 
     */
    private $container;

    /**
     * This action applies a given filter to a given image, optionally saves the image and outputs it to the browser at the same time.
     *
     * @param Request $request
     * @param string $path
     * @param string $filter
     *
     * @throws \RuntimeExceptionr
     * @throws BadRequestHttpException
     *
     * @return RedirectResponse
     */
    public function filterAvatarAction(Request $request, $path, $filter)
    {
        $basePath = 'uploads/avatars/';
        $path = $basePath.$path;
        try {
            if (!$this->cacheManager->isStored($path, $filter)) {
                try {
                    $binary = $this->dataManager->find($filter, $path);
                    $this->cacheManager->store(
                        $this->filterManager->applyFilter($binary, $filter),
                        $path,
                        $filter
                    );
                } catch (NotLoadableException $e) {
                    $path = $basePath.'default.png';
                    if(!$this->cacheManager->isStored($path, $filter)){
                        $binary = $this->dataManager->find($filter, $path);
                        $this->cacheManager->store(
                            $this->filterManager->applyFilter($binary, $filter),
                            $path,
                            $filter
                        );
                    }
                }
            }

            return new RedirectResponse($this->cacheManager->resolve($path, $filter), 301);
        } catch (RuntimeException $e) {
            throw new \RuntimeException(sprintf('Unable to create image for path "%s" and filter "%s". Message was "%s"', $path, $filter, $e->getMessage()), 0, $e);
        }
    }
    /**
     * This action applies a given filter to a given image, optionally saves the image and outputs it to the browser at the same time.
     *
     * @param Request $request
     * @param string $path
     * @param string $filter
     *
     * @throws \RuntimeExceptionr
     * @throws BadRequestHttpException
     *
     * @return RedirectResponse
     */
    public function filterCoverAction(Request $request, $path, $filter)
    {
        $basePath = 'uploads/covers/';
        $path = $basePath.$path;
        try {
            if (!$this->cacheManager->isStored($path, $filter)) {
                try {
                    $binary = $this->dataManager->find($filter, $path);
                    $this->cacheManager->store(
                        $this->filterManager->applyFilter($binary, $filter),
                        $path,
                        $filter
                    );
                } catch (NotLoadableException $e) {
                    $path = $basePath.'default.png';
                    if(!$this->cacheManager->isStored($path, $filter)){
                        $binary = $this->dataManager->find($filter, $path);
                        $this->cacheManager->store(
                            $this->filterManager->applyFilter($binary, $filter),
                            $path,
                            $filter
                        );
                    }
                }
            }

            return new RedirectResponse($this->cacheManager->resolve($path, $filter), 301);
        } catch (RuntimeException $e) {
            throw new \RuntimeException(sprintf('Unable to create image for path "%s" and filter "%s". Message was "%s"', $path, $filter, $e->getMessage()), 0, $e);
        }
    }
    
    public function dynamicFilterAction(Request $request,$type,$path)
    {
        $basePath = 'uploads/'.$type.'/';
        $width = 100;
        $heigth = 100;
        switch ($type):
            case 'avatars':
                $width = 100;
                $heigth = 100;
                break;
            case 'covers':
                $width = 900;
                $heigth = 200;
                break;
            default :
                break;
        endswitch;
        
        if($request->query->has('w')){
            $width = $request->get('w',100);
        }
        if($request->query->has('h')){
            $heigth = $request->get('h',100);
        }
        $path = $basePath.$path;
        $filter = 'dynamic'.'_'.$width.'x'.$heigth;
        
        $filerConfiguration = $this->container->get('liip_imagine.filter.configuration');
        if(!$filerConfiguration->hasFilter($filter)){
            $baseFilter = $filerConfiguration->get('dynamic');
            $filerConfiguration->set($filter,$baseFilter);
        }

        if (!$this->cacheManager->isStored($path, $filter)) {
            $binary = $this->dataManager->find($filter, $path);

            $filteredBinary = $this->filterManager->applyFilter($binary, $filter, array(
                'filters' => array(
                    'thumbnail' => array(
                        'size' => array($width, $heigth)
                    )
                )
            ));

            $this->cacheManager->store($filteredBinary, $path, $filter);
        }

        return new RedirectResponse($this->cacheManager->resolve($path, $filter), 301);
    }
    
    public function relativeFilterAction(Request $request,$type,$path)
    {
        $basePath = 'uploads/'.$type.'/';
        $width = 768;
        $heigth = 50;
        switch ($type):
            case 'avatars':
                $width = 25;
                $heigth = 25;
                break;
            case 'covers':
                $width = 900;
                $heigth = 200;
                break;
            default :
                break;
        endswitch;
        
        if($request->query->has('w')){
            $width = $request->get('w',50);
        }
//        if($request->query->has('h')){
//            $heigth = $request->get('h',50);
//        }
        $path = $basePath.$path;
        $filter = 'relative'.'_'.$width;
        
        $filerConfiguration = $this->container->get('liip_imagine.filter.configuration');
        if(!$filerConfiguration->hasFilter($filter)){
            $baseFilter = $filerConfiguration->get('my_widen');
            $filerConfiguration->set($filter,$baseFilter);
        }

        if (!$this->cacheManager->isStored($path, $filter)) {
            $binary = $this->dataManager->find($filter, $path);

            $filteredBinary = $this->filterManager->applyFilter($binary, $filter, array(
                'filters' => array(
                    'relative_resize' => array(
                        'widen' => $width
                    )
                )
            ));

            $this->cacheManager->store($filteredBinary, $path, $filter);
        }

        return new RedirectResponse($this->cacheManager->resolve($path, $filter), 301);
    }

    public function setContainer(\Symfony\Component\DependencyInjection\ContainerInterface $container = null) {
        $this->container = $container;
    }

}
