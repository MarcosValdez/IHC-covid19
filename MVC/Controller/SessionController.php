<?php

class SessionController{

    public function __construct(){
        session_start();
    }

    public function redirect()
    {
        header("../MVC/Controller/UsuarioController.php?action=login");
    }
}

?>