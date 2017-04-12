<?php
/**
 *
 */
class Usuario
{
  private $idUsuario;
  private $nombreUsuario;
  private $primerNombre;
  private $segundoNombre;
  private $apellidoPaterno;
  private $apellidoMaterno;
  private $email;
  private $contrasena;
  private $fechaNacimiento;
  private $genero;
  private $formaPago;
  private $fechaRegistro;
  private $idPatrocinador;

  function __construct(){
    $idUsuario = 0;
    $noPreUsuario = '';
    $primerNombre = '';
    $segundoNombre = '';
    $apellidoPaterno = '';
    $apellidoMaterno = '';
    $email = '';
    $contrasena = '';
    $fechaNacimiento = '';
    $genero = '';
    $formaPago = '';
    $fechaRegistro = '';
    $idPatrocinador = 0;
  }

  function getIdUsuario(){ return $this->idUsuario; }
  function setIdUsuario($idUsuario){ $this->idUsuario = $idUsuario; }

  function getNombreUsuario(){ return $this->nombreUsuario; }
  function setNombreUsuario($nombreUsuario){ $this->nombreUsuario = $nombreUsuario; }

  function getPrimerNombre(){ return $this->primerNombre; }
  function setPrimerNombre($primerNombre){ $this->primerNombre = $primerNombre; }

  function getSegundoNombre(){ return $this->segundoNombre; }
  function setSegundoNombre($segundoNombre){ $this->segundoNombre = $segundoNombre; }

  function getApellidoPaterno(){ return $this->apellidoPaterno; }
  function setApellidoPaterno($apellidoPaterno){ $this->apellidoPaterno = $apellidoPaterno; }

  function getApellidoMaterno(){ return $this->apellidoMaterno; }
  function setApellidoMaterno($apellidoMaterno){ $this->apellidoMaterno = $apellidoMaterno; }

  function getEmail(){ return $this->email; }
  function setEmail($email){ $this->email = $email; }

  function getContrasena(){ return $this->contrasena; }
  function setContrasena($contrasena){ $this->contrasena = $contrasena; }

  function getFechaNacimiento(){ return $this->fechaNacimiento; }
  function setFechaNacimiento($fechaNacimiento){ $this->fechaNacimiento = $fechaNacimiento; }

  function getGenero(){ return $this->genero; }
  function setGenero($genero){ $this->genero = $genero; }

  function getFormaPago(){ return $this->formaPago; }
  function setFormaPago($formaPago){ $this->formaPago = $formaPago; }

  function getFechaRegistro(){ return $this->fechaRegistro; }
  function setFechaRegistro($fechaRegistro){ $this->fechaRegistro = $fechaRegistro; }

  function getIdPatrocinador(){ return $this->idPatrocinador; }
  function setIdPatrocinador($idPatrocinador){ $this->idPatrocinador = $idPatrocinador; }
}

 ?>
