<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmpresaRepository")
 */
class Empresa
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
    private $id_usuario_alta;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_usuario_edicion;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_empresa_tipo;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_empresa_tipo_2017;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_usuario_tipo;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_usuario_tipo_2017;
    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_alta;
    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_edicion;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_empresa_segmentacion_empleado;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_empresa_segmentacion_ingreso;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_empresa_sector_grupo;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_empresa_fuente;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_empresa_clasificacion;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_empresa_clasificacion_2017;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_empresa_relacionada;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_empresa_cumplimiento;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_empresa_status;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_dg;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_empresa_captado;
    /**
     * @ORM\Column(type="text")
     */
    private $sector_otro;
    /**
     * @ORM\Column(type="decimal")
     */
    private $volumen;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_idioma;
    /**
     * @ORM\Column(type="text")
     */
    private $nombre;
    /**
     * @ORM\Column(type="text")
     */
    private $nombre_fiscal;
    /**
     * @ORM\Column(type="text")
     */
    private $NIF;
    /**
     * @ORM\Column(type="integer")
     */
    private $cliente;
    /**
     * @ORM\Column(type="integer")
     */
    private $proveedor;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_empresa_estado;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_empresa_calificacion;
    /**
     * @ORM\Column(type="text")
     */
    private $direccion;
    /**
     * @ORM\Column(type="text")
     */
    private $direccion_envio;
    /**
     * @ORM\Column(type="text")
     */
    private $cp;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_pais;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_provincia;
    /**
     * @ORM\Column(type="text")
     */
    private $provincia;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_poblacion;
    /**
     * @ORM\Column(type="text")
     */
    private $poblacion;
    /**
     * @ORM\Column(type="text")
     */
    private $tlf;
    /**
     * @ORM\Column(type="text")
     */
    private $tlf2;
    /**
     * @ORM\Column(type="text")
     */
    private $observaciones;
    /**
     * @ORM\Column(type="text")
     */
    private $observaciones_alta;
    /**
     * @ORM\Column(type="text")
     */
    private $web;
    /**
     * @ORM\Column(type="text")
     */
    private $actividad;
    /**
     * @ORM\Column(type="text")
     */
    private $forma_pago;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_sociedad;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_cuenta_corriente;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_forma_pago;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_forma_pago_periodo;
    /**
     * @ORM\Column(type="text")
     */
    private $paypal;
    /**
     * @ORM\Column(type="text")
     */
    private $info_recibo;
    /**
     * @ORM\Column(type="text")
     */
    private $dia_pago;
    /**
     * @ORM\Column(type="integer")
     */
    private $id_iva;

    /**
     * @ORM\Column(type="text")
     */
    private $cumplimiento;
    /**
     * @ORM\Column(type="integer")
     */
    private $primera_colaboracion;
    /**
     * @ORM\Column(type="text")
     */
    private $primera_colaboracion_temp;

    /**
     * @ORM\Column(type="integer")
     */
    private $anyo_facturado;
    /**
     * @ORM\Column(type="boolean")
     */
    private $store;
    /**
     * @ORM\Column(type="string")
     */
    private $store_codigo;
    /**
     * @ORM\Column(type="boolean")
     */
    private $aplicacion_cliente;
    /**
     * @ORM\Column(type="integer")
     */
    private $codigo_factusol;
    /**
     * @ORM\Column(type="boolean")
     */
    private $actualizar;
    /**
     * @ORM\Column(type="integer")
     */
    private $actualizar_estado;
    /**
     * @ORM\Column(type="text")
     */
    private $actualizar_notas;
    /**
     * @ORM\Column(type="boolean")
     */
    private $tarifa_especifica;
    /**
     * @ORM\Column(type="boolean")
     */
    private $media_hora;
    /**
     * @ORM\Column(type="boolean")
     */
    private $grupo_wo;
    /**
     * @ORM\Column(type="boolean")
     */
    private $grabado;

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
    public function getIdUsuarioEdicion()
    {
        return $this->id_usuario_edicion;
    }

    /**
     * @param mixed $id_usuario_edicion
     */
    public function setIdUsuarioEdicion($id_usuario_edicion): void
    {
        $this->id_usuario_edicion = $id_usuario_edicion;
    }

    /**
     * @return mixed
     */
    public function getIdUsuarioTipo()
    {
        return $this->id_usuario_tipo;
    }

    /**
     * @param mixed $id_usuario_tipo
     */
    public function setIdUsuarioTipo($id_usuario_tipo): void
    {
        $this->id_usuario_tipo = $id_usuario_tipo;
    }

    /**
     * @return mixed
     */
    public function getIdUsuarioTipo2017()
    {
        return $this->id_usuario_tipo_2017;
    }

    /**
     * @param mixed $id_usuario_tipo_2017
     */
    public function setIdUsuarioTipo2017($id_usuario_tipo_2017): void
    {
        $this->id_usuario_tipo_2017 = $id_usuario_tipo_2017;
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
    public function getIdEmpresaSegmentacionEmpleado()
    {
        return $this->id_empresa_segmentacion_empleado;
    }

    /**
     * @param mixed $id_empresa_segmentacion_empleado
     */
    public function setIdEmpresaSegmentacionEmpleado($id_empresa_segmentacion_empleado): void
    {
        $this->id_empresa_segmentacion_empleado = $id_empresa_segmentacion_empleado;
    }

    /**
     * @return mixed
     */
    public function getIdEmpresaSegmentacionIngreso()
    {
        return $this->id_empresa_segmentacion_ingreso;
    }

    /**
     * @param mixed $id_empresa_segmentacion_ingreso
     */
    public function setIdEmpresaSegmentacionIngreso($id_empresa_segmentacion_ingreso): void
    {
        $this->id_empresa_segmentacion_ingreso = $id_empresa_segmentacion_ingreso;
    }

    /**
     * @return mixed
     */
    public function getIdEmpresaSectorGrupo()
    {
        return $this->id_empresa_sector_grupo;
    }

    /**
     * @param mixed $id_empresa_sector_grupo
     */
    public function setIdEmpresaSectorGrupo($id_empresa_sector_grupo): void
    {
        $this->id_empresa_sector_grupo = $id_empresa_sector_grupo;
    }

    /**
     * @return mixed
     */
    public function getIdEmpresaFuente()
    {
        return $this->id_empresa_fuente;
    }

    /**
     * @param mixed $id_empresa_fuente
     */
    public function setIdEmpresaFuente($id_empresa_fuente): void
    {
        $this->id_empresa_fuente = $id_empresa_fuente;
    }

    /**
     * @return mixed
     */
    public function getIdEmpresaClasificacion()
    {
        return $this->id_empresa_clasificacion;
    }

    /**
     * @param mixed $id_empresa_clasificacion
     */
    public function setIdEmpresaClasificacion($id_empresa_clasificacion): void
    {
        $this->id_empresa_clasificacion = $id_empresa_clasificacion;
    }

    /**
     * @return mixed
     */
    public function getIdEmpresaRelacionada()
    {
        return $this->id_empresa_relacionada;
    }

    /**
     * @param mixed $id_empresa_relacionada
     */
    public function setIdEmpresaRelacionada($id_empresa_relacionada): void
    {
        $this->id_empresa_relacionada = $id_empresa_relacionada;
    }

    /**
     * @return mixed
     */
    public function getIdEmpresaCumplimiento()
    {
        return $this->id_empresa_cumplimiento;
    }

    /**
     * @param mixed $id_empresa_cumplimiento
     */
    public function setIdEmpresaCumplimiento($id_empresa_cumplimiento): void
    {
        $this->id_empresa_cumplimiento = $id_empresa_cumplimiento;
    }

    /**
     * @return mixed
     */
    public function getIdEmpresaStatus()
    {
        return $this->id_empresa_status;
    }

    /**
     * @param mixed $id_empresa_status
     */
    public function setIdEmpresaStatus($id_empresa_status): void
    {
        $this->id_empresa_status = $id_empresa_status;
    }

    /**
     * @return mixed
     */
    public function getIdDg()
    {
        return $this->id_dg;
    }

    /**
     * @param mixed $id_dg
     */
    public function setIdDg($id_dg): void
    {
        $this->id_dg = $id_dg;
    }

    /**
     * @return mixed
     */
    public function getIdEmpresaCaptado()
    {
        return $this->id_empresa_captado;
    }

    /**
     * @param mixed $id_empresa_captado
     */
    public function setIdEmpresaCaptado($id_empresa_captado): void
    {
        $this->id_empresa_captado = $id_empresa_captado;
    }

    /**
     * @return mixed
     */
    public function getSectorOtro()
    {
        return $this->sector_otro;
    }

    /**
     * @param mixed $sector_otro
     */
    public function setSectorOtro($sector_otro): void
    {
        $this->sector_otro = $sector_otro;
    }

    /**
     * @return mixed
     */
    public function getVolumen()
    {
        return $this->volumen;
    }

    /**
     * @param mixed $volumen
     */
    public function setVolumen($volumen): void
    {
        $this->volumen = $volumen;
    }

    /**
     * @return mixed
     */
    public function getIdIdioma()
    {
        return $this->id_idioma;
    }

    /**
     * @param mixed $id_idioma
     */
    public function setIdIdioma($id_idioma): void
    {
        $this->id_idioma = $id_idioma;
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
    public function getNombreFiscal()
    {
        return $this->nombre_fiscal;
    }

    /**
     * @param mixed $nombre_fiscal
     */
    public function setNombreFiscal($nombre_fiscal): void
    {
        $this->nombre_fiscal = $nombre_fiscal;
    }

    /**
     * @return mixed
     */
    public function getNIF()
    {
        return $this->NIF;
    }

    /**
     * @param mixed $NIF
     */
    public function setNIF($NIF): void
    {
        $this->NIF = $NIF;
    }

    /**
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $cliente
     */
    public function setCliente($cliente): void
    {
        $this->cliente = $cliente;
    }

    /**
     * @return mixed
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }

    /**
     * @param mixed $proveedor
     */
    public function setProveedor($proveedor): void
    {
        $this->proveedor = $proveedor;
    }

    /**
     * @return mixed
     */
    public function getIdEmpresaEstado()
    {
        return $this->id_empresa_estado;
    }

    /**
     * @param mixed $id_empresa_estado
     */
    public function setIdEmpresaEstado($id_empresa_estado): void
    {
        $this->id_empresa_estado = $id_empresa_estado;
    }

    /**
     * @return mixed
     */
    public function getIdEmpresaCalificacion()
    {
        return $this->id_empresa_calificacion;
    }

    /**
     * @param mixed $id_empresa_calificacion
     */
    public function setIdEmpresaCalificacion($id_empresa_calificacion): void
    {
        $this->id_empresa_calificacion = $id_empresa_calificacion;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion): void
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getDireccionEnvio()
    {
        return $this->direccion_envio;
    }

    /**
     * @param mixed $direccion_envio
     */
    public function setDireccionEnvio($direccion_envio): void
    {
        $this->direccion_envio = $direccion_envio;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp): void
    {
        $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getIdPais()
    {
        return $this->id_pais;
    }

    /**
     * @param mixed $id_pais
     */
    public function setIdPais($id_pais): void
    {
        $this->id_pais = $id_pais;
    }

    /**
     * @return mixed
     */
    public function getIdProvincia()
    {
        return $this->id_provincia;
    }

    /**
     * @param mixed $id_provincia
     */
    public function setIdProvincia($id_provincia): void
    {
        $this->id_provincia = $id_provincia;
    }

    /**
     * @return mixed
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @param mixed $provincia
     */
    public function setProvincia($provincia): void
    {
        $this->provincia = $provincia;
    }

    /**
     * @return mixed
     */
    public function getIdPoblacion()
    {
        return $this->id_poblacion;
    }

    /**
     * @param mixed $id_poblacion
     */
    public function setIdPoblacion($id_poblacion): void
    {
        $this->id_poblacion = $id_poblacion;
    }

    /**
     * @return mixed
     */
    public function getPoblacion()
    {
        return $this->poblacion;
    }

    /**
     * @param mixed $poblacion
     */
    public function setPoblacion($poblacion): void
    {
        $this->poblacion = $poblacion;
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
    public function getTlf2()
    {
        return $this->tlf2;
    }

    /**
     * @param mixed $tlf2
     */
    public function setTlf2($tlf2): void
    {
        $this->tlf2 = $tlf2;
    }

    /**
     * @return mixed
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * @param mixed $observaciones
     */
    public function setObservaciones($observaciones): void
    {
        $this->observaciones = $observaciones;
    }

    /**
     * @return mixed
     */
    public function getObservacionesAlta()
    {
        return $this->observaciones_alta;
    }

    /**
     * @param mixed $observaciones_alta
     */
    public function setObservacionesAlta($observaciones_alta): void
    {
        $this->observaciones_alta = $observaciones_alta;
    }

    /**
     * @return mixed
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * @param mixed $web
     */
    public function setWeb($web): void
    {
        $this->web = $web;
    }

    /**
     * @return mixed
     */
    public function getActividad()
    {
        return $this->actividad;
    }

    /**
     * @param mixed $actividad
     */
    public function setActividad($actividad): void
    {
        $this->actividad = $actividad;
    }

    /**
     * @return mixed
     */
    public function getFormaPago()
    {
        return $this->forma_pago;
    }

    /**
     * @param mixed $forma_pago
     */
    public function setFormaPago($forma_pago): void
    {
        $this->forma_pago = $forma_pago;
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
    public function getIdCuentaCorriente()
    {
        return $this->id_cuenta_corriente;
    }

    /**
     * @param mixed $id_cuenta_corriente
     */
    public function setIdCuentaCorriente($id_cuenta_corriente): void
    {
        $this->id_cuenta_corriente = $id_cuenta_corriente;
    }

    /**
     * @return mixed
     */
    public function getIdFormaPago()
    {
        return $this->id_forma_pago;
    }

    /**
     * @param mixed $id_forma_pago
     */
    public function setIdFormaPago($id_forma_pago): void
    {
        $this->id_forma_pago = $id_forma_pago;
    }

    /**
     * @return mixed
     */
    public function getIdFormaPagoPeriodo()
    {
        return $this->id_forma_pago_periodo;
    }

    /**
     * @param mixed $id_forma_pago_periodo
     */
    public function setIdFormaPagoPeriodo($id_forma_pago_periodo): void
    {
        $this->id_forma_pago_periodo = $id_forma_pago_periodo;
    }

    /**
     * @return mixed
     */
    public function getPaypal()
    {
        return $this->paypal;
    }

    /**
     * @param mixed $paypal
     */
    public function setPaypal($paypal): void
    {
        $this->paypal = $paypal;
    }

    /**
     * @return mixed
     */
    public function getInfoRecibo()
    {
        return $this->info_recibo;
    }

    /**
     * @param mixed $info_recibo
     */
    public function setInfoRecibo($info_recibo): void
    {
        $this->info_recibo = $info_recibo;
    }

    /**
     * @return mixed
     */
    public function getDiaPago()
    {
        return $this->dia_pago;
    }

    /**
     * @param mixed $dia_pago
     */
    public function setDiaPago($dia_pago): void
    {
        $this->dia_pago = $dia_pago;
    }

    /**
     * @return mixed
     */
    public function getIdIva()
    {
        return $this->id_iva;
    }

    /**
     * @param mixed $id_iva
     */
    public function setIdIva($id_iva): void
    {
        $this->id_iva = $id_iva;
    }

    /**
     * @return mixed
     */
    public function getCumplimiento()
    {
        return $this->cumplimiento;
    }

    /**
     * @param mixed $cumplimiento
     */
    public function setCumplimiento($cumplimiento): void
    {
        $this->cumplimiento = $cumplimiento;
    }

    /**
     * @return mixed
     */
    public function getPrimeraColaboracion()
    {
        return $this->primera_colaboracion;
    }

    /**
     * @param mixed $primera_colaboracion
     */
    public function setPrimeraColaboracion($primera_colaboracion): void
    {
        $this->primera_colaboracion = $primera_colaboracion;
    }

    /**
     * @return mixed
     */
    public function getPrimeraColaboracionTemp()
    {
        return $this->primera_colaboracion_temp;
    }

    /**
     * @param mixed $primera_colaboracion_temp
     */
    public function setPrimeraColaboracionTemp($primera_colaboracion_temp): void
    {
        $this->primera_colaboracion_temp = $primera_colaboracion_temp;
    }

    /**
     * @return mixed
     */
    public function getAnyoFacturado()
    {
        return $this->anyo_facturado;
    }

    /**
     * @param mixed $anyo_facturado
     */
    public function setAnyoFacturado($anyo_facturado): void
    {
        $this->anyo_facturado = $anyo_facturado;
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
    public function getStoreCodigo()
    {
        return $this->store_codigo;
    }

    /**
     * @param mixed $store_codigo
     */
    public function setStoreCodigo($store_codigo): void
    {
        $this->store_codigo = $store_codigo;
    }

    /**
     * @return mixed
     */
    public function getAplicacionCliente()
    {
        return $this->aplicacion_cliente;
    }

    /**
     * @param mixed $aplicacion_cliente
     */
    public function setAplicacionCliente($aplicacion_cliente): void
    {
        $this->aplicacion_cliente = $aplicacion_cliente;
    }

    /**
     * @return mixed
     */
    public function getCodigoFactusol()
    {
        return $this->codigo_factusol;
    }

    /**
     * @param mixed $codigo_factusol
     */
    public function setCodigoFactusol($codigo_factusol): void
    {
        $this->codigo_factusol = $codigo_factusol;
    }

    /**
     * @return mixed
     */
    public function getActualizar()
    {
        return $this->actualizar;
    }

    /**
     * @param mixed $actualizar
     */
    public function setActualizar($actualizar): void
    {
        $this->actualizar = $actualizar;
    }

    /**
     * @return mixed
     */
    public function getActualizarEstado()
    {
        return $this->actualizar_estado;
    }

    /**
     * @param mixed $actualizar_estado
     */
    public function setActualizarEstado($actualizar_estado): void
    {
        $this->actualizar_estado = $actualizar_estado;
    }

    /**
     * @return mixed
     */
    public function getActualizarNotas()
    {
        return $this->actualizar_notas;
    }

    /**
     * @param mixed $actualizar_notas
     */
    public function setActualizarNotas($actualizar_notas): void
    {
        $this->actualizar_notas = $actualizar_notas;
    }

    /**
     * @return mixed
     */
    public function getTarifaEspecifica()
    {
        return $this->tarifa_especifica;
    }

    /**
     * @param mixed $tarifa_especifica
     */
    public function setTarifaEspecifica($tarifa_especifica): void
    {
        $this->tarifa_especifica = $tarifa_especifica;
    }

    /**
     * @return mixed
     */
    public function getMediaHora()
    {
        return $this->media_hora;
    }

    /**
     * @param mixed $media_hora
     */
    public function setMediaHora($media_hora): void
    {
        $this->media_hora = $media_hora;
    }

    /**
     * @return mixed
     */
    public function getGrupoWo()
    {
        return $this->grupo_wo;
    }

    /**
     * @param mixed $grupo_wo
     */
    public function setGrupoWo($grupo_wo): void
    {
        $this->grupo_wo = $grupo_wo;
    }

    /**
     * @return mixed
     */
    public function getGrabado()
    {
        return $this->grabado;
    }

    /**
     * @param mixed $grabado
     */
    public function setGrabado($grabado): void
    {
        $this->grabado = $grabado;
    }

    /**
     * @return mixed
     */
    public function getIdEmpresaTipo()
    {
        return $this->id_empresa_tipo;
    }

    /**
     * @param mixed $id_empresa_tipo
     */
    public function setIdEmpresaTipo($id_empresa_tipo): void
    {
        $this->id_empresa_tipo = $id_empresa_tipo;
    }

    /**
     * @return mixed
     */
    public function getIdEmpresaTipo2017()
    {
        return $this->id_empresa_tipo_2017;
    }

    /**
     * @param mixed $id_empresa_tipo_2017
     */
    public function setIdEmpresaTipo2017($id_empresa_tipo_2017): void
    {
        $this->id_empresa_tipo_2017 = $id_empresa_tipo_2017;
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
    public function getIdEmpresaClasificacion2017()
    {
        return $this->id_empresa_clasificacion_2017;
    }

    /**
     * @param mixed $id_empresa_clasificacion_2017
     */
    public function setIdEmpresaClasificacion2017($id_empresa_clasificacion_2017): void
    {
        $this->id_empresa_clasificacion_2017 = $id_empresa_clasificacion_2017;
    }


}
