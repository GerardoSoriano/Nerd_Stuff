<?php
/**
 *
 */
class Compra
{
  private $idCompra;
  private $fechaCompra;
  private $idUsuario;

  function __construct()
  {
    $idCompra = 0;
    $fechaCompra = '';
    $idUsuario = 0;
  }

  function getIdCompra(){ return $this->idCompra; }
  function setIdCompra($idCompra){ $this->idCompra = $idCompra; }

  function getFechaCompra(){ return $this->fechaCompra; }
  function setFechaCompra($fechaCompra){ $this->fechaCompra = $fechaCompra; }

  function getIdUsuario(){ return $this->idUsuario; }
  function setIdUsuario($idUsuario){ $this->idUsuario = $idUsuario; }
}

 ?>
