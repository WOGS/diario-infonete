<?php
include_once("helper/Database.php");

class RevistaModel
{
    private $conexion;

    public function __construct(){
        $this->conexion = new Database();
    }
    
    public function executeGuardarRevista($idAdmin,$titulo,$nroRevista,$descripcion){
        
        $this->conexion->executeGuardarRevista($idAdmin,$titulo,$nroRevista,$descripcion);

    }
}