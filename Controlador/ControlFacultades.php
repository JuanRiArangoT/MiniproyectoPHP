<?php
    class Controlfacultades{
        var $objFacultades;
        function __construct($objFacultades){
            $this->objFacultades = $objFacultades;
        }

        function guardar(){
            $id = $this->objFacultades->getId();
            $nombreFacultad = $this->objFacultades->getnombreFacultad();
            $decano = $this->objFacultades->getDecano();


            $comandoSql = "INSERT INTO facultades VALUES('".$id."','".$nombreFacultad."','".$decano.")";

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost", "root", "","bdproyecto3");
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function modificar(){
            $id = $this->objFacultades->getId();
            $nombreFacultad = $this->objFacultades->getnombreFacultad();
            $decano = $this->objFacultades->getDecano();

            $comandoSql = "UPDATE facultades SET nombreFacultad ='".$nombreFacultad."', decano = '".$decano."'  where id'".$id."'";

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost", "root", "","bdproyecto3");
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar(){
            $id = $this->objFacultades->getId();

            $comandoSql = "delete from facultades where id = '".$id."'";

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost", "root", "","bdproyecto3");
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function consultar(){
            $nombreFacultad="";
            $decano="";
            $id=$this->objFacultades->getId();


            $comandoSql="select * from facultades where id='".$id."'";

            $objControlConexion=new ControlConexion();
            $objControlConexion->abrirBd("localhost", "root", "","bdproyecto");

            $recordSet=$objControlConexion->ejecutarSelect($comandoSql);
            if($row=$recordSet->fetch_array(MYSQLI_BOTH)){
                $nombreFacultad=$row["nombreFacultad"];
                $decano=$row["decano"];
                
                $this->objFacultades->setNombreFacultad($nombreFacultad);
                $this->objFacultades->setDecano($decano);
                

            
            }
            $objControlConexion->cerrarBd();

            return $this->objFacultades;
       }     
    }
?>