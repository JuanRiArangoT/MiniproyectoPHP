<?php

    include '../modelo/Facultades.php';
    include '../controlador/ControlFacultades.php';
    include '../controlador/ControlConexion.php';

    
    $id = $_POST['txtId'];
    $nombreFacultad = $_POST['txtNombre'];
    $decano = $_POST['txtDecano'];
    
    $bot = $_POST['bot'];

    

    switch($bot){
        case 'guardar':
            $objFacultades= new Facultades($id, $nombreFacultad, $decano);
            $objControlFacultades = new ControlFacultades($objFacultades);
            $objControlFacultades->guardar();
            
            break;
        
        case 'consultar':
            $objFacultades = new Facultades($id,"","");
            $objControlFacultades = new ControlFacultades($objFacultades);
            $objFacultades=$objControlFacultades->consultar();

            $nombreFacultad=$objFacultades->getNombreFacultad();
            $decano=$objFacultades->getDecano();
        

        echo "nombreFacultad=".$nombreFacultad."<br>";
        echo "decano=".$decano."<br>";
    
            
            break;

        case 'modificar':
            $objFacultades= new Facultades($id, $nombreFacultad, $decano);
            $objControlFacultades = new ControlFacultades($objFacultades);
            $objControlFacultades->modificar();
            break;

        case 'borrar':
            $objFacultades = new Facultades($id,"","");
            $objControlFacultades = new ControlFacultades($objFacultades);
            $objControlFacultades->borrar();
            break;

        default:
            break;
    }
?>