<?php
include_once('connection.php');
include_once(dirname(__DIR__).'/model/usuario.php');

class UsuarioMetodos
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
  function ObtenerDatosPersonales($usuario){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare("call datosPersonales(?)");
      $stm->bindParam(1,$usuario->getNombreUsuario());
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
  function ModificarDatosPersonales($usuario){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare("call modificarDatosPersonales(?,?,?,?,?,?,?,?,?,?,?)");
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
  function ModificarContrasena($usuario,$contrasenaNueva){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare("call modificarContrasena(?,?,?)");
      $stm->bindParam(1,$usuario->getNombreUsuario());
      $stm->bindParam(2,$usuario->getContrasena());
      $stm->bindParam(3,$contrasenaNueva);
      $result = $stm->execute();
      return $result;
    } catch (PDOException $e) {
      die($e->getMessage());
    } finally {
      $conn = null;
      $pdo->closeConnection();
    }
  }
  function ObtenerMisInvitados($usuario){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare("call misInvitados(?)");
      $stm->bindParam(1,$usuario->getIdUsuario());
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
  function CambiarFormaDePago($usuario){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare("call cambiarFormaPago(?,?)");
      $stm->bindParam(1,$usuario->getNombreUsuario());
      $stm->bindParam(2,$usuario->getFormaPago());
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
