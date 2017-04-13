<?php
/**
 *
 */
class Producto
{
  private $idProducto;
  private $nombreProducto;
  private $costo;
  private $puntaje;
  private $descripcion;
  private $idCategoria;
  private $direccionFoto;

  function __construct()
  {
    $idProducto = 0;
    $nombreProducto = '';
    $costo = 0;
    $puntaje = 0;
    $descripcion = '';
    $idCategoria = 0;
    $direccionFoto = '';
  }

  function getIdProducto(){ return $this->idProducto; }
  function setIdProducto($idProducto){ $this->idProducto = $idProducto;}

  function getNombreProducto(){ return $this->nombreProducto; }
  function setNombreProducto($nombreProducto){ $this->nombreProducto = $nombreProducto;}

  function getCosto(){ return $this->costo; }
  function setCosto($costo){ $this->costo = $costo;}

  function getPuntaje(){ return $this->puntaje; }
  function setPuntaje($puntaje){ $this->puntaje = $puntaje;}

  function getDescripcion(){ return $this->descripcion; }
  function setDescripcion($descripcion){ $this->descripcion = $descripcion;}

  function getIdCategoria(){ return $this->idCategoria; }
  function setIdCategoria($idCategoria){ $this->idCategoria = $idCategoria;}

  function getDireccionFoto(){ return $this->direccionFoto; }
  function setDireccionFoto($direccionFoto){ $this->direccionFoto = $direccionFoto;}
}

 ?>
