<?php
    class ControlAlumnos{
        var $objAlumnos;
        function __construct($objAlumnos){
            $this->objAlumnos = $objAlumnos;
        }

        function guardar(){
            $id = $this->objAlumnos->getId();
            $identificacion = $this->objAlumnos->getIdentificacion();
            $nombre = $this->objAlumnos->getNombre();
            $telefono = $this->objAlumnos->getTelefono();
            $direccion = $this->objAlumnos->getDireccion();
            $correo = $this->objAlumnos->getCorreo();

            $comandoSql = "INSERT INTO alumnos VALUES('".$id."','".$identificacion."','".$nombre."','".$telefono."', '".$direccion."','".$correo.")";

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost", "root", "","bdproyecto3");
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function modificar(){
            $id = $this->objAlumnos->getId();
            $identificacion = $this->objAlumnos->getIdentificacion();
            $nombre = $this->objAlumnos->getNombre();
            $telefono = $this->objAlumnos->getTelefono();
            $direccion = $this->objAlumnos->getDireccion();
            $correo = $this->objAlumnos->getCorreo();

            $comandoSql = "UPDATE alumnos SET correo ='".$correo."', identificacion = '".$identificacion."', nombre = '".$nombre."', telefono = '".$telefono."', direccion = '".$direccion."' where id'".$id."'";

            $objControlConexion = new ControlConexion();
           $objControlConexion->abrirBd("localhost", "root", "","bdproyecto3");
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar(){
            $id = $this->objAlumnos->getId();

            $comandoSql = "delete from alumnos where id = '".$id."'";

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost", "root", "","bdproyecto3");
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function consultar(){
            $identificacion="";
            $nombre="";
            $telefono="";
            $direccion="";
            $correo="";
            $id=$this->objAlumnos->getId();


            $comandoSql="select * from alumnos where id='".$id."'";

            $objControlConexion=new ControlConexion();
            $objControlConexion->abrirBd("localhost", "root", "","bdproyecto3");

            $recordSet=$objControlConexion->ejecutarSelect($comandoSql);
            if($row=$recordSet->fetch_array(MYSQLI_BOTH)){
                $identificacion=$row["identificacion"];
                $nombre=$row["nombre"];
                $telefono=$row["telefono"];
                $direccion=$row["direccion"];
                $correo=$row["correo"];


                $this->objAlumnos->setIdentificacion($identificacion);
                $this->objAlumnos->setNombre($nombre);
                $this->objAlumnos->setTelefono($telefono);
                $this->objAlumnos->setDireccion($direccion);
                $this->objAlumnos->setCorreo($correo);

            
            }
            $objControlConexion->cerrarBd();

            return $this->objAlumnos;
        }
    }
?>