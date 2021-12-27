<?php 
session_start();

include_once ('conexion.php');

// var_dump($_POST) ;
// die();

if (isset($_POST['edit'])) {
	$database = new ConectarDB();
	$db = $database->open();
	try{
		$id = $_GET['id'];
		$nombrec = $_POST['nombrecontacto'];
		$celularc = $_POST['celular'];
		$email = $_POST['email'];
		$direccionc = $_POST['direccion'];
		$sql = "UPDATE personas SET nombre = '$nombrec', telefono = '$celularc', correo = '$email', direccion = '$direccionc' WHERE idPersona = '$id'";

		$_SESSION['menssage']=($db->exec($sql)) ? 'Los datos se actualizaron correctamente' : 'Algo salio mal, no se pudo actualizar el contacto';

	} catch (PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}
	$database->close();

}else{
	$_SESSION['message'] = 'Rellene el Formulario';
}

header('location: index.php');