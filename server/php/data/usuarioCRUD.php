<?php
include_once('connection.php');
include_once(dirname(__DIR__).'/model/usuario.php');

class UsuarioMetodos
{

  function __construct(){}

  function LoginUsuario($usuario){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare("call login(?,?)");
      $email = $usuario->getEmail();
      $contrasena = $usuario->getContrasena();
      $stm->bindParam(1,$email);
      $stm->bindParam(2,$contrasena);
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
  function RegistrarUsuario($usuario){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare("call agregarUsuario(?,?,'',?,'',?,?,'','','',null)");
      $stm->bindParam(1,$usuario->getNombreUsuario());
      $stm->bindParam(2,$usuario->getPrimerNombre());
      $stm->bindParam(3,$usuario->getApellidoPaterno());
      $stm->bindParam(4,$usuario->getEmail());
      $stm->bindParam(5,$usuario->getContrasena());
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
      $stm->bindParam(1,$usuario->getIdUsuario());
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
  function ModificarDatosPersonales($usuario){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare("call modificarDatosPersonales(?,?,?,?,?,?,?,?,?)");
      $stm->bindParam(1,$usuario->getNombreUsuario());
      $stm->bindParam(2,$usuario->getPrimerNombre());
      $stm->bindParam(3,$usuario->getSegundoNombre());
      $stm->bindParam(4,$usuario->getApellidoPaterno());
      $stm->bindParam(5,$usuario->getApellidoMaterno());
      $stm->bindParam(6,$usuario->getEmail());
      $stm->bindParam(7,$usuario->getContrasena());
      $stm->bindParam(8,$usuario->getFotoUrl());
      $stm->bindParam(9,$usuario->getFormaPago());
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
  function ObtenerMiPatrocinador($idUsuario){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare("call miPatrocinador(?)");
      $stm->bindParam(1,$idUsuario);
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
  function ObtenerDatosPersonalesArbol($idUsuario){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare("call datosPersonalesArbol(?)");
      $stm->bindParam(1,$idUsuario);
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
  function ObtenerMisInvitados($idUsuario){
    $pdo = new Connection();
    $conn = $pdo->getConnection();
    try {
      $stm = $conn->prepare("call misInvitados(?)");
      $stm->bindParam(1,$idUsuario);
      $stm->execute();
      $result = $stm->fetchAll();
      $usuarios = array();
      $contador = 0;
      foreach ($result as $row){
        $usuario2 = $row['idUsuario'];
        $usuarios[$contador] = $row;
        $usuarios[$contador]['invitados'] = $this->ObtenerMisInvitados($usuario2);
        $contador = $contador + 1;
      }
      return $usuarios;
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
