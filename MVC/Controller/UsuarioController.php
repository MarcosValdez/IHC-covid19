<?php
    require '../Model/UsuarioModel.php';
    require '../Controller/SessionController.php';

    $is = new SessionController();

    if(empty($_SESSION['nombre'])){

        $is->redirect();

    }

    class UsuarioController extends UsuarioModel{
        
        public function LoginView(){
            require '../View/Usuario/LoginView.php';
        }

        public function RegistrarView(){
            require '../View/Usuario/RegistrarView.php';
        }

        public function Testear(){
            $this->mandar();
        }

        public function Hospitales(){
            $matriz = $this->obtenerHospitales();
            require_once("../View/TablaMuestras.php");
        }

        public function Listar_Pacientes(){
            $matriz = $this->obtenerPacientes();
            require_once("../View/PacientesView.php");
        }

        public function redirectPrincipal(){
            header("location: ../../index.php");
        }

        public function SaveInfoForModel($apaterno,$amaterno,$nombres,$email,$password){
            /*CONTINUAMOS AQUI*/

            $this->apellido_paterno = $apaterno;
            $this->apellido_materno = $amaterno;
            $this->nombres = $nombres;
            $this->email = $email;
            $this->password = $password;

            $this->Insertar_Usuario();
        }

        public function loginAcceso($email,$password){
            $logeo = new UsuarioModel();
            $message = $logeo->accesar($email,$password);
        }
 
        public function Verificar_Login($email,$password){
            $this->email = $email;
            $this->password = $password;
            
            $infoUsuario = $this->BuscarUsuarioPorEmail();

            foreach($infoUsuario as $usuario){

            }

            if(password_verify($password,$usuario->VCH_ADMINPASSWORD)){
                $_SESSION['nombre'] = $usuario->VCH_ADMINNOMBRES;
                $_SESSION['apellidoPaterno'] = $usuario->VCH_ADMINPATERNO;
                $_SESSION['apellidoMaterno'] = $usuario->VCH_ADMINMATERNO;
                $this->redirectPrincipal();
            }else{
                header("location: ../View/Usuario/LoginView.php");
            }
        }

        public function Logout(){
            session_start();

            session_unset();
          
            session_destroy();
          
            require '../View/Usuario/LoginView.php';

            header('Location: ../../index.php');
        }
    }
    //if (!empty($_POST['email']) && !empty($_POST['password'])) {    NUNCA ENVIAR PASSWORD A TRAVES DE GET
    
    if (isset($_POST['action']) && $_POST['action']=='login') { 
        $miControlador = new UsuarioController();

        $email = $_POST['Email'];
        $password = $_POST['Password'];

        $miControlador->Verificar_Login($email,$password);
    }


    if(isset($_GET['action']) && $_GET['action']=='logout'){
        $is = new UsuarioController();
        $is->Logout();
    }


/*TEST*/
    if(isset($_GET['action']) && $_GET['action']=='test'){
        $is = new UsuarioController();
        $is->Testear();
    }

    if(isset($_GET['action']) && $_GET['action']=='hospitales'){
        $is = new UsuarioController();
        $is->Hospitales();
    }

    if(isset($_GET['action']) && $_GET['action']=='lista_general'){
        $is = new UsuarioController();
        $is->Listar_Pacientes();
    }


    if(isset($_GET['action']) && $_GET['action']=='login'){
        $is = new UsuarioController();
        $is->LoginView();
    }

    if(isset($_GET['action']) && $_GET['action']=='registrar'){
        $is = new UsuarioController();
        $is->RegistrarView();
    }

    if (isset($_POST['action']) && $_POST['action']=='signup') { 
        $is = new UsuarioController();

        $password = password_hash($_POST['Password'],PASSWORD_BCRYPT);

        $is->SaveInfoForModel(

            $_POST['Apellido_Paterno'],
            $_POST['Apellido_Materno'],
            $_POST['Nombres'],
            $_POST['Email'],
            $password
        );

        
    }


?>