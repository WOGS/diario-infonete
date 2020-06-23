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

    public function executeCambiarEstadoNoticia($idNoticia){
        $this->conexion->queryCambiarEstado($idNoticia);
    }

    public function executeGuardarRevista($idAdmin,$titulo,$nroRevista,$descripcion){

        $sql = "INSERT INTO Diario_Revista(Id_Admin,Titulo,Numero,Descripcion)
                value($idAdmin,'$titulo',$nroRevista,'$descripcion')";
        $this->conexion->queryInsert($sql);
        $this->conexion->close();
    }
    public function executeGuardarNoticia($tituloNoticia,$subtitulo,$informe,$cod_contenidista){

        $sql = "insert into Noticia (Titulo,Subtitulo,informe_noticia,Cod_georef
                 ,Cod_seccion,Cod_Contenidista,EstadoAutorizado,Origen)
      value ('$tituloNoticia','$subtitulo','$informe',1,1,$cod_contenidista,'no','diario');";
        $this->conexion->queryInsert($sql);
        $this->conexion->close();
    }
    public function queryCambiarEstado($idNoticia){
        //$sql="UPDATE Noticia SET EstadoAutorizado='SI'where Cod_Noticia= '$id_Noticia'";
        //$this->conexion->update($sql);
        $this->conexion->queryCambiarEstado($idNoticia);
        $this->conexion->close();
    }
}