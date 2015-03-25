<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BtoB\SocialNetwork\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Documento
 *
 * @author inhack20
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 */
class Document
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    public $name;
    
    /**
     * @ORM\Column(name="sufixPath",type="string", length=255)
     */
    public $sufixPath;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;
    
    private $file;
    
    private $temp;
    
    private $relative;
            
    function getId() 
    {
        return $this->id;
    }
        
    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        $this->relative = null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
        return $this->relative;
    }

    protected function getUploadRootDir()
    {
        if(class_exists("BtoB\SocialNetwork\ContainerAware")){
            $base = \BtoB\SocialNetwork\ContainerAware::getInstance()->getParameter('kernel.root_dir');
        }else{
            $base = __DIR__."/../../../../../../../web/";
        }
        // the absolute directory path where uploaded
        // documents should be saved
        return $base.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/'.$this->sufixPath;
    }
    
    /**
     * Get file.
     *
     * @return \BtoB\SocialNetwork\CoreBundle\Model\UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
    
    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile($file = null)
    {
        $this->file = $file;
        // check if we have an old image path
        if (isset($this->path)) {
            // store the old name to delete after the update
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename.'.'.$this->getFile()->guessExtension();
            $this->name = $this->getFile()->getClientOriginalName();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFile()->move($this->getUploadRootDir(), $this->path);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->file = null;
        $this->getWebPath();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        $file = $this->getAbsolutePath();
        if (file_exists($file)) {
            @unlink($file);
        }
    }
    
    function setSufixPath($sufixPath) 
    {
        $this->sufixPath = $sufixPath;
    }
    
    /**
     * @ORM\PostLoad()
     */
    public function postLoad()
    {
        $this->getWebPath();
    }

    public function __toString() {
        return $this->getWebPath();
    }
}