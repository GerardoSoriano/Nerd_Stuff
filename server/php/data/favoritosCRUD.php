<?php
include_once('connection.php');
include_once(dirname(__DIR__).'/model/favoritos.php');

class FavoritosMetodos
{

  function __construct(){}

  function MostrarFavoritos($favoritos){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare("call mostrarFavoritos(?)");
      $stm->bindParam(1,$favoritos->getIdUsuario());
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
