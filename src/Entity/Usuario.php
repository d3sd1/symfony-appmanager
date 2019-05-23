<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioRepository")
 */
class Usuario
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_empresa;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_delegacion;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_departamento;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_sociedad;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_almacen;
    /**
     * @ORM\Column(type="string")
     */
    private $nombre;
    /**
     * @ORM\Column(type="text")
     */
    private $password;
    /**
     * @ORM\Column(type="integer")
     */
    private $num_logins;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $ultimo_login;
    /**
     * @ORM\Column(type="text")
     */
    private $nombre_completo;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $email;
    /**
     * @ORM\Column(type="text", length=65535, nullable=true)
     */
    private $email_departamento;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tlf;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $datos_contacto;
    /**
     * @ORM\Column(type="boolean")
     */
    private $aplicacion;
    /**
     * @ORM\Column(type="boolean")
     */
    private $retail;
    /**
     * @ORM\Column(type="boolean")
     */
    private $envio_sms;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $nombre_web;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $url_imagen;

    /**
     * @ORM\Column(type="boolean")
     */
    private $visibilidad;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $orden;
    /**
     * @ORM\Column(type="text")
     */
    private $cargo;
    /**
     * @ORM\Column(type="text")
     */
    private $lema;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $cargo_en;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $lema_en;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $lema_de;
    /**
     * @ORM\Column(type="time")
     */
    private $fecha_edicion;
    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $fecha_sincronizacion;
    /**
     * @ORM\Column(type="boolean")
     */
    private $clientes;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_unidad_organizativa;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_usuario_grupo;
    /**
     * @ORM\Column(type="boolean")
     */
    private $store;
    /**
     * @ORM\Column(type="boolean")
     */
    private $reports;
    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $recuperacion_codigo;
    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $recuperacion_fecha;
    /**
     * @ORM\Column(type="boolean")
     */
    private $activo;
    /**
     * @ORM\Column(type="boolean")
     */
    private $cambio_password;
    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $password_temp;
    /**
     * @ORM\Column(type="boolean")
     */
    private $oculto;
    /**
     * @ORM\Column(type="boolean")
     */
    private $actualizar_reports;
    /**
     * @ORM\Column(type="boolean")
     */
    private $cierre_v2;

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
    public function getIdEmpresa()
    {
        return $this->id_empresa;
    }

    /**
     * @param mixed $id_empresa
     */
    public function setIdEmpresa($id_empresa): void
    {
        $this->id_empresa = $id_empresa;
    }

    /**
     * @return mixed
     */
    public function getIdDelegacion()
    {
        return $this->id_delegacion;
    }

    /**
     * @param mixed $id_delegacion
     */
    public function setIdDelegacion($id_delegacion): void
    {
        $this->id_delegacion = $id_delegacion;
    }

    /**
     * @return mixed
     */
    public function getIdDepartamento()
    {
        return $this->id_departamento;
    }

    /**
     * @param mixed $id_departamento
     */
    public function setIdDepartamento($id_departamento): void
    {
        $this->id_departamento = $id_departamento;
    }

    /**
     * @return mixed
     */
    public function getIdSociedad()
    {
        return $this->id_sociedad;
    }

    /**
     * @param mixed $id_sociedad
     */
    public function setIdSociedad($id_sociedad): void
    {
        $this->id_sociedad = $id_sociedad;
    }

    /**
     * @return mixed
     */
    public function getIdAlmacen()
    {
        return $this->id_almacen;
    }

    /**
     * @param mixed $id_almacen
     */
    public function setIdAlmacen($id_almacen): void
    {
        $this->id_almacen = $id_almacen;
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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getNumLogins()
    {
        return $this->num_logins;
    }

    /**
     * @param mixed $num_logins
     */
    public function setNumLogins($num_logins): void
    {
        $this->num_logins = $num_logins;
    }

    /**
     * @return mixed
     */
    public function getUltimoLogin()
    {
        return $this->ultimo_login;
    }

    /**
     * @param mixed $ultimo_login
     */
    public function setUltimoLogin($ultimo_login): void
    {
        $this->ultimo_login = $ultimo_login;
    }

    /**
     * @return mixed
     */
    public function getNombreCompleto()
    {
        return $this->nombre_completo;
    }

    /**
     * @param mixed $nombre_completo
     */
    public function setNombreCompleto($nombre_completo): void
    {
        $this->nombre_completo = $nombre_completo;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmailDepartamento()
    {
        return $this->email_departamento;
    }

    /**
     * @param mixed $email_departamento
     */
    public function setEmailDepartamento($email_departamento): void
    {
        $this->email_departamento = $email_departamento;
    }

    /**
     * @return mixed
     */
    public function getTlf()
    {
        return $this->tlf;
    }

    /**
     * @param mixed $tlf
     */
    public function setTlf($tlf): void
    {
        $this->tlf = $tlf;
    }

    /**
     * @return mixed
     */
    public function getDatosContacto()
    {
        return $this->datos_contacto;
    }

    /**
     * @param mixed $datos_contacto
     */
    public function setDatosContacto($datos_contacto): void
    {
        $this->datos_contacto = $datos_contacto;
    }

    /**
     * @return mixed
     */
    public function getAplicacion()
    {
        return $this->aplicacion;
    }

    /**
     * @param mixed $aplicacion
     */
    public function setAplicacion($aplicacion): void
    {
        $this->aplicacion = $aplicacion;
    }

    /**
     * @return mixed
     */
    public function getRetail()
    {
        return $this->retail;
    }

    /**
     * @param mixed $retail
     */
    public function setRetail($retail): void
    {
        $this->retail = $retail;
    }

    /**
     * @return mixed
     */
    public function getEnvioSms()
    {
        return $this->envio_sms;
    }

    /**
     * @param mixed $envio_sms
     */
    public function setEnvioSms($envio_sms): void
    {
        $this->envio_sms = $envio_sms;
    }

    /**
     * @return mixed
     */
    public function getNombreWeb()
    {
        return $this->nombre_web;
    }

    /**
     * @param mixed $nombre_web
     */
    public function setNombreWeb($nombre_web): void
    {
        $this->nombre_web = $nombre_web;
    }

    /**
     * @return mixed
     */
    public function getUrlImagen()
    {
        return $this->url_imagen;
    }

    /**
     * @param mixed $url_imagen
     */
    public function setUrlImagen($url_imagen): void
    {
        $this->url_imagen = $url_imagen;
    }

    /**
     * @return mixed
     */
    public function getVisibilidad()
    {
        return $this->visibilidad;
    }

    /**
     * @param mixed $visibilidad
     */
    public function setVisibilidad($visibilidad): void
    {
        $this->visibilidad = $visibilidad;
    }

    /**
     * @return mixed
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * @param mixed $orden
     */
    public function setOrden($orden): void
    {
        $this->orden = $orden;
    }

    /**
     * @return mixed
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @param mixed $cargo
     */
    public function setCargo($cargo): void
    {
        $this->cargo = $cargo;
    }

    /**
     * @return mixed
     */
    public function getLema()
    {
        return $this->lema;
    }

    /**
     * @param mixed $lema
     */
    public function setLema($lema): void
    {
        $this->lema = $lema;
    }

    /**
     * @return mixed
     */
    public function getCargoEn()
    {
        return $this->cargo_en;
    }

    /**
     * @param mixed $cargo_en
     */
    public function setCargoEn($cargo_en): void
    {
        $this->cargo_en = $cargo_en;
    }

    /**
     * @return mixed
     */
    public function getLemaEn()
    {
        return $this->lema_en;
    }

    /**
     * @param mixed $lema_en
     */
    public function setLemaEn($lema_en): void
    {
        $this->lema_en = $lema_en;
    }

    /**
     * @return mixed
     */
    public function getLemaDe()
    {
        return $this->lema_de;
    }

    /**
     * @param mixed $lema_de
     */
    public function setLemaDe($lema_de): void
    {
        $this->lema_de = $lema_de;
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

    /**
     * @return mixed
     */
    public function getClientes()
    {
        return $this->clientes;
    }

    /**
     * @param mixed $clientes
     */
    public function setClientes($clientes): void
    {
        $this->clientes = $clientes;
    }

    /**
     * @return mixed
     */
    public function getIdUnidadOrganizativa()
    {
        return $this->id_unidad_organizativa;
    }

    /**
     * @param mixed $id_unidad_organizativa
     */
    public function setIdUnidadOrganizativa($id_unidad_organizativa): void
    {
        $this->id_unidad_organizativa = $id_unidad_organizativa;
    }

    /**
     * @return mixed
     */
    public function getIdUsuarioGrupo()
    {
        return $this->id_usuario_grupo;
    }

    /**
     * @param mixed $id_usuario_grupo
     */
    public function setIdUsuarioGrupo($id_usuario_grupo): void
    {
        $this->id_usuario_grupo = $id_usuario_grupo;
    }

    /**
     * @return mixed
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * @param mixed $store
     */
    public function setStore($store): void
    {
        $this->store = $store;
    }

    /**
     * @return mixed
     */
    public function getReports()
    {
        return $this->reports;
    }

    /**
     * @param mixed $reports
     */
    public function setReports($reports): void
    {
        $this->reports = $reports;
    }

    /**
     * @return mixed
     */
    public function getRecuperacionCodigo()
    {
        return $this->recuperacion_codigo;
    }

    /**
     * @param mixed $recuperacion_codigo
     */
    public function setRecuperacionCodigo($recuperacion_codigo): void
    {
        $this->recuperacion_codigo = $recuperacion_codigo;
    }

    /**
     * @return mixed
     */
    public function getRecuperacionFecha()
    {
        return $this->recuperacion_fecha;
    }

    /**
     * @param mixed $recuperacion_fecha
     */
    public function setRecuperacionFecha($recuperacion_fecha): void
    {
        $this->recuperacion_fecha = $recuperacion_fecha;
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
    public function getCambioPassword()
    {
        return $this->cambio_password;
    }

    /**
     * @param mixed $cambio_password
     */
    public function setCambioPassword($cambio_password): void
    {
        $this->cambio_password = $cambio_password;
    }

    /**
     * @return mixed
     */
    public function getPasswordTemp()
    {
        return $this->password_temp;
    }

    /**
     * @param mixed $password_temp
     */
    public function setPasswordTemp($password_temp): void
    {
        $this->password_temp = $password_temp;
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
    public function getActualizarReports()
    {
        return $this->actualizar_reports;
    }

    /**
     * @param mixed $actualizar_reports
     */
    public function setActualizarReports($actualizar_reports): void
    {
        $this->actualizar_reports = $actualizar_reports;
    }

    /**
     * @return mixed
     */
    public function getCierreV2()
    {
        return $this->cierre_v2;
    }

    /**
     * @param mixed $cierre_v2
     */
    public function setCierreV2($cierre_v2): void
    {
        $this->cierre_v2 = $cierre_v2;
    }
}
