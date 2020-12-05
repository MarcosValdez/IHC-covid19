<?php

    class UsuarioModel{
        private $db;
        private $logeo;
        private $correoCliente;

        protected $id;
        protected $nombres;
        protected $apellido_paterno;
        protected $apellido_materno;
        protected $email;
        protected $password;
        protected $telefono;
        protected $distrito;
        protected $direccion;

        public function __construct(){
            /*Se encarga de conectar con la BD*/
            require_once("../Model/Conectar.php");
            $this->db=Conectar::conexion();
            $this->logeo=array();
        }

        protected function BuscarUsuarioPorEmail(){
            
            $sql = "SELECT * FROM users WHERE VCH_CLIEEMAIL = '$this->email'";
            $consulta = $this->db->prepare($sql);
            $consulta->execute();

            //Para guardar la informacion como objeto
            $objConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
            return $objConsulta;
        }

        protected function Insertar_Usuario(){
            require_once("../Model/Conectar.php");

            $sql = "INSERT INTO users (VCH_CLIEEMAIL, VCH_CLIEPASSWORD, VCH_CLIEPATERNO, VCH_CLIEMATERNO, 
            VCH_CLIENOMBRES,VCH_CLIETELEFONO, VCH_CLIEDIRECCION,VCH_CLIERESIDENCIA) 
            VALUES (:email, :password, :apellidoPaterno, :apellidoMaterno, :nombres, :telefono, :direccion, :distrito)";
        
            $stmt = $this->db->prepare($sql);
        
            $stmt->bindParam(':apellidoPaterno', $this->apellido_paterno);
            $stmt->bindParam(':apellidoMaterno', $this->apellido_materno);
            $stmt->bindParam(':nombres', $this->nombres);
        
            $stmt->bindParam(':email', $this->email);
        
            $stmt->bindParam(':password', $this->password);
        
            $stmt->bindParam(':telefono', $this->telefono);
            $stmt->bindParam(':direccion', $this->direccion);
        
            $stmt->bindParam(':distrito', $this->distrito);
        
            if ($stmt->execute()) {
              $message = 'Successfully created new user';
            } else {
              $message = 'Sorry there must have been an issue creating your account';
            }
            echo "INGRESASTE PAPU";
        }


        public function accesar($email, $password){
            $consulta = $this->db->query("SELECT INT_CLIEID, VCH_CLIEEMAIL, VCH_CLIEPASSWORD FROM users WHERE VCH_CLIEEMAIL = '$email'");
            $filas = $consulta->fetch(PDO::FETCH_ASSOC);

            $message = '';

            if(count($filas) > 0 && password_verify($password, $filas['VCH_CLIEPASSWORD'])){
                //$_SESSION['user_id'] = $filas['INT_CLIEID'];
                echo "ENTRAMOS SIN PROBLEMAS\n\n";
                echo "".$filas['VCH_CLIEEMAIL'];
                $this->logeo[]=$filas;
                $this->correoCliente = $filas['VCH_CLIEEMAIL'];
            }else{
                $message = 'Sorry, those credentials do not match';
            }

            return $this->logeo;
        }
    }
?>