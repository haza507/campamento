<?php

namespace CampaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Pagos
 *
 * @ORM\Table(name="pagos")
 * @ORM\Entity(repositoryClass="CampaBundle\Repository\PagosRepository")
 */
class Pagos
{
    
    // ...
    /**
     * @ORM\ManyToOne(targetEntity="Jovenes", inversedBy="Pagos")
     * @ORM\JoinColumn(name="Id_Joven", referencedColumnName="Id_Joven")
     */
    private $Jovenes;
    // ...
    
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Pago", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idpago;

    /**
     * @var int
     *
     * @ORM\Column(name="Id_Joven", type="integer")
     */
    private $idJoven;


    /**
     * @var string
     *
     * @ORM\Column(name="Pago", type="decimal", precision=4, scale=2)
     */
    private $pago;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="Id_Usuario", type="string", length=25)
     */
    private $idusuario;



    /**
     * Get idpago
     *
     * @return integer
     */
    public function getIdpago()
    {
        return $this->idpago;
    }

    /**
     * Set idJoven
     *
     * @param integer $idJoven
     *
     * @return Pagos
     */
    public function setIdJoven($idJoven)
    {
        $this->idJoven = $idJoven;

        return $this;
    }

    /**
     * Get idJoven
     *
     * @return integer
     */
    public function getIdJoven()
    {
        return $this->idJoven;
    }

    /**
     * Set pago
     *
     * @param string $pago
     *
     * @return Pagos
     */
    public function setPago($pago)
    {
        $this->pago = $pago;

        return $this;
    }

    /**
     * Get pago
     *
     * @return string
     */
    public function getPago()
    {
        return $this->pago;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Pagos
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set idusuario
     *
     * @param string $idusuario
     *
     * @return Pagos
     */
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * Get idusuario
     *
     * @return string
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set jovenes
     *
     * @param \CampaBundle\Entity\Jovenes $jovenes
     *
     * @return Pagos
     */
    public function setJovenes(\CampaBundle\Entity\Jovenes $jovenes = null)
    {
        $this->Jovenes = $jovenes;

        return $this;
    }

    /**
     * Get jovenes
     *
     * @return \CampaBundle\Entity\Jovenes
     */
    public function getJovenes()
    {
        return $this->Jovenes;
    }
}
