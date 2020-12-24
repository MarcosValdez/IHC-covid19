<?php

    class PacienteModel{
        private $db;
        private $logeo;

        protected $dni;
        protected $paterno;
        protected $materno;

        protected $nombres;
        protected $categoria;

        protected $estado;

        public function __construct(){
            /*Se encarga de conectar con la BD*/
            require_once("../Model/Conectar.php");
            $this->db=Conectar::conexion();
            $this->logeo=array();
        }

        protected function Insertar_Paciente(){
            require_once("../Model/Conectar.php");

            $sql = "INSERT INTO pacientes (VCH_PACDNI, VCH_PACPATERNO, VCH_PACMATERNO, VCH_PACNOMBRES, INT_PACCATEGORIA, VCH_PACESTADO) 
            VALUES (:dni, :paterno, :materno, :nombres, :categoria, :estado)";
        
            $stmt = $this->db->prepare($sql);
        
            $stmt->bindParam(':dni', $this->dni);
            $stmt->bindParam(':paterno', $this->paterno);
            $stmt->bindParam(':materno', $this->materno);
            $stmt->bindParam(':nombres', $this->nombres);
            $stmt->bindParam(':categoria', $this->categoria);
            $stmt->bindParam(':estado', $this->estado);

            if ($stmt->execute()) {
              $message = 'Successfully created new user';
            } else {
              $message = 'Sorry there must have been an issue creating your account';
            }
            echo "PACIENTE REGISTRADO";
        }
    }
?>