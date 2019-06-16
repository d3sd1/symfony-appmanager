<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="ServicioRepository")
 */
class Servicio
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
    private $id_sociedad;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_presupuesto;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_peticion;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_albaran;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_campanya;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_usuario_alta;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_usuario_peticion;
    /**
     * @ORM\Column(type="smallint")
     */
    private $id_servicio_estado;
    /**
     * @ORM\Column(type="boolean")
     */
    private $aprobado;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $numero;
    /**
     * @ORM\Column(type="datetime", nullable=false, options={"default": "CURRENT_TIMESTAMP"})
     */
    private $fecha_creacion;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_alta;
    /**
     * @ORM\Column(type="integer", nullable=false, options={"default": 0})
     */
    private $id_empresa;
    /**
     * @ORM\Column(type="integer", nullable=false, options={"default": 0})
     */
    private $id_unidad_organizativa;
    /**
     * @ORM\Column(type="integer", nullable=false, options={"default": 0})
     */
    private $id_contacto;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contacto_texto;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $nombre;
    /**
     * @ORM\Column(type="smallint", length=6, nullable=false, options={"default": 0})
     */
    private $dificultad;
    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default": false})
     */
    private $comunicacion_cliente;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comunicacion_cliente_notas;
    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default": false})
     */
    private $comunicacion_personal;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comunicacion_personal_notas;
    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default": false})
     */
    private $pago_revisado;
    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default": false})
     */
    private $casting_cliente;
    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default": false})
     */
    private $visible_cliente;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $razon;
    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $motivo_anulacion;
    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default": false})
     */
    private $id_servicio_wo_categoria;
    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default": false})
     */
    private $evaluado;
    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default": false})
     */
    private $documentaciones;
    /**
     * @ORM\Column(type="integer", nullable=false, options={"default": 0})
     */
    private $id_acreditacion_proceso;
    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default": false})
     */
    private $urgente;
    /**
     * @ORM\Column(type="datetime", nullable=true, options={"default": NULL})
     */
    private $fecha_inicio;
    /**
     * @ORM\Column(type="datetime", nullable=true, options={"default": NULL})
     */
    private $fecha_fin;
    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default": false})
     */
    private $cierre_v2;
    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default": false})
     */
    private $cierre_iniciado;
    /**
     * @ORM\Column(type="datetime", nullable=true, options={"default": NULL})
     */
    private $fecha_edicion;
    /**
     * @ORM\Column(type="datetime", nullable=true, options={"default": NULL})
     */
    private $fecha_sincronizacion;
    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default": false})
     */
    private $portal_empleado;
    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default": false})
     */
    private $checkin;
    /**
     * @ORM\Column(type="integer", nullable=false, options={"default": 0})
     */
    private $id_usuario_cierre;
    /**
     * @ORM\Column(type="datetime", nullable=true, options={"default": NULL})
     */
    private $fecha_cierre;
    /**
     * @ORM\Column(type="decimal", precision=9, scale=2, nullable=false, options={"default": 0.00})
     */
    private $temp_total;
    /**
     * @ORM\Column(type="integer", nullable=false, options={"default": 0})
     */
    private $temp_id_unidad_organizativa;
    /**
     * @ORM\Column(type="integer", nullable=false, options={"default": 0})
     */
    private $temp_id_empresa_facturacion;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $temp_incidencia_texto;

    public function getId(): ?int
    {
        return $this->id;
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
    public function getIdPresupuesto()
    {
        return $this->id_presupuesto;
    }

    /**
     * @param mixed $id_presupuesto
     */
    public function setIdPresupuesto($id_presupuesto): void
    {
        $this->id_presupuesto = $id_presupuesto;
    }

    /**
     * @return mixed
     */
    public function getIdPeticion()
    {
        return $this->id_peticion;
    }

    /**
     * @param mixed $id_peticion
     */
    public function setIdPeticion($id_peticion): void
    {
        $this->id_peticion = $id_peticion;
    }

    /**
     * @return mixed
     */
    public function getIdAlbaran()
    {
        return $this->id_albaran;
    }

    /**
     * @param mixed $id_albaran
     */
    public function setIdAlbaran($id_albaran): void
    {
        $this->id_albaran = $id_albaran;
    }

    /**
     * @return mixed
     */
    public function getIdCampanya()
    {
        return $this->id_campanya;
    }

    /**
     * @param mixed $id_campanya
     */
    public function setIdCampanya($id_campanya): void
    {
        $this->id_campanya = $id_campanya;
    }

    /**
     * @return mixed
     */
    public function getIdUsuarioAlta()
    {
        return $this->id_usuario_alta;
    }

    /**
     * @param mixed $id_usuario_alta
     */
    public function setIdUsuarioAlta($id_usuario_alta): void
    {
        $this->id_usuario_alta = $id_usuario_alta;
    }

    /**
     * @return mixed
     */
    public function getIdUsuarioPeticion()
    {
        return $this->id_usuario_peticion;
    }

    /**
     * @param mixed $id_usuario_peticion
     */
    public function setIdUsuarioPeticion($id_usuario_peticion): void
    {
        $this->id_usuario_peticion = $id_usuario_peticion;
    }

    /**
     * @return mixed
     */
    public function getIdServicioEstado()
    {
        return $this->id_servicio_estado;
    }

    /**
     * @param mixed $id_servicio_estado
     */
    public function setIdServicioEstado($id_servicio_estado): void
    {
        $this->id_servicio_estado = $id_servicio_estado;
    }

    /**
     * @return mixed
     */
    public function getAprobado()
    {
        return $this->aprobado;
    }

    /**
     * @param mixed $aprobado
     */
    public function setAprobado($aprobado): void
    {
        $this->aprobado = $aprobado;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero): void
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

    /**
     * @param mixed $fecha_creacion
     */
    public function setFechaCreacion($fecha_creacion): void
    {
        $this->fecha_creacion = $fecha_creacion;
    }

    /**
     * @return mixed
     */
    public function getFechaAlta()
    {
        return $this->fecha_alta;
    }

    /**
     * @param mixed $fecha_alta
     */
    public function setFechaAlta($fecha_alta): void
    {
        $this->fecha_alta = $fecha_alta;
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
    public function getIdContacto()
    {
        return $this->id_contacto;
    }

    /**
     * @param mixed $id_contacto
     */
    public function setIdContacto($id_contacto): void
    {
        $this->id_contacto = $id_contacto;
    }

    /**
     * @return mixed
     */
    public function getContactoTexto()
    {
        return $this->contacto_texto;
    }

    /**
     * @param mixed $contacto_texto
     */
    public function setContactoTexto($contacto_texto): void
    {
        $this->contacto_texto = $contacto_texto;
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
    public function getDificultad()
    {
        return $this->dificultad;
    }

    /**
     * @param mixed $dificultad
     */
    public function setDificultad($dificultad): void
    {
        $this->dificultad = $dificultad;
    }

    /**
     * @return mixed
     */
    public function getComunicacionCliente()
    {
        return $this->comunicacion_cliente;
    }

    /**
     * @param mixed $comunicacion_cliente
     */
    public function setComunicacionCliente($comunicacion_cliente): void
    {
        $this->comunicacion_cliente = $comunicacion_cliente;
    }

    /**
     * @return mixed
     */
    public function getComunicacionClienteNotas()
    {
        return $this->comunicacion_cliente_notas;
    }

    /**
     * @param mixed $comunicacion_cliente_notas
     */
    public function setComunicacionClienteNotas($comunicacion_cliente_notas): void
    {
        $this->comunicacion_cliente_notas = $comunicacion_cliente_notas;
    }

    /**
     * @return mixed
     */
    public function getComunicacionPersonal()
    {
        return $this->comunicacion_personal;
    }

    /**
     * @param mixed $comunicacion_personal
     */
    public function setComunicacionPersonal($comunicacion_personal): void
    {
        $this->comunicacion_personal = $comunicacion_personal;
    }

    /**
     * @return mixed
     */
    public function getComunicacionPersonalNotas()
    {
        return $this->comunicacion_personal_notas;
    }

    /**
     * @param mixed $comunicacion_personal_notas
     */
    public function setComunicacionPersonalNotas($comunicacion_personal_notas): void
    {
        $this->comunicacion_personal_notas = $comunicacion_personal_notas;
    }

    /**
     * @return mixed
     */
    public function getPagoRevisado()
    {
        return $this->pago_revisado;
    }

    /**
     * @param mixed $pago_revisado
     */
    public function setPagoRevisado($pago_revisado): void
    {
        $this->pago_revisado = $pago_revisado;
    }

    /**
     * @return mixed
     */
    public function getCastingCliente()
    {
        return $this->casting_cliente;
    }

    /**
     * @param mixed $casting_cliente
     */
    public function setCastingCliente($casting_cliente): void
    {
        $this->casting_cliente = $casting_cliente;
    }

    /**
     * @return mixed
     */
    public function getVisibleCliente()
    {
        return $this->visible_cliente;
    }

    /**
     * @param mixed $visible_cliente
     */
    public function setVisibleCliente($visible_cliente): void
    {
        $this->visible_cliente = $visible_cliente;
    }

    /**
     * @return mixed
     */
    public function getRazon()
    {
        return $this->razon;
    }

    /**
     * @param mixed $razon
     */
    public function setRazon($razon): void
    {
        $this->razon = $razon;
    }

    /**
     * @return mixed
     */
    public function getMotivoAnulacion()
    {
        return $this->motivo_anulacion;
    }

    /**
     * @param mixed $motivo_anulacion
     */
    public function setMotivoAnulacion($motivo_anulacion): void
    {
        $this->motivo_anulacion = $motivo_anulacion;
    }

    /**
     * @return mixed
     */
    public function getIdServicioWoCategoria()
    {
        return $this->id_servicio_wo_categoria;
    }

    /**
     * @param mixed $id_servicio_wo_categoria
     */
    public function setIdServicioWoCategoria($id_servicio_wo_categoria): void
    {
        $this->id_servicio_wo_categoria = $id_servicio_wo_categoria;
    }

    /**
     * @return mixed
     */
    public function getEvaluado()
    {
        return $this->evaluado;
    }

    /**
     * @param mixed $evaluado
     */
    public function setEvaluado($evaluado): void
    {
        $this->evaluado = $evaluado;
    }

    /**
     * @return mixed
     */
    public function getDocumentaciones()
    {
        return $this->documentaciones;
    }

    /**
     * @param mixed $documentaciones
     */
    public function setDocumentaciones($documentaciones): void
    {
        $this->documentaciones = $documentaciones;
    }

    /**
     * @return mixed
     */
    public function getIdAcreditacionProceso()
    {
        return $this->id_acreditacion_proceso;
    }

    /**
     * @param mixed $id_acreditacion_proceso
     */
    public function setIdAcreditacionProceso($id_acreditacion_proceso): void
    {
        $this->id_acreditacion_proceso = $id_acreditacion_proceso;
    }

    /**
     * @return mixed
     */
    public function getUrgente()
    {
        return $this->urgente;
    }

    /**
     * @param mixed $urgente
     */
    public function setUrgente($urgente): void
    {
        $this->urgente = $urgente;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * @param mixed $fecha_inicio
     */
    public function setFechaInicio($fecha_inicio): void
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    /**
     * @return mixed
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * @param mixed $fecha_fin
     */
    public function setFechaFin($fecha_fin): void
    {
        $this->fecha_fin = $fecha_fin;
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

    /**
     * @return mixed
     */
    public function getCierreIniciado()
    {
        return $this->cierre_iniciado;
    }

    /**
     * @param mixed $cierre_iniciado
     */
    public function setCierreIniciado($cierre_iniciado): void
    {
        $this->cierre_iniciado = $cierre_iniciado;
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
    public function getPortalEmpleado()
    {
        return $this->portal_empleado;
    }

    /**
     * @param mixed $portal_empleado
     */
    public function setPortalEmpleado($portal_empleado): void
    {
        $this->portal_empleado = $portal_empleado;
    }

    /**
     * @return mixed
     */
    public function getCheckin()
    {
        return $this->checkin;
    }

    /**
     * @param mixed $checkin
     */
    public function setCheckin($checkin): void
    {
        $this->checkin = $checkin;
    }

    /**
     * @return mixed
     */
    public function getIdUsuarioCierre()
    {
        return $this->id_usuario_cierre;
    }

    /**
     * @param mixed $id_usuario_cierre
     */
    public function setIdUsuarioCierre($id_usuario_cierre): void
    {
        $this->id_usuario_cierre = $id_usuario_cierre;
    }

    /**
     * @return mixed
     */
    public function getFechaCierre()
    {
        return $this->fecha_cierre;
    }

    /**
     * @param mixed $fecha_cierre
     */
    public function setFechaCierre($fecha_cierre): void
    {
        $this->fecha_cierre = $fecha_cierre;
    }

    /**
     * @return mixed
     */
    public function getTempTotal()
    {
        return $this->temp_total;
    }

    /**
     * @param mixed $temp_total
     */
    public function setTempTotal($temp_total): void
    {
        $this->temp_total = $temp_total;
    }

    /**
     * @return mixed
     */
    public function getTempIdUnidadOrganizativa()
    {
        return $this->temp_id_unidad_organizativa;
    }

    /**
     * @param mixed $temp_id_unidad_organizativa
     */
    public function setTempIdUnidadOrganizativa($temp_id_unidad_organizativa): void
    {
        $this->temp_id_unidad_organizativa = $temp_id_unidad_organizativa;
    }

    /**
     * @return mixed
     */
    public function getTempIdEmpresaFacturacion()
    {
        return $this->temp_id_empresa_facturacion;
    }

    /**
     * @param mixed $temp_id_empresa_facturacion
     */
    public function setTempIdEmpresaFacturacion($temp_id_empresa_facturacion): void
    {
        $this->temp_id_empresa_facturacion = $temp_id_empresa_facturacion;
    }

    /**
     * @return mixed
     */
    public function getTempIncidenciaTexto()
    {
        return $this->temp_incidencia_texto;
    }

    /**
     * @param mixed $temp_incidencia_texto
     */
    public function setTempIncidenciaTexto($temp_incidencia_texto): void
    {
        $this->temp_incidencia_texto = $temp_incidencia_texto;
    }


}
