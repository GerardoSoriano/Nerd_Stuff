<?php
/**
 *
 */
class Descuento
{
  private $idDescuento;
  private $fechaInicio;
  private $fechaFinal;
  private $porcentajeDescuento;
  private $idProducto;

  function __construct()
  {
    $idDescuento = 0;
    $fechaInicio = '';
    $fechaFinal = '';
    $porcentajeDescuento = 0;
    $idProducto = 0;
  }

  function getIdDescuento(){ return $this->IdDescuento; }
  function setIdDescuento($idDescuento){ $this->idDescuento = $idDescuento;}

  function getFechaInicio(){ return $this->fechaInicio; }
  function setFechaInicio($fechaInicio){ $this->fechaInicio = $fechaInicio;}

  function getFechaFinal(){ return $this->fechaFinal; }
  function setFechaFinal($fechaFinal){ $this->fechaFinal = $fechaFinal;}

  function getPorcentajeDescuento(){ return $this->porcentajeDescuento; }
  function setPorcentajeDescuento($porcentajeDescuento){ $this->porcentajeDescuento = $porcentajeDescuento;}

  function getIdProducto(){ return $this->idProducto; }
  function setIdProducto($idProducto){ $this->idProducto = $idProducto;}
}

 ?>
