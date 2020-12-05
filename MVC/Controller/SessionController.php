<?php

class SessionController{

    public function __construct(){
        session_start();
    }

    public function redirect()
    {
        //header("location: UsuarioController.php?action=login");
        header("location: UsuarioController.php?action=login");
    }
}

?>