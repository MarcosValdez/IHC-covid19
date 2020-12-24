<?php

    class HospitalModel{
        private $db;
        private $logeo;

        protected $id;
        protected $nombres;

        protected $direccion;
        protected $distrito;
        protected $id_telefonos;

        public function __construct(){
            /*Se encarga de conectar con la BD*/
            require_once("../Model/Conectar.php");
            $this->db=Conectar::conexion();
            $this->logeo=array();
            $this->hospitales=array();
        }

        protected function Insertar_Hospital(){
            require_once("../Model/Conectar.php");

            $sql = "INSERT INTO hospitales (VCH_HOSPNOMBRE, VCH_HOSPDIRECCION, VCH_HOSPDISTRITO, INT_HOSPTELEFONOS_ID) 
            VALUES (:nombre, :direccion, :distrito, :id_telefonos)";
        
            $stmt = $this->db->prepare($sql);
        
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':direccion', $this->direccion);
            $stmt->bindParam(':distrito', $this->distrito);
        
            $stmt->bindParam(':id_telefonos', $this->id_telefonos);

            if ($stmt->execute()) {
              $message = 'Successfully created new user';
            } else {
              $message = 'Sorry there must have been an issue creating your account';
            }
            echo "HOSPITAL REGISTRADO";
        }
    }
?>