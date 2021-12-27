<?php 
session_start();

include_once ('conexion.php');

// var_dump($_POST) ;
// die();

if (isset($_POST['add'])) {
	$database = new ConectarDB();
	$db = $database->open();
	try{
		$stmt = $db->prepare("INSERT INTO personas ( nombre, telefono, correo, direccion) VALUES (:nombrecontacto, :celular, :email, :direccion)");
		$_SESSION['menssage']=($stmt->execute(array(':nombrecontacto'=>$_POST['nombrecontacto'], ':celular'=>$_POST['celular'], ':email'=>$_POST['email'], ':direccion'=>$_POST['direccion']))) ? 'Contacto agregado correctamente' : 'Algo salio mal, no se pudo agregar el contacto';
	} catch (PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}
	$database->close();

}else{
	$_SESSION['message'] = 'Rellene el Formulario';
}

header('location: index.php');