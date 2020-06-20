<?php
class LoginController{
    private $modelo;

    public function __construct(){
        include_once("model/LoginModel.php");
        $this->modelo = new LoginModel();
    }

    public function execute($usuario,$clave){
        $userRol = $_SESSION["usuarioAlta"];
        $control =0;
        $this->modelo->verificarUsuario($usuario,$clave);

        if(isset($_SESSION["loginError"])){
            $control =1;
        }

        if($userRol =="Usuario"){
            header("Location: index.php");
        }else{
            if($control==1){
                header("Location: interno.php");
            }else{
                header("Location: interno.php?page=panelControl");
            }
        }
    }
}
