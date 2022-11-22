<?php
    class Alumnos{
        var $id;
        var $identificacion;
        var $nombre;
        var $telefono;
        var $direccion;
        var $correo;

        function __construct( $id, $identificacion, $nombre, $telefono, $direccion, $correo){
            $this->id = $id;
            $this->identificacion = $identificacion;
            $this->nombre = $nombre;
            $this->telefono = $telefono;
            $this->direccion = $direccion;
            $this->correo = $correo;
        }

        //SET
        function setId($id){
            $this->id = $id;
        }

        function setIdentificacion($identificacion){
            $this->identificacion = $identificacion;
        }

        function setNombre($nombre){
            $this->nombre = $nombre;
        }

        function setTelefono($telefono){
            $this->telefono = $telefono;
        }

        function setDireccion($direccion){
            $this->direccion = $direccion;
        }

        function setCorreo($correo){
            $this->correo = $correo;
        }

        //GET

        function getId(){
            return $this->id;
        }
         function getIdentificacion(){
            return $this->identificacion;
        }
         function getNombre(){
            return $this->nombre;
        }
         function getTelefono(){
            return $this->telefono;
        }
         function getDireccion(){
            return $this->direccion;
        }
         function getCorreo(){
            return $this->correo;
        }
    }
?>