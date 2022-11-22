<?php
    class Profesores{
        var $id;
        var $nombreProfesor;
        var $cedula;
        var $telefono;
        var $correo;
        var $direccion;

        function __construct($id, $nombreProfesor, $cedula, $telefono, $correo, $direccion){
            $this->id = $id;
            $this->nombreProfesor = $nombreProfesor;
            $this->cedula = $cedula;
            $this->telefono = $telefono;
            $this->correo = $correo;
            $this->direccion = $direccion;
        }

        //SET

        function setId($id){
            $this->id = $id;
        }

        function setNombreProfesor($nombreProfesor){
            $this->nombreProfesor = $nombreProfesor;
        }
    

        function setCedula($cedula){
            $this->cedula = $cedula;
        }

        function setTelefono($telefono){
            $this->telefono = $telefono;
        }

        function setCorreo($correo){
            $this->correo = $correo;
        }

        function setDireccion($direccion){
            $this->direccion = $direccion;
        }

        //GET

        function getId(){
            return $this->id;
        }

        function getNombreProfesor(){
            return $this->nombreProfesor;
        }

        
        function getCedula(){
            return $this->cedula;
        }

        function getTelefono(){
            return $this->telefono;
        }

        function getCorreo(){
            return $this->correo;
        }

        function getDireccion(){
            return $this->direccion;
        }
    }

?>