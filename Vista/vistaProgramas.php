<?php

    include '../modelo/Programas.php';
    include '../controlador/ControlProgramas.php';
    include '../controlador/ControlConexion.php';

    $id = $_POST['txtId'];
    $nombrePrograma = $_POST['txtNombre'];
    $jefePrograma = $_POST['txtJefePrograma'];

    $bot = $_POST['bot'];

    switch($bot){
        case 'guardar':
            $objProgramas = new Programas($id, $nombrePrograma, $jefePrograma);
            $objControlProgramas = new ControlProgramas($objProgramas);
            $objControlProgramas->guardar();
            
            break;
        
        case 'consultar':
        $objProgramas = new Programas($id,"","");
        $objControlProgramas=new ControlProgramas($objProgramas);
        $objProgramas=$objControlProgramas->consultar();

        $nombrePrograma=$objProgramas->getNombrePrograma();
        $jefePrograma=$objProgramas->getJefePrograma();
        
        

        echo "nombrePrograma=".$nombrePrograma."<br>";
        echo "jefePrograma=".$jefePrograma."<br>";
                    
            break;

        case 'modificar':
            $objProgramas = new Programas($id, $nombrePrograma, $jefePrograma);
            $objControlProgramas = new ControlProgramas($objProgramas);
            $objControlProgramas->modificar();
            break;

        case 'borrar':
            $objProgramas = new Programas($id);
            $objControlProgramas = new ControlProgramas($objProgramas);
            $objControlProgramas->borrar();
            break;

        default:
            break;
    }
?>