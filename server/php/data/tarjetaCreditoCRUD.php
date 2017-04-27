<?php
include_once('connection.php');
include_once(dirname(__DIR__).'/model/tarjetaCredito.php');

class TarjetaCreditoMetodos
{

  function __construct(){}

  function AgregarUsuario($usuario){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare("call agregarUsuario(?,?,?,?,?,?,?,?,?,?,?)");
      $stm->bindParam(1,$usuario->getNombreUsuario());
      $stm->bindParam(2,$usuario->getPrimerNombre());
      $stm->bindParam(3,$usuario->getSegundoNombre());
      $stm->bindParam(4,$usuario->getApellidoPaterno());
      $stm->bindParam(5,$usuario->getApellidoMaterno());
      $stm->bindParam(6,$usuario->getEmail());
      $stm->bindParam(7,$usuario->getContrasena());
      $stm->bindParam(8,$usuario->getFechaNacimiento());
      $stm->bindParam(9,$usuario->getGenero());
      $stm->bindParam(10,$usuario->getFormaPago());
      $stm->bindParam(11,$usuario->getIdPatrocinador());
      $result = $stm->execute();
      return $result;
    } catch (PDOException $e) {
      die($e->getMessage());
    } finally {
      $conn = null;
      $pdo->closeConnection();
    }
  }
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
