<?php

namespace BtoB\SocialNetwork\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblpais
 *
 * @ORM\Table(name="tblPais")
 * @ORM\Entity
 */
class Tblpais
{
    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=3, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=52, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="continente", type="string", nullable=false)
     */
    private $continente = 'Norteamérica';

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=26, nullable=false)
     */
    private $region;

    /**
     * @var float
     *
     * @ORM\Column(name="superficie", type="float", precision=10, scale=2, nullable=false)
     */
    private $superficie = '0.00';

    /**
     * @var integer
     *
     * @ORM\Column(name="independecia_anio", type="smallint", nullable=true)
     */
    private $independeciaAnio;

    /**
     * @var integer
     *
     * @ORM\Column(name="poblacion", type="integer", nullable=false)
     */
    private $poblacion = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="esperanza_de_vida", type="float", precision=3, scale=1, nullable=true)
     */
    private $esperanzaDeVida;

    /**
     * @var float
     *
     * @ORM\Column(name="producto_nal_bruto", type="float", precision=10, scale=2, nullable=true)
     */
    private $productoNalBruto;

    /**
     * @var float
     *
     * @ORM\Column(name="producto_nal_brutoOld", type="float", precision=10, scale=2, nullable=true)
     */
    private $productoNalBrutoold;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_local", type="string", length=45, nullable=false)
     */
    private $nombreLocal;

    /**
     * @var string
     *
     * @ORM\Column(name="forma_de_gobierno", type="string", length=45, nullable=false)
     */
    private $formaDeGobierno;

    /**
     * @var string
     *
     * @ORM\Column(name="jefe_de_estado", type="string", length=60, nullable=true)
     */
    private $jefeDeEstado;

    /**
     * @var integer
     *
     * @ORM\Column(name="capital", type="integer", nullable=true)
     */
    private $capital;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo2", type="string", length=2, nullable=false)
     */
    private $codigo2;



    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Tblpais
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
     * Set continente
     *
     * @param string $continente
     * @return Tblpais
     */
    public function setContinente($continente)
    {
        $this->continente = $continente;

        return $this;
    }

    /**
     * Get continente
     *
     * @return string 
     */
    public function getContinente()
    {
        return $this->continente;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return Tblpais
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set superficie
     *
     * @param float $superficie
     * @return Tblpais
     */
    public function setSuperficie($superficie)
    {
        $this->superficie = $superficie;

        return $this;
    }

    /**
     * Get superficie
     *
     * @return float 
     */
    public function getSuperficie()
    {
        return $this->superficie;
    }

    /**
     * Set independeciaAnio
     *
     * @param integer $independeciaAnio
     * @return Tblpais
     */
    public function setIndependeciaAnio($independeciaAnio)
    {
        $this->independeciaAnio = $independeciaAnio;

        return $this;
    }

    /**
     * Get independeciaAnio
     *
     * @return integer 
     */
    public function getIndependeciaAnio()
    {
        return $this->independeciaAnio;
    }

    /**
     * Set poblacion
     *
     * @param integer $poblacion
     * @return Tblpais
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
     * Set esperanzaDeVida
     *
     * @param float $esperanzaDeVida
     * @return Tblpais
     */
    public function setEsperanzaDeVida($esperanzaDeVida)
    {
        $this->esperanzaDeVida = $esperanzaDeVida;

        return $this;
    }

    /**
     * Get esperanzaDeVida
     *
     * @return float 
     */
    public function getEsperanzaDeVida()
    {
        return $this->esperanzaDeVida;
    }

    /**
     * Set productoNalBruto
     *
     * @param float $productoNalBruto
     * @return Tblpais
     */
    public function setProductoNalBruto($productoNalBruto)
    {
        $this->productoNalBruto = $productoNalBruto;

        return $this;
    }

    /**
     * Get productoNalBruto
     *
     * @return float 
     */
    public function getProductoNalBruto()
    {
        return $this->productoNalBruto;
    }

    /**
     * Set productoNalBrutoold
     *
     * @param float $productoNalBrutoold
     * @return Tblpais
     */
    public function setProductoNalBrutoold($productoNalBrutoold)
    {
        $this->productoNalBrutoold = $productoNalBrutoold;

        return $this;
    }

    /**
     * Get productoNalBrutoold
     *
     * @return float 
     */
    public function getProductoNalBrutoold()
    {
        return $this->productoNalBrutoold;
    }

    /**
     * Set nombreLocal
     *
     * @param string $nombreLocal
     * @return Tblpais
     */
    public function setNombreLocal($nombreLocal)
    {
        $this->nombreLocal = $nombreLocal;

        return $this;
    }

    /**
     * Get nombreLocal
     *
     * @return string 
     */
    public function getNombreLocal()
    {
        return $this->nombreLocal;
    }

    /**
     * Set formaDeGobierno
     *
     * @param string $formaDeGobierno
     * @return Tblpais
     */
    public function setFormaDeGobierno($formaDeGobierno)
    {
        $this->formaDeGobierno = $formaDeGobierno;

        return $this;
    }

    /**
     * Get formaDeGobierno
     *
     * @return string 
     */
    public function getFormaDeGobierno()
    {
        return $this->formaDeGobierno;
    }

    /**
     * Set jefeDeEstado
     *
     * @param string $jefeDeEstado
     * @return Tblpais
     */
    public function setJefeDeEstado($jefeDeEstado)
    {
        $this->jefeDeEstado = $jefeDeEstado;

        return $this;
    }

    /**
     * Get jefeDeEstado
     *
     * @return string 
     */
    public function getJefeDeEstado()
    {
        return $this->jefeDeEstado;
    }

    /**
     * Set capital
     *
     * @param integer $capital
     * @return Tblpais
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;

        return $this;
    }

    /**
     * Get capital
     *
     * @return integer 
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * Set codigo2
     *
     * @param string $codigo2
     * @return Tblpais
     */
    public function setCodigo2($codigo2)
    {
        $this->codigo2 = $codigo2;

        return $this;
    }

    /**
     * Get codigo2
     *
     * @return string 
     */
    public function getCodigo2()
    {
        return $this->codigo2;
    }
}
