<?php
include_once(dirname(__DIR__).'/model/favoritos.php');
include_once(dirname(__DIR__).'/data/favoritosCRUD.php');

$json = $_POST['json'];
$obj = json_decode($json);

$favoritos = new Favoritos();
$favoritos->setIdUsuario($obj->idUsuario);

$fm = new FavoritosMetodos();
$json = $fm->MostrarFavoritos($favoritos);
print_r($json);
 ?>
