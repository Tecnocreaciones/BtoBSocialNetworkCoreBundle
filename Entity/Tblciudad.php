<?php

namespace BtoB\SocialNetwork\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblciudad
 *
 * @ORM\Table(name="tblciudad", indexes={@ORM\Index(name="codigo_pais", columns={"codigo_pais"})})
 * @ORM\Entity
 */
class Tblciudad
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=35, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="distrito", type="string", length=20, nullable=false)
     */
    private $distrito;

    /**
     * @var integer
     *
     * @ORM\Column(name="poblacion", type="integer", nullable=false)
     */
    private $poblacion = '0';

    /**
     * @var \Tblpais
     *
     * @ORM\ManyToOne(targetEntity="Tblpais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_pais", referencedColumnName="codigo")
     * })
     */
    private $codigoPais;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Tblciudad
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set distrito
     *
     * @param string $distrito
     * @return Tblciudad
     */
    public function setDistrito($distrito)
    {
        $this->distrito = $distrito;

        return $this;
    }

    /**
     * Get distrito
     *
     * @return string 
     */
    public function getDistrito()
    {
        return $this->distrito;
    }

    /**
     * Set poblacion
     *
     * @param integer $poblacion
     * @return Tblciudad
     */
    public function setPoblacion($poblacion)
    {
        $this->poblacion = $poblacion;

        return $this;
    }

    /**
     * Get poblacion
     *
     * @return integer 
     */
    public function getPoblacion()
    {
        return $this->poblacion;
    }

    /**
     * Set codigoPais
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\Tblpais $codigoPais
     * @return Tblciudad
     */
    public function setCodigoPais(\BtoB\SocialNetwork\CoreBundle\Entity\Tblpais $codigoPais = null)
    {
        $this->codigoPais = $codigoPais;

        return $this;
    }

    /**
     * Get codigoPais
     *
     * @return \BtoB\SocialNetwork\CoreBundle\Entity\Tblpais 
     */
    public function getCodigoPais()
    {
        return $this->codigoPais;
    }
}
