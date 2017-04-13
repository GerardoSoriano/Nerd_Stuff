<?php
/**
 *
 */
class Categoria
{
  private $idCategoria;
  private $nombreCategoria;

  function __construct()
  {
    $idCategoria = 0;
    $nombreCategoria = '';
  }

  function getIdCategoria(){ return $this->idCategoria; }
  function setIdCategoria($idCategoria){ $this->idCategoria = $idCategoria; }

  function getNombreCategoria(){ return $this->nombreCategoria; }
  function setNombreCategoria($nombreCategoria){ $this->nombreCategoria = $nombreCategoria; }
}

 ?>
