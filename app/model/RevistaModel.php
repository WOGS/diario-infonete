<?php
include_once("helper/Database.php");

class RevistaModel
{
    private $conexion;

    public function __construct(){
        $this->conexion = new Database();
    }

    public function executeBuscarRevista(){
       $this->conexion->queryBuscarRevistas();
    }

    public function executeBuscarNoticias(){
        $this->conexion->queryBuscarNoticias();
    }

    public function executeGuardarRevista($idAdmin,$titulo,$nroRevista,$descripcion){

        $sql = "INSERT INTO Diario_Revista(Id_Admin,Titulo,Numero,Descripcion)
                value($idAdmin,'$titulo',$nroRevista,'$descripcion')";
        $this->conexion->queryInsert($sql);
        $this->conexion->close();
    }
}