<?php

namespace CampaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Iglesias
 *
 * @ORM\Table(name="iglesias")
 * @ORM\Entity(repositoryClass="CampaBundle\Repository\IglesiasRepository")
 */
class Iglesias
{
    
    // ...
    /**
     * @ORM\ManyToOne(targetEntity="Distritos", inversedBy="Iglesias")
     * @ORM\JoinColumn(name="Id_Distrito", referencedColumnName="Id_Distrito")
     */
    private $Distrito;
    // ...
    
    
    // ...
    /**
     * @ORM\OneToMany(targetEntity="Jovenes", mappedBy="Iglesias")
     */
    private $Jovenes;
    // ...
    
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Iglesia", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idiglesia;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre", type="string", length=60)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Pastor", type="string", length=50)
     */
    private $pastor;

    /**
     * @var string
     *
     * @ORM\Column(name="Lider", type="string", length=50, nullable=true)
     */
    private $lider;

    /**
     * @var string
     *
     * @ORM\Column(name="Telefono", type="string", length=15, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="Ubica", type="string", length=60, nullable=true)
     */
    private $ubica;

    /**
     * @var int
     *
     * @ORM\Column(name="Id_Distrito", type="integer")
     */
    private $idDistrito;

 public function __construct() {
         
        $this->Jovenes = new ArrayCollection();
    }



    /**
     * Get idiglesia
     *
     * @return integer
     */
    public function getIdiglesia()
    {
        return $this->idiglesia;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Iglesias
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
     * Set pastor
     *
     * @param string $pastor
     *
     * @return Iglesias
     */
    public function setPastor($pastor)
    {
        $this->pastor = $pastor;

        return $this;
    }

    /**
     * Get pastor
     *
     * @return string
     */
    public function getPastor()
    {
        return $this->pastor;
    }

    /**
     * Set lider
     *
     * @param string $lider
     *
     * @return Iglesias
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
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Iglesias
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
     * Set ubica
     *
     * @param string $ubica
     *
     * @return Iglesias
     */
    public function setUbica($ubica)
    {
        $this->ubica = $ubica;

        return $this;
    }

    /**
     * Get ubica
     *
     * @return string
     */
    public function getUbica()
    {
        return $this->ubica;
    }

    /**
     * Set idDistrito
     *
     * @param integer $idDistrito
     *
     * @return Iglesias
     */
    public function setIdDistrito($idDistrito)
    {
        $this->idDistrito = $idDistrito;

        return $this;
    }

    /**
     * Get idDistrito
     *
     * @return integer
     */
    public function getIdDistrito()
    {
        return $this->idDistrito;
    }

    /**
     * Set distrito
     *
     * @param \CampaBundle\Entity\Distritos $distrito
     *
     * @return Iglesias
     */
    public function setDistrito(\CampaBundle\Entity\Distritos $distrito = null)
    {
        $this->Distrito = $distrito;

        return $this;
    }

    /**
     * Get distrito
     *
     * @return \CampaBundle\Entity\Distritos
     */
    public function getDistrito()
    {
        return $this->Distrito;
    }

    /**
     * Add jovene
     *
     * @param \CampaBundle\Entity\Jovenes $jovene
     *
     * @return Iglesias
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
