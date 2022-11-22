<?php

    include '../modelo/Profesores.php';
    include '../controlador/ControlProfesores.php';
    include '../controlador/ControlConexion.php';

    $id = $_POST['txtId'];
    $nombreProfesor = $_POST['txtNombreProfesor'];
    $cedula = $_POST['txtCedula'];
    $telefono = $_POST['txtTelefono'];
    $correo = $_POST['txtCorreo'];
    $direccion = $_POST['txtDireccion'];
    
    $bot = $_POST['bot'];


    switch($bot){
        case 'guardar':
            $objProfesores = new Profesores($id, $nombreProfesor, $cedula,$telefono,$correo, $direccion);
            $objControlProfesores = new ControlProfesores($objProfesores);
            $objControlProfesores->guardar();
            break;
        
        case 'consultar':
        $objProfesores = new Profesores($id,"","","","","");
        $objControlProfesores =new ControlProfesores($objProfesores);
        $objProfesores=$objControlProfesores->consultar();

        $nombreProfesor=$objProfesores->getNombreProfesor();
        $cedula=$objProfesores->getCedula();
        $telefono=$objProfesores->getTelefono();
        $correo=$objProfesores->getCorreo();
        $direccion=$objProfesores->getDireccion();
        

        echo "nombreProfesor=".$nombreProfesor."<br>";
        echo "cedula=".$cedula."<br>";
        echo "telefono=".$telefono."<br>";
        echo "correo=".$correo."<br>";
        echo "direccion=".$direccion."<br>";
    
            
            break;

        case 'modificar':
            $objProfesores = new Profesores($id, $nombreProfesor, $cedula,$telefono,$correo, $direccion);
            $objControlProfesores = new ControlProfesores($objProfesores);
            $objControlProfesores->modificar();
            break;

        case 'borrar':
            $objProfesores = new Profesores($id,"","","","","");
            $objControlProfesores = new ControlProfesores($objProfesores);
            $objControlProfesores->borrar();
            break;

        default:
            break;
    }
?>