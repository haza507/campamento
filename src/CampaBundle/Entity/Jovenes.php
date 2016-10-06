<?php

namespace CampaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Jovenes
 *
 * @ORM\Table(name="jovenes")
 * @ORM\Entity(repositoryClass="CampaBundle\Repository\JovenesRepository")
 */
class Jovenes
{
    
    // ...
    /**
     * @ORM\ManyToOne(targetEntity="Iglesias", inversedBy="Jovenes")
     * @ORM\JoinColumn(name="Id_Iglesia", referencedColumnName="Id_Iglesia")
     */
    private $Iglesias;
    // ...
    
    
    // ...
    /**
     * @ORM\OneToMany(targetEntity="Pagos", mappedBy="Jovenes")
     */
    private $Pagos;
    // ...
    
    // ...
    /**
     * @ORM\ManyToOne(targetEntity="Cabana", inversedBy="Jovenes")
     * @ORM\JoinColumn(name="Id_Cabana", referencedColumnName="Id_Cabana")
     */
    private $Cabana;
    // ...
    
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Joven", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idjoven;

    /**
     * @var string
     *
     * @ORM\Column(name="Cedula", type="string", length=15, unique=true)
     */
    private $cedula;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Apellido", type="string", length=50)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="Sexo", type="string",length=2)
     
     */
    private $sexo;

    /**
     * @var int
     *
     * @ORM\Column(name="Edad", type="integer")
     */
    private $edad;


    /**
     * @var int
     *
     * @ORM\Column(name="Id_Iglesia", type="integer")
     */
    private $idIglesia;

    /**
     * @var string
     *
     * @ORM\Column(name="Saldo", type="decimal", precision=4, scale=2)
     */
    private $saldo;

    /**
     * @var string
     *
     * @ORM\Column(name="Estado", type="string", length=10)
     */
    private $estado;

    /**
     * @var int
     *
     * @ORM\Column(name="Id_Cabana", type="integer")
     */
    private $idCabana;

    /**
     * @var bool
     *
     * @ORM\Column(name="Cama", type="boolean")
     */
    private $cama;

    /**
     * @var string
     *
     * @ORM\Column(name="Telefono", type="string", length=15)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="Correo", type="string", length=50)
     
     */
    private $correo;

public function __construct() {
         
        $this->Pagos = new ArrayCollection();
    }


    /**
     * Get idjoven
     *
     * @return integer
     */
    public function getIdjoven()
    {
        return $this->idjoven;
    }

    /**
     * Set cedula
     *
     * @param string $cedula
     *
     * @return Jovenes
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get cedula
     *
     * @return string
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Jovenes
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
     * Set apellido
     *
     * @param string $apellido
     *
     * @return Jovenes
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     *
     * @return Jovenes
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set edad
     *
     * @param integer $edad
     *
     * @return Jovenes
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get edad
     *
     * @return integer
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set idIglesia
     *
     * @param integer $idIglesia
     *
     * @return Jovenes
     */
    public function setIdIglesia($idIglesia)
    {
        $this->idIglesia = $idIglesia;

        return $this;
    }

    /**
     * Get idIglesia
     *
     * @return integer
     */
    public function getIdIglesia()
    {
        return $this->idIglesia;
    }

    /**
     * Set saldo
     *
     * @param string $saldo
     *
     * @return Jovenes
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;

        return $this;
    }

    /**
     * Get saldo
     *
     * @return string
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Jovenes
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set idCabana
     *
     * @param integer $idCabana
     *
     * @return Jovenes
     */
    public function setIdCabana($idCabana)
    {
        $this->idCabana = $idCabana;

        return $this;
    }

    /**
     * Get idCabana
     *
     * @return integer
     */
    public function getIdCabana()
    {
        return $this->idCabana;
    }

    /**
     * Set cama
     *
     * @param boolean $cama
     *
     * @return Jovenes
     */
    public function setCama($cama)
    {
        $this->cama = $cama;

        return $this;
    }

    /**
     * Get cama
     *
     * @return boolean
     */
    public function getCama()
    {
        return $this->cama;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Jovenes
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set correo
     *
     * @param string $correo
     *
     * @return Jovenes
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set iglesias
     *
     * @param \CampaBundle\Entity\Iglesias $iglesias
     *
     * @return Jovenes
     */
    public function setIglesias(\CampaBundle\Entity\Iglesias $iglesias = null)
    {
        $this->Iglesias = $iglesias;

        return $this;
    }

    /**
     * Get iglesias
     *
     * @return \CampaBundle\Entity\Iglesias
     */
    public function getIglesias()
    {
        return $this->Iglesias;
    }

    /**
     * Add pago
     *
     * @param \CampaBundle\Entity\Pagos $pago
     *
     * @return Jovenes
     */
    public function addPago(\CampaBundle\Entity\Pagos $pago)
    {
        $this->Pagos[] = $pago;

        return $this;
    }

    /**
     * Remove pago
     *
     * @param \CampaBundle\Entity\Pagos $pago
     */
    public function removePago(\CampaBundle\Entity\Pagos $pago)
    {
        $this->Pagos->removeElement($pago);
    }

    /**
     * Get pagos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPagos()
    {
        return $this->Pagos;
    }

    /**
     * Set cabana
     *
     * @param \CampaBundle\Entity\Cabana $cabana
     *
     * @return Jovenes
     */
    public function setCabana(\CampaBundle\Entity\Cabana $cabana = null)
    {
        $this->Cabana = $cabana;

        return $this;
    }

    /**
     * Get cabana
     *
     * @return \CampaBundle\Entity\Cabana
     */
    public function getCabana()
    {
        return $this->Cabana;
    }
}
