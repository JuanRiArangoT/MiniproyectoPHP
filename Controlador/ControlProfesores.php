<?php
    class ControlProfesores{
        var $objProfesores;
        function __construct($objProfesores){
            $this->objProfesores = $objProfesores;
        }

        function guardar(){
            $id = $this->objProfesores->getId();
            $nombreProfesor = $this->objProfesores->getnombreProfesor();
            $cedula = $this->objProfesores->getCedula();
            $correo = $this->objProfesores->getCorreo();
            $telefono = $this->objProfesores->getTelefono();
            $direccion = $this->objProfesores->getDireccion();

            $comandoSql = "INSERT INTO profesores VALUES('".$id."','".$nombreProfesor."','".$cedula."','".$correo."','".$telefono."', '".$direccion."')";   
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost", "root", "","bdproyecto3");
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function modificar(){
            $id = $this->objProfesores->getId();
            $nombreProfesor = $this->objProfesores->getnombreProfesor();
            $cedula = $this->objProfesores->getCedula();
            $correo = $this->objProfesores->getCorreo();
            $telefono = $this->objProfesores->getTelefono();
            $direccion = $this->objProfesores->getDireccion();

            $comandoSql = "UPDATE profesores SET nombreProfesor ='".$nombreProfesor."', telefono = '".$telefono."', cedula = '".$cedula."', correo = '".$correo."', direccion = '".$direccion."' where id'".$id."'";

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost", "root", "","bdproyecto3");
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar(){
            $id = $this->objProfesores->getId();

            $comandoSql = "delete from profesores where id = '".$id."'";

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost", "root", "","bdproyecto3");
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function consultar(){
 
            $nombreProfesor="";
            $cedula="";
            $correo = "";
            $telefono = "";
            $direccion = "";
            $id=$this->objProfesores->getId();


            $comandoSql="select * from profesores where id='".$id."'";

            $objControlConexion=new ControlConexion();
           $objControlConexion->abrirBd("localhost", "root", "","bdproyecto3");

            $recordSet=$objControlConexion->ejecutarSelect($comandoSql);
            if($row=$recordSet->fetch_array(MYSQLI_BOTH)){
                $nombreProfesor=$row["nombreProfesor"];
                $cedula=$row["cedula"];
                $correo=$row["correo"];
                $telefono=$row["telefono"];
                $direccion=$row["direccion"];


                
                $this->objProfesores->setNombreProfesor($nombreProfesor);
                $this->objProfesores->setCedula($cedula);
                $this->objProfesores->setCorreo($correo);
                $this->objProfesores->setTelefono($telefono);
                $this->objProfesores->setDireccion($direccion);
                

            
            }
            $objControlConexion->cerrarBd();

            return $this->objProfesores;
       }  
    }
?>