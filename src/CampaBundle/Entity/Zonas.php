<?php

namespace CampaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Zonas
 *
 * @ORM\Table(name="zonas")
 * @ORM\Entity(repositoryClass="CampaBundle\Repository\ZonasRepository")
 */
class Zonas
{
    
     // ...
    /**
     * @ORM\OneToMany(targetEntity="Distritos", mappedBy="Zonas")
     */
    private $Distritos;
    // ...
    
    
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Zona", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idzona;

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

     public function __construct() {
         
        $this->Distritos = new ArrayCollection();
    }


    /**
     * Get idzona
     *
     * @return integer
     */
    public function getIdzona()
    {
        return $this->idzona;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Zonas
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
     * @return Zonas
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
     * Add distrito
     *
     * @param \CampaBundle\Entity\Distritos $distrito
     *
     * @return Zonas
     */
    public function addDistrito(\CampaBundle\Entity\Distritos $distrito)
    {
        $this->Distritos[] = $distrito;

        return $this;
    }

    /**
     * Remove distrito
     *
     * @param \CampaBundle\Entity\Distritos $distrito
     */
    public function removeDistrito(\CampaBundle\Entity\Distritos $distrito)
    {
        $this->Distritos->removeElement($distrito);
    }

    /**
     * Get distritos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDistritos()
    {
        return $this->Distritos;
    }
}
