<?php

    require '../Model/UsuarioModel';
    require 'SessionController.php';

    $objSession = new SessionController();

    //Redireccionamiento si no hay logeo
    if(empty($_SESSION['nombre'])){
        $is = redirect();
    }/*aquiiiiiiiiiii*/ 


?>