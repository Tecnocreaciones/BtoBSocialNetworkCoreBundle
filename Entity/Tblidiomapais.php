<?php

namespace BtoB\SocialNetwork\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblidiomapais
 *
 * @ORM\Table(name="tblidiomapais", indexes={@ORM\Index(name="IDX_3A986DEC1E9F130D", columns={"codigo_pais"})})
 * @ORM\Entity
 */
class Tblidiomapais
{
    /**
     * @var string
     *
     * @ORM\Column(name="idioma", type="string", length=30, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idioma;

    /**
     * @var string
     *
     * @ORM\Column(name="es_oficial", type="string", nullable=false)
     */
    private $esOficial = 'F';

    /**
     * @var float
     *
     * @ORM\Column(name="porcentaje", type="float", precision=4, scale=1, nullable=false)
     */
    private $porcentaje = '0.0';

    /**
     * @var \Tblpais
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Tblpais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_pais", referencedColumnName="codigo")
     * })
     */
    private $codigoPais;



    /**
     * Set idioma
     *
     * @param string $idioma
     * @return Tblidiomapais
     */
    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;

        return $this;
    }

    /**
     * Get idioma
     *
     * @return string 
     */
    public function getIdioma()
    {
        return $this->idioma;
    }

    /**
     * Set esOficial
     *
     * @param string $esOficial
     * @return Tblidiomapais
     */
    public function setEsOficial($esOficial)
    {
        $this->esOficial = $esOficial;

        return $this;
    }

    /**
     * Get esOficial
     *
     * @return string 
     */
    public function getEsOficial()
    {
        return $this->esOficial;
    }

    /**
     * Set porcentaje
     *
     * @param float $porcentaje
     * @return Tblidiomapais
     */
    public function setPorcentaje($porcentaje)
    {
        $this->porcentaje = $porcentaje;

        return $this;
    }

    /**
     * Get porcentaje
     *
     * @return float 
     */
    public function getPorcentaje()
    {
        return $this->porcentaje;
    }

    /**
     * Set codigoPais
     *
     * @param \BtoB\SocialNetwork\CoreBundle\Entity\Tblpais $codigoPais
     * @return Tblidiomapais
     */
    public function setCodigoPais(\BtoB\SocialNetwork\CoreBundle\Entity\Tblpais $codigoPais)
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
