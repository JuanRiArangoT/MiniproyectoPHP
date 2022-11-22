<?php
    include '../modelo/Alumnos.php';
    include '../controlador/ControlAlumnos.php';
    include '../controlador/ControlConexion.php';

    $id = $_POST['txtId'];
    $identificacion = $_POST['txtIdentificacion'];
    $nombre = $_POST['txtNombre'];
    $telefono = $_POST['txtTelefono'];
    $direccion = $_POST['txtDireccion'];
    $correo = $_POST['txtCorreo'];
    
    $bot = $_POST['bot'];

     
    switch($bot){
        case 'guardar':
            $objAlumnos = new Alumnos($id, $identificacion, $nombre, $telefono, $direccion, $correo);
            $objControlAlumnos = new ControlAlumnos($objAlumnos);
            $objControlAlumnos->guardar();
            
            echo "error";
            break;
        
        case 'consultar':
        $objAlumnos=new Alumnos($id,"","","","","");
        $objControlAlumnos=new ControlAlumnos($objAlumnos);
        $objAlumnos=$objControlAlumnos->consultar();
        $identificacion=$objAlumnos->getIdentificacion();
        $nombre=$objAlumnos->getNombre();
        $telefono=$objAlumnos->getTelefono();
        $direccion=$objAlumnos->getDireccion();
        $correo=$objAlumnos->getCorreo();

        echo "identificacion=".$identificacion."<br>";
        echo "nombre=".$nombre."<br>";
        echo "telefono=".$telefono."<br>";
        echo "direccion=".$direccion."<br>";
        echo "correo=".$correo."<br>";
            
            break;

        case 'modificar':
            $objAlumnos = new Alumnos($id, $identificacion, $nombre, $telefono, $direccion, $correo);
            $objControlAlumnos = new ControlAlumnos($objAlumnos);
            $objControlAlumnos->modificar();
            break;

        case 'borrar':
            $objAlumnos = new Alumnos($id,"","","","","");
            $objControlAlumnos = new ControlAlumnos($objAlumnos);
            $objControlAlumnos->borrar();
            break;

        default:
            break;
    }
?>