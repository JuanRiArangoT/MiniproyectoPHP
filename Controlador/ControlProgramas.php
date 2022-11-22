<?php
    class ControlProgramas{
        var $objProgramas;
        function __construct($objProgramas){
            $this->objProgramas = $objProgramas;
        }

        function guardar(){
            $id = $this->objProgramas->getId();
            $nombrePrograma = $this->objProgramas->getNombrePrograma();
            $jefePrograma = $this->objProgramas->getJefePrograma();
            

            $comandoSql = "INSERT INTO programas VALUES('".$id."','".$nombrePrograma."','".$jefePrograma.")";

          
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost", "root", "","bdproyecto3");
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function modificar(){
            $id = $this->objProgramas->getId();
            $nombrePrograma = $this->objProgramas->getnombrePrograma();
            $jefePrograma = $this->objProgramas->getJefePrograma();

            $comandoSql = "UPDATE programas SET nombrePrograma ='".$nombrePrograma."', jefePrograma = '".$jefePrograma."' where id'".$id."'";

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost", "root", "","bdproyecto3");
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        

        function borrar(){

            $id = $this->objProgramas->getId();

            $comandoSql = "delete from programas where id = '".$id."'";

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost", "root", "","bdproyecto3");
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        function consultar(){

            $nombrePrograma="";
            $jefePrograma="";
            
            $id=$this->objProgramas->getId();


            $comandoSql="select * from programas where id='".$id."'";

            $objControlConexion=new ControlConexion();
            $objControlConexion->abrirBd("localhost", "root", "","bdproyecto3");

            $recordSet=$objControlConexion->ejecutarSelect($comandoSql);
            if($row=$recordSet->fetch_array(MYSQLI_BOTH)){
                $nombrePrograma=$row["nombrePrograma"];
                $jefePrograma=$row["jefePrograma"];
                
                
                $this->objProgramas->setNombrePrograma($nombrePrograma);
                $this->objProgramas->setJefePrograma($jefePrograma);
               
                            
            }
            $objControlConexion->cerrarBd();

            return $this->objProgramas;
       } 
    }
?>