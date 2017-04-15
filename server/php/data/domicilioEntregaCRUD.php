<?php
include_once('connection.php');
include_once(dirname(__DIR__).'/model/domicilioEntrega.php');

class DomicilioEntregaMetodos
{

  function __construct(){}

  function AgregarDomicilio($domicilioEntrega){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare('call agregarDomicilio(?,?,?,?,?,?,?,?,?)');
      $stm->bindParam(1,$domicilioEntrega->getTituloDomicilio());
      $stm->bindParam(2,$domicilioEntrega->getCalle());
      $stm->bindParam(3,$domicilioEntrega->getNumeroDomicilio());
      $stm->bindParam(4,$domicilioEntrega->getColonia());
      $stm->bindParam(5,$domicilioEntrega->getCiudad());
      $stm->bindParam(6,$domicilioEntrega->getEstado());
      $stm->bindParam(7,$domicilioEntrega->getCodigoPostal());
      $stm->bindParam(8,$domicilioEntrega->getPais());
      $stm->bindParam(9,$domicilioEntrega->getIdUsuario());
      $result = $stm->execute();
      return $result;
    } catch (PDOException $e) {
      die($e->getMessage());
    } finally {
      $conn = null;
      $pdo->closeConnection();
    }
  }
  function MostrarDomicilios($domicilioEntrega){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare("call MostrarDomicilios(?)");
      $stm->bindParam(1,$domicilioEntrega->getIdUsuario());
      $stm->execute();
      $result = $stm->fetchAll();
      return json_encode($result);
    } catch (PDOException $e) {
      die($e->getMessage());
    } finally {
      $conn = null;
      $pdo->closeConnection();
    }
  }
  function ObtenerUnDomicilio($domicilioEntrega){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare("call obtenerDomicilio(?,?)");
      $stm->bindParam(1,$domicilioEntrega->getIdDomicilio());
      $stm->bindParam(2,$domicilioEntrega->getIdUsuario());
      $stm->execute();
      $result = $stm->fetchAll();
      return json_encode($result);
    } catch (PDOException $e) {
      die($e->getMessage());
    } finally {
      $conn = null;
      $pdo->closeConnection();
    }
  }
  function ModificarDomicilio($domicilioEntrega){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare('call modificarDomicilio(?,?,?,?,?,?,?,?,?,?)');
      $stm->bindParam(1,$domicilioEntrega->getIdDomicilio());
      $stm->bindParam(2,$domicilioEntrega->getTituloDomicilio());
      $stm->bindParam(3,$domicilioEntrega->getCalle());
      $stm->bindParam(4,$domicilioEntrega->getNumeroDomicilio());
      $stm->bindParam(5,$domicilioEntrega->getColonia());
      $stm->bindParam(6,$domicilioEntrega->getCiudad());
      $stm->bindParam(7,$domicilioEntrega->getEstado());
      $stm->bindParam(8,$domicilioEntrega->getCodigoPostal());
      $stm->bindParam(9,$domicilioEntrega->getPais());
      $stm->bindParam(10,$domicilioEntrega->getIdUsuario());
      $result = $stm->execute();
      return $result;
    } catch (PDOException $e) {
      die($e->getMessage());
    } finally {
      $conn = null;
      $pdo->closeConnection();
    }
  }
}

 ?>
