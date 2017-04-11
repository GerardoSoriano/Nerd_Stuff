<?php 
/**
 *
 */
class ProductoCompra
{
  private $idCompra;
  private $idProducto;

  function __construct()
  {
    $idCompra = 0;
    $idProducto = 0;
  }

  function getIdCompra(){ return $this->idCompra; }
  function setIdCompra($idCompra){ $this->idCompra = $idCompra; }

  function getIdProducto(){ return $this->idProducto; }
  function setIdProducto($idProducto){ $this->idProducto = $idProducto; }
}

 ?>
