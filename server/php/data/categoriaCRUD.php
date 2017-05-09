<?php
include_once('connection.php');
include_once(dirname(__DIR__).'/model/categoria.php');

class CategoriaMetodos
{

  function __construct(){}

  function ObtenerCategorias(){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare("call categorias()");
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
