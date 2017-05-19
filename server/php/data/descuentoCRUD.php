<?php
include_once('connection.php');
include_once(dirname(__DIR__).'/model/descuento.php');

class DescuentoMetodos
{

  function __construct(){}

  function ObtenerOfertas(){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare("call ofertas()");
      $stm->execute();
      $result = $stm->fetchAll();
      return $result;
    } catch (PDOException $e) {
      die($e->getMessage());
    } finally {
      $conn = null;
      $pdo->closeConnection();
    }
  }
  function DescontarUnProducto($descuento){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare("call descontarProducto(?,?)");
      $stm->bindParam(1,$descuento->getFechaInicio());
      $stm->bindParam(2,$descuento->getIdProducto());
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
}

 ?>
