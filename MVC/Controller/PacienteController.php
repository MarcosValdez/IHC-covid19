<?php
    require_once("../Model/PacienteModel.php");
    require '../Controller/SessionController.php';

    $is = new SessionController();

    if(empty($_SESSION['nombre'])){

        $is->redirect();

    }

    class PacienteController extends PacienteModel{
        
        public function RegistrarPacienteView(){
            require '../View/Paciente/RegistrarPacienteView.php';
        }

        public function SaveInfoForModel_Paciente($dni,$paterno,$materno,$nombres,$categoria,$estado){
            /*CONTINUAMOS AQUI*/

            $this->dni = $dni;
            $this->paterno = $paterno;
            $this->materno = $materno;
            $this->nombres = $nombres;
            $this->categoria = $categoria;
            $this->estado = $estado;

            $this->Insertar_Paciente();
        }

    }


    if(isset($_GET['action']) && $_GET['action']=='registrar_paciente'){
        $is = new PacienteController();
        $is->RegistrarPacienteView();
    }

    if (isset($_POST['action']) && $_POST['action']=='registrar_paciente') { 
        $is = new PacienteController();

        $is->SaveInfoForModel_Paciente(
            $_POST['Dni_Paciente'],
            $_POST['Paterno_Paciente'],
            $_POST['Materno_Paciente'],
            $_POST['Nombres_Paciente'],
            $_POST['Categoria_Paciente'],
            $_POST['Estado_Paciente'],


        );
        
    }

?>