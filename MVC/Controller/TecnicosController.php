<?php
    require_once("Model/TecnicosModel.php");
    $espe = "Electricidad";

    $tecnicos = new TecnicosModel();
    $tecnicos2 = new TecnicosModel();

    $matrizTecnicos = $tecnicos->getTecnicos();


    $matrizTecnicos2 = $tecnicos2->getTecnicosByEspecialidad($espe);

    require_once("View/TecnicosView.php");
    
    
?>