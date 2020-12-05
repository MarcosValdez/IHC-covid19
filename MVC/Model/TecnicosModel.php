<?php

    class TecnicosModel{
        private $db;
        private $tecnicos;

        public function __construct(){
            /*Se encarga de conectar con la BD*/
            require_once("Model/Conectar.php");
            $this->db=Conectar::conexion();
            $this->tecnicos=array();
        }

        public function getTecnicos(){
            $consulta = $this->db->query("SELECT VCH_TECNOMBRES FROM tecnicos");

            //Cada registro de tecnico es almacenado en $filas
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
                $this->tecnicos[]=$filas;
            }
            return $this->tecnicos;
        }

        public function getTecnicosByEspecialidad($especialidad){

            $consulta = $this->db->query("SELECT INT_TECID FROM tecnicos 
                                            WHERE VCH_TECESPECIALIDAD = '$especialidad'");
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
                $this->tecnicos[]=$filas;
            }
            return $this->tecnicos;
        }
    }
?>