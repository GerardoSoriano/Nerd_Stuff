<?php
/**
 *
 */
class TarjetaCredito
{
  private $idTarjeta;
  private $tipoTarjeta;
  private $numeroTarjeta;
  private $fechaVencimiento;
  private $numeroSeguridad;
  private $idUsuario;

  function __construct(){
    $idTarjeta = 0;
    $tipoTarjeta = '';
    $numeroTarjeta = 0;
    $fechaVencimiento = '';
    $numeroSeguridad = 0;
    $idUsuario = 0;
  }

  function getIdTarjeta(){ return $this->idTarjeta; }
  function setIdTarjeta($idTarjeta){ $this->idTarjeta = $idTarjeta; }

  function getTipoTarjeta(){ return $this->tipoTarjeta; }
  function setTipoTarjeta($tipoTarjeta){ $this->tipoTarjeta = $tipoTarjeta; }

  function getNumeroTarjeta(){ return $this->numeroTarjeta; }
  function setNumeroTarjeta($numeroTarjeta){ $this->numeroTarjeta = $numeroTarjeta; }

  function getFechaVencimiento(){ return $this->fechaVencimiento; }
  function setFechaVencimiento($fechaVencimiento){ $this->fechaVencimiento = $fechaVencimiento; }

  function getNumeroSeguridad(){ return $this->numeroSeguridad; }
  function setNumeroSeguridad($numeroSeguridad){ $this->numeroSeguridad = $numeroSeguridad; }

  function getIdUsuario(){ return $this->idUsuario; }
  function setIdUsuario($idUsuario){ $this->idUsuario = $idUsuario; }

}

 ?>
