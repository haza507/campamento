<?php

namespace CampaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Distritos
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="distritos")
 * @ORM\Entity(repositoryClass="CampaBundle\Repository\DistritosRepository")
 */
class Distritos
{
  
   // ...
    /**
     * @ORM\ManyToOne(targetEntity="Zonas", inversedBy="Distritos")
     * @ORM\JoinColumn(name="Id_Zona", referencedColumnName="Id_Zona")
     */
    private $Zona;
    // ...
  
  // ...
    /**
     * @ORM\OneToMany(targetEntity="Iglesias", mappedBy="Distritos")
     */
    private $Iglesias;
    // ...
  
  
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Distrito", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $iddistrito;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Lider", type="string", length=50)
     */
    private $lider;
    
      /**
     * @var string
     *
     * @ORM\Column(name="Valor", type="decimal", precision=4, scale=2)
     */
    private $valor;

    /**
     * @var int
     *
     * @ORM\Column(name="Id_Zona", type="integer")
     */
    private $idZona;

   public function __construct() {
         
        $this->Iglesias = new ArrayCollection();
    }


    /**
     * Get iddistrito
     *
     * @return integer
     */
    public function getIddistrito()
    {
        return $this->iddistrito;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Distritos
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
     * Set lider
     *
     * @param string $lider
     *
     * @return Distritos
     */
    public function setLider($lider)
    {
        $this->lider = $lider;

        return $this;
    }

    /**
     * Get lider
     *
     * @return string
     */
    public function getLider()
    {
        return $this->lider;
    }

    /**
     * Set valor
     *
     * @param string $valor
     *
     * @return Distritos
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set idZona
     *
     * @param integer $idZona
     *
     * @return Distritos
     */
    public function setIdZona($idZona)
    {
        $this->idZona = $idZona;

        return $this;
    }

    /**
     * Get idZona
     *
     * @return integer
     */
    public function getIdZona()
    {
        return $this->idZona;
    }

    /**
     * Set zona
     *
     * @param \CampaBundle\Entity\Zonas $zona
     *
     * @return Distritos
     */
    public function setZona(\CampaBundle\Entity\Zonas $zona = null)
    {
        $this->Zona = $zona;

        return $this;
    }

    /**
     * Get zona
     *
     * @return \CampaBundle\Entity\Zonas
     */
    public function getZona()
    {
        return $this->Zona;
    }



    /**
     * Add iglesia
     *
     * @param \CampaBundle\Entity\Iglesias $iglesia
     *
     * @return Distritos
     */
    public function addIglesia(\CampaBundle\Entity\Iglesias $iglesia)
    {
        $this->Iglesias[] = $iglesia;

        return $this;
    }

    /**
     * Remove iglesia
     *
     * @param \CampaBundle\Entity\Iglesias $iglesia
     */
    public function removeIglesia(\CampaBundle\Entity\Iglesias $iglesia)
    {
        $this->Iglesias->removeElement($iglesia);
    }

    /**
     * Get iglesias
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIglesias()
    {
        return $this->Iglesias;
    }
}
