<?php
include_once('connection.php');
include_once(dirname(__DIR__).'/model/compra.php');

class CompraMetodos
{

  function __construct(){}

  function AgregarUnaCompra($compra){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare('call agregarCompra(?)');
      $stm->bindParam(1,$compra->getIdUsuario());
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
  function PuntosPorMes($compra){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare('call puntosMes(?)');
      $stm->bindParam(1,$compra->getIdUsuario());
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
