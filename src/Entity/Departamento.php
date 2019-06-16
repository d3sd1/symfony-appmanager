<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DepartamentoRepository")
 */
class Departamento
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $nombre;
    /**
     * @ORM\Column(type="string")
     */
    private $nombre_publico;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $mail;
    /**
     * @ORM\Column(type="string")
     */
    private $codigo;
    /**
     * @ORM\Column(type="boolean")
     */
    private $activo;
    /**
     * @ORM\Column(type="boolean")
     */
    private $oculto;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_a3_categoria;
    /**
     * @ORM\Column(type="integer")
     */
    private $guardias;
    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_edicion;
    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_sincronizacion;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getNombrePublico()
    {
        return $this->nombre_publico;
    }

    /**
     * @param mixed $nombre_publico
     */
    public function setNombrePublico($nombre_publico): void
    {
        $this->nombre_publico = $nombre_publico;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo): void
    {
        $this->codigo = $codigo;
    }

    /**
     * @return mixed
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * @param mixed $activo
     */
    public function setActivo($activo): void
    {
        $this->activo = $activo;
    }

    /**
     * @return mixed
     */
    public function getOculto()
    {
        return $this->oculto;
    }

    /**
     * @param mixed $oculto
     */
    public function setOculto($oculto): void
    {
        $this->oculto = $oculto;
    }

    /**
     * @return mixed
     */
    public function getIdA3Categoria()
    {
        return $this->id_a3_categoria;
    }

    /**
     * @param mixed $id_a3_categoria
     */
    public function setIdA3Categoria($id_a3_categoria): void
    {
        $this->id_a3_categoria = $id_a3_categoria;
    }

    /**
     * @return mixed
     */
    public function getGuardias()
    {
        return $this->guardias;
    }

    /**
     * @param mixed $guardias
     */
    public function setGuardias($guardias): void
    {
        $this->guardias = $guardias;
    }

    /**
     * @return mixed
     */
    public function getFechaEdicion()
    {
        return $this->fecha_edicion;
    }

    /**
     * @param mixed $fecha_edicion
     */
    public function setFechaEdicion($fecha_edicion): void
    {
        $this->fecha_edicion = $fecha_edicion;
    }

    /**
     * @return mixed
     */
    public function getFechaSincronizacion()
    {
        return $this->fecha_sincronizacion;
    }

    /**
     * @param mixed $fecha_sincronizacion
     */
    public function setFechaSincronizacion($fecha_sincronizacion): void
    {
        $this->fecha_sincronizacion = $fecha_sincronizacion;
    }


}
