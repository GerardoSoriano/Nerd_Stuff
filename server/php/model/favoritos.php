<?php
/**
 *
 */
class Favoritos
{
  private $idUsuario;
  private $idProducto;

  function __construct()
  {
    $idUsuario = 0;
    $idProducto = 0;
  }

  function getIdUsuario(){ return $this->idUsuario; }
  function setIdUsuario($idUsuario){ $this->idUsuario = $idUsuario; }

  function getIdProducto(){ return $this->idProducto; }
  function setIdProducto($idProducto){ $this->idProducto = $idProducto; }
}

 ?>
