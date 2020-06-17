<?php
    require_once("conexion.php");
    class Administrativo extends Connexion{
        public function Administrativo(){
            parent::__construct();
        }
        public function obtenerPasswordAdministrativo($usuario){
            $sql="SELECT password_administrativo FROM ADMINISTRATIVO WHERE UPPER(correo_Administrativo)= UPPER(:usser)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":usser"=>$usuario));
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $resultado=$resultado[0]['password_administrativo'];
            $sentenceSQL->closeCursor();
            return $resultado;
            $this->connexion_bd=null;
        }
        public function obtenerNombreAdministrativo($usuario){
            $sql="SELECT nombre_administrativo  FROM ADMINISTRATIVO WHERE UPPER(correo_Administrativo)= UPPER(:usser)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":usser"=>$usuario));
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $resultado=$resultado[0]['nombre_administrativo'];
            $sentenceSQL->closeCursor();
            return $resultado;
            $this->connexion_bd=null;
        }
        public function obtenerNumeroTelefonicoAdministrativo($usuario){
            $sql="SELECT numero_telefonico  FROM ADMINISTRATIVO WHERE UPPER(correo_Administrativo)= UPPER(:usser)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":usser"=>$usuario));
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $resultado=$resultado[0]['numero_telefonico'];
            $sentenceSQL->closeCursor();
            return $resultado;
            $this->connexion_bd=null;
        }
        public function obtenerCargoAdministrativo($usuario){
            $sql="SELECT cargo_administrativo  FROM ADMINISTRATIVO WHERE UPPER(correo_Administrativo)= UPPER(:usser)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":usser"=>$usuario));
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $resultado=$resultado[0]['cargo_administrativo'];
            $sentenceSQL->closeCursor();
            return $resultado;
            $this->connexion_bd=null;
        }
        public function obtenerSexoAdministrativo($usuario){
            $sql="SELECT sexo  FROM ADMINISTRATIVO WHERE UPPER(correo_Administrativo)= UPPER(:usser)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":usser"=>$usuario));
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $resultado=$resultado[0]['sexo'];
            $sentenceSQL->closeCursor();
            return $resultado;
            $this->connexion_bd=null;
        }
    }
?>