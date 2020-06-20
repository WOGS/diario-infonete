<?php

class InicioController
{
    public function __construct(){
    }

    public function execute(){
        include_once("view/inicioView.php");
    }
    public function executeAdm(){
        include_once("view/adm/indexInternoView.php");
    }
    public function executePanelControl(){
        include_once("view/adm/panelControl.php");
    }
}