<?php

class RevistaController
{
    public function __construct(){
        include_once("model/RevistaModel.php");
        $this->modelo = new RevistaModel();
    }

    public function execute(){
        include_once("view/revista/panelControlRevista.php");
    }

    public function executeGuardarRevista($idAdmin,$titulo,$nroRevista,$descripcion){

        $this->modelo->executeGuardarRevista($idAdmin,$titulo,$nroRevista,$descripcion);
            
        header("Location: view/revista/panelControlRevista.php");

    }

}