<?php
include '../modelo/Usuarios.php';
include '../controlador/ControlConexion.php';
include '../controlador/ControlUsuarios.php';
$usu=$_POST['txtUsuario'];
$con=$_POST['txtContrasena'];
$bot=$_POST['btnEnviar'];
$niv=0;
if($bot=="Enviar"){
echo "Entró";
	$objUsuarios=new Usuarios($usu,$con,$niv);
	$objControlUsuarios=new ControlUsuarios($objUsuarios);
	
	if($objControlUsuarios->validarIngreso()){
		echo "valido informacion";
		$_SESSION["nomUsu"]=$usu;
		header("Location: ../Vista/menu.html");
	}
	else{
		//header("Location: ../index.html");
	}
}
?>