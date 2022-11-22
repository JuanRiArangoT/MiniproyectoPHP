<?php
    class Facultades{
        var $id;
        var $nombreFacultad;
        var $decano;
       

        function __construct($id, $nombreFacultad, $decano){
            $this->id = $id;
            $this->nombreFacultad = $nombreFacultad;
            $this->decano = $decano;
        
        }

        //SET

         function setId($id){
            $this->id = $id;
        }
        
        function setNombreFacultad($nombreFacultad){
            $this->nombreProfesor = $nombreProfesor;
        }
   

        function setDecano($decano){
            $this->decano = $decano;
        }

       

        //GET

         function getId(){
            return $this->id;
        }

        function getNombreFacultad(){
            return $this->nombreFacultad;
        }

        function getDecano(){
            return $this->decano;
        }

        
    }
?>