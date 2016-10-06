<?php

namespace CampaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Cabana
 *
 * @ORM\Table(name="cabana")
 * @ORM\Entity(repositoryClass="CampaBundle\Repository\CabanaRepository")
 */
class Cabana
{
    
    // ...
    /**
     * @ORM\OneToMany(targetEntity="Jovenes", mappedBy="Cabana")
     */
    private $Jovenes;
    // ...
    
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Cabana", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idcabana;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre", type="string", length=40)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Lider", type="string", length=50, nullable=true)
     */
    private $lider;

    /**
     * @var int
     *
     * @ORM\Column(name="Camas", type="integer")
     */
    private $camas;

    public function __construct() {
        $this->Jovenes = new ArrayCollection();
    }


    /**
     * Get idcabana
     *
     * @return integer
     */
    public function getIdcabana()
    {
        return $this->idcabana;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Cabana
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
     * @return Cabana
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
     * Set camas
     *
     * @param integer $camas
     *
     * @return Cabana
     */
    public function setCamas($camas)
    {
        $this->camas = $camas;

        return $this;
    }

    /**
     * Get camas
     *
     * @return integer
     */
    public function getCamas()
    {
        return $this->camas;
    }

    /**
     * Add jovene
     *
     * @param \CampaBundle\Entity\Jovenes $jovene
     *
     * @return Cabana
     */
    public function addJovene(\CampaBundle\Entity\Jovenes $jovene)
    {
        $this->Jovenes[] = $jovene;

        return $this;
    }

    /**
     * Remove jovene
     *
     * @param \CampaBundle\Entity\Jovenes $jovene
     */
    public function removeJovene(\CampaBundle\Entity\Jovenes $jovene)
    {
        $this->Jovenes->removeElement($jovene);
    }

    /**
     * Get jovenes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJovenes()
    {
        return $this->Jovenes;
    }
}
