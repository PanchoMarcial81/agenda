<?php 
session_start();

include_once ('conexion.php');

// var_dump($_POST) ;
// die();

if (isset($_GET['id'])) {
	$database = new ConectarDB();
	$db = $database->open();
	try{
		$id = $_GET['id'];
		$sql = "DELETE FROM personas WHERE idPersona = '$id'";

		$_SESSION['menssage']=($db->exec($sql)) ? 'Los datos se eliminaron correctamente' : 'Algo salio mal, no se pudo actualizar el contacto';

	} catch (PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}
	$database->close();

}else{
	$_SESSION['message'] = 'Rellene el Formulario';
}

header('location: index.php');