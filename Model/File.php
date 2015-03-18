<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BtoB\SocialNetwork\CoreBundle\Model;

use Exception;

/**
 * A file in the file system.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 *
 * @api
 */
class File extends \SplFileInfo
{
    protected $mimeType;
    
    /**
     * Constructs a new file from the given path.
     *
     * @param string  $path      The path to the file
     * @param bool    $checkPath Whether to check the path or not
     *
     * @throws FileNotFoundException If the given path is not a file
     *
     * @api
     */
    public function __construct($path, $checkPath = true,$mimeType = 'application/octet-stream')
    {
        if ($checkPath && !is_file($path)) {
            throw new \Symfony\Component\Filesystem\Exception\FileNotFoundException($path);
        }
        $this->mimeType = $mimeType;
        parent::__construct($path);
    }

    /**
     * Returns the extension of the file.
     *
     * \SplFileInfo::getExtension() is not available before PHP 5.3.6
     *
     * @return string The extension
     *
     * @api
     */
    public function getExtension()
    {
        return pathinfo($this->getBasename(), PATHINFO_EXTENSION);
    }
    
    public function guessExtension()
    {
        $guesser = new MimeTypeExtensionGuesser();
        $type = $this->getMimeType();

        return $guesser->guess($type);
    }

    /**
     * Moves the file to a new location.
     *
     * @param string $directory The destination folder
     * @param string $name      The new file name
     *
     * @return File A File object representing the new file
     *
     * @throws FileException if the target file could not be created
     *
     * @api
     */
    public function move($directory, $name = null)
    {
        $target = $this->getTargetFile($directory, $name);

        if (!@rename($this->getPathname(), $target)) {
            $error = error_get_last();
            throw new Exception(sprintf('Could not move the file "%s" to "%s" (%s)', $this->getPathname(), $target, strip_tags($error['message'])));
        }

        @chmod($target, 0666 & ~umask());

        return $target;
    }

    protected function getTargetFile($directory, $name = null)
    {
        if (!is_dir($directory)) {
            if (false === @mkdir($directory, 0777, true)) {
                throw new Exception(sprintf('Unable to create the "%s" directory', $directory));
            }
        } elseif (!is_writable($directory)) {
            throw new Exception(sprintf('Unable to write in the "%s" directory', $directory));
        }

        $target = rtrim($directory, '/\\').DIRECTORY_SEPARATOR.(null === $name ? $this->getBasename() : $this->getName($name));

        return new File($target, false);
    }

    /**
     * Returns locale independent base name of the given path.
     *
     * @param string $name The new file name
     *
     * @return string containing
     */
    protected function getName($name)
    {
        $originalName = str_replace('\\', '/', $name);
        $pos = strrpos($originalName, '/');
        $originalName = false === $pos ? $originalName : substr($originalName, $pos + 1);

        return $originalName;
    }
    
    public function getMimeType()
    {
        return $this->mimeType;
    }
}
