<?php
/**
 *
 */
class DomicilioEntrega
{
  private $idDomicilio;
  private $tituloDomicilio;
  private $calle;
  private $numeroDomicilio;
  private $colonia;
  private $ciudad;
  private $pais;
  private $idUsuario;

  function __construct()
  {
    $idDomicilio = 0;
    $tituloDomicilio = '';
    $calle = '';
    $numeroDomicilio = 0;
    $colonia = '';
    $ciudad = '';
    $pais = '';
    $idUsuario = 0;
  }

  function getIdDomicilio(){ return $this->idDomicilio; }
  function setIdDomicilio($idDomicilio){ $this->idDomicilio = $idDomicilio;}

  function getTituloDomicilio(){ return $this->tituloDomicilio; }
  function setTituloDomicilio($tituloDomicilio){ $this->tituloDomicilio = $tituloDomicilio;}

  function getCalle(){ return $this->calle; }
  function setCalle($calle){ $this->calle = $calle;}

  function getNumeroDomicilio(){ return $this->numeroDomicilio; }
  function setNumeroDomicilio($numeroDomicilio){ $this->numeroDomicilio = $numeroDomicilio;}

  function getColonia(){ return $this->colonia; }
  function setColonia($colonia){ $this->colonia = $colonia;}

  function getCiudad(){ return $this->ciudad; }
  function setCiudad($ciudad){ $this->ciudad = $ciudad;}

  function getPais(){ return $this->pais; }
  function setPais($pais){ $this->pais = $pais;}

  function getIdUsuario(){ return $this->idUsuario; }
  function setIdUsuario($idUsuario){ $this->idUsuario = $idUsuario;}
}

 ?>
