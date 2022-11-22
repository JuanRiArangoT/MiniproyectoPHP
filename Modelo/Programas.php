<?php
    class Programas{
        var $id;
        var $nombrePrograma;
        var $jefePrograma;
    }

    function __construct($id, $nombrePrograma,  $jefePrograma){
        $this->id = $id;
        $this->nombrePrograma = $nombrePrograma;
        $this->jefePrograma = $jefePrograma;
        
    }

    //set
    function setCodigo($id){
        $this->id = $id;
    }

    function setNombrePrograma($nombrePrograma){
        $this->nombrePrograma = $nombrePrograma;
    }


    function setJefe($jefePrograma){
        $this->jefePrograma = $jefePrograma;
    }

    //Get

    function getId(){
        return $this->id;
    }


    function getNombrePrograma(){
        return $this->nombrePrograma;
    }


    function getJefePrograma(){
        return $this->jefePrograma;
    }

?>