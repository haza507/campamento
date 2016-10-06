<?php

namespace CampaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Auditoria
 *
 * @ORM\Table(name="auditorias")
 * @ORM\Entity(repositoryClass="CampaBundle\Repository\AuditoriaRepository")
 */
class Auditoria
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Auditoria", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idAuditoria;

    /**
     * @var string
     *
     * @ORM\Column(name="Id_Usuario", type="string", length=20)
     */
    private $idUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="Accion", type="string", length=100)
     */
    private $accion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Fecha", type="datetime")
     */
    private $fecha;




    /**
     * Get idAuditoria
     *
     * @return integer
     */
    public function getIdAuditoria()
    {
        return $this->idAuditoria;
    }

    /**
     * Set idUsuario
     *
     * @param string $idUsuario
     *
     * @return Auditoria
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return string
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set accion
     *
     * @param string $accion
     *
     * @return Auditoria
     */
    public function setAccion($accion)
    {
        $this->accion = $accion;

        return $this;
    }

    /**
     * Get accion
     *
     * @return string
     */
    public function getAccion()
    {
        return $this->accion;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Auditoria
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
}
