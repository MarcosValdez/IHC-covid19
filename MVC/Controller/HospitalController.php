<?php
    require_once("../Model/HospitalModel.php");
    require '../Controller/SessionController.php';

    $is = new SessionController();

    if(empty($_SESSION['nombre'])){

        $is->redirect();

    }

    class HospitalController extends HospitalModel{
        
        public function RegistrarHospitalView(){
            require '../View/Hospital/RegistrarHospitalView.php';
        }

        public function SaveInfoForModel_Hospital($nombre,$direccion,$distrito,$id_telefonos){
            /*CONTINUAMOS AQUI*/

            $this->nombre = $nombre;
            $this->direccion = $direccion;
            $this->distrito = $distrito;
            $this->id_telefonos = $id_telefonos;

            $this->Insertar_Hospital();
        }

    }


    if(isset($_GET['action']) && $_GET['action']=='registrar_hospital'){
        $is = new HospitalController();
        $is->RegistrarHospitalView();
    }

    if (isset($_POST['action']) && $_POST['action']=='registrar_hospital') { 
        $is = new HospitalController();

        $is->SaveInfoForModel_Hospital(

            $_POST['Nombre_Hospital'],
            $_POST['Direccion_Hospital'],
            $_POST['Distrito_Hospital'],
            $_POST['Id_Telefonos_Hospital'],


        );
        
    }

?>