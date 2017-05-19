<?php
include_once('connection.php');
include_once(dirname(__DIR__).'/model/producto.php');

class ProductoMetodos
{

  function __construct(){}

  function ProductosPorCategoria($producto){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare("call productosCategoria(?)");
      $idCategoria = $producto->getIdCategoria();
      $stm->bindParam(1,$idCategoria);
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
  function MostrarUnProducto($producto){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare("call mostrarProducto(?)");
      $idCategoria = $producto->getIdCategoria();
      $stm->bindParam(1,$idCategoria);
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
}

 ?>
