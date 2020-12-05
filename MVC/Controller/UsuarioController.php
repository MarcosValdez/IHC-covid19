<?php
    require_once("../Model/UsuarioModel.php");
    require_once("SessionController.php");

    $objSession = new SessionController();

    class UsuarioController extends UsuarioModel{
        
        public function LoginView(){
            require '../View/Usuario/LoginView.php';
        }

        public function RegistrarView(){
            require '../View/Usuario/RegistrarView.php';
        }

        public function redirectPrincipal(){
            header("location: ../View/PrincipalView.php");
        }

        public function SaveInfoForModel($DNI,$apaterno,$amaterno,$nombres,$email,$password,$telefono,$distrito,$direccion){
            /*CONTINUAMOS AQUI*/
            $this->id = $DNI;
            $this->apellido_paterno = $apaterno;
            $this->apellido_materno = $amaterno;
            $this->nombres = $nombres;
            $this->email = $email;
            $this->password = $password;
            $this->telefono = $telefono;
            $this->distrito = $distrito;
            $this->direccion = $direccion;

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

            if(password_verify($password,$usuario->VCH_CLIEPASSWORD)){
                $_SESSION['nombre'] = $usuario->VCH_CLIENOMBRES;
                $_SESSION['apellidoPaterno'] = $usuario->VCH_CLIEPATERNO;
                $_SESSION['apellidoMaterno'] = $usuario->VCH_CLIEMATERNO;
                $this->redirectPrincipal();
            }else{
                header("location: ../View/Usuario/LoginView.php");
            }
        }
    }
    //if (!empty($_POST['email']) && !empty($_POST['password'])) {    NUNCA ENVIAR PASSWORD A TRAVES DE GET
    
    if (isset($_POST['action']) && $_POST['action']=='login') { 
        $miControlador = new UsuarioController();

        $email = $_POST['email'];
        $password = $_POST['password'];

        $miControlador->Verificar_Login($email,$password);
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
        
        /* Tratamiento de una fotografia
        $foto=$_FILES['imagen']['name'];
        $fototemporal = $_FILES['imagen']['tmp_name'];
        $fotourl = "../Views/Usuario/Image/". $foto;
        copy($fototemporal,$fotourl);
        */

        $is->SaveInfoForModel(
            $_POST['DNI'],

            $_POST['Apellido_Paterno'],
            $_POST['Apellido_Materno'],
            $_POST['Nombres'],
            $_POST['Email'],
            $password,
            $_POST['Telefono'],
            $_POST['Distrito'],
            $_POST['Direccion']
        );
        
    }


?>