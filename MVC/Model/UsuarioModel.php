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
 
        public function __construct(){
            /*Se encarga de conectar con la BD*/
            require_once("../Model/Conectar.php");
            $this->db=Conectar::conexion();
            $this->logeo=array();
            $this->hospitales=array();
            $this->pacientes=array();
        }

        protected function BuscarUsuarioPorEmail(){
            
            $sql = "SELECT * FROM administradores WHERE VCH_ADMINEMAIL = '$this->email'";
            $consulta = $this->db->prepare($sql);
            $consulta->execute();

            //Para guardar la informacion como objeto
            $objConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
            return $objConsulta;
        }

        protected function Insertar_Usuario(){
            require_once("../Model/Conectar.php");

            $sql = "INSERT INTO administradores (VCH_ADMINEMAIL, VCH_ADMINPASSWORD, VCH_ADMINPATERNO, VCH_ADMINMATERNO, 
            VCH_ADMINNOMBRES) 
            VALUES (:email, :password, :apellidoPaterno, :apellidoMaterno, :nombres)";
        
            $stmt = $this->db->prepare($sql);
        
            $stmt->bindParam(':apellidoPaterno', $this->apellido_paterno);
            $stmt->bindParam(':apellidoMaterno', $this->apellido_materno);
            $stmt->bindParam(':nombres', $this->nombres);
        
            $stmt->bindParam(':email', $this->email);
        
            $stmt->bindParam(':password', $this->password);

            if ($stmt->execute()) {
              $message = 'Successfully created new user';
            } else {
              $message = 'Sorry there must have been an issue creating your account';
            }
            echo "ADMINISTRADOR REGISTRADO";
        }


        public function accesar($email, $password){
            $consulta = $this->db->query("SELECT INT_ADMINID, VCH_ADMINEMAIL, VCH_ADMINPASSWORD FROM administradores WHERE VCH_ADMINEMAIL = '$email'");
            $filas = $consulta->fetch(PDO::FETCH_ASSOC);

            $message = '';

            if(count($filas) > 0 && password_verify($password, $filas['VCH_ADMINPASSWORD'])){
                $this->logeo[]=$filas;
                $this->correoCliente = $filas['VCH_ADMINEMAIL'];
            }else{
                $message = 'Sorry, those credentials do not match';
            }

            return $this->logeo;
        }

        public function mandar(){
            $email = 'mazher_2014@hotmail.com';
            $consulta = $this->db->query("SELECT INT_CLIEID, VCH_CLIEEMAIL, VCH_CLIENOMBRES, VCH_CLIEPASSWORD FROM users WHERE VCH_CLIEEMAIL = '$email'");
            $filas = $consulta->fetch(PDO::FETCH_ASSOC);

            $ID_ENVIO = $filas['INT_CLIEID'];
            $NOMBRE_ENVIO = $filas['VCH_CLIENOMBRES'];

            #SQL
            $datos = array(
                array(
                    'id' => $ID_ENVIO,
                    'nombre' => $NOMBRE_ENVIO

                ),array(
                    'id' => 2,
                    'nombre' => "ED"
                )
            );
            echo json_encode($datos);

            require '../View/TablaMuestras.php';
            
        }

        public function obtenerHospitales(){

                $consulta = $this->db->query("SELECT * FROM hospitales");
    
                //Cada registro de tecnico es almacenado en $filas
                while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
                    $this->hospitales[]=$filas;
                }
                return $this->hospitales;
        }

        public function obtenerPacientes(){

            $consulta = $this->db->query("SELECT * FROM pacientes");

            //Cada registro de tecnico es almacenado en $filas
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
                $this->pacientes[]=$filas;
            }
            return $this->pacientes;
        }
    }
?>