<?php
    require_once("conexion.php");
    class Convocatoria extends Connexion{
        public function Convocatoria(){
            parent::__construct();
        }
        public function mostrarConvocatoriaFechaAscendente($fechaActual){
            $sql="SELECT titulo,descripcion_convocatoria,fecha,direcccion_pdf FROM convocatoria WHERE activo='true' AND ? <= fecha_expiracion ORDER BY fecha desc";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute([$fechaActual]);
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
            $this->connexion_bd=null;
        }
        public function mostrarTodasConvocatoriaFechaAscendente(){
            $sql="SELECT titulo,descripcion_convocatoria,fecha,direcccion_pdf,id_convocatoria,fecha_expiracion,creador FROM convocatoria WHERE activo='true' ORDER BY fecha desc";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
            $this->connexion_bd=null;
        }
        public function mostrarTodasConvocatoriaFechaDescendente(){
            $sql="SELECT titulo,descripcion_convocatoria,fecha,direcccion_pdf,id_convocatoria,fecha_expiracion,creador FROM convocatoria WHERE activo='true' ORDER BY fecha asc";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
            $this->connexion_bd=null;
        }
        public function mostrarTodasConvocatoriaNombreDescendente(){
            $sql="SELECT titulo,descripcion_convocatoria,fecha,direcccion_pdf,id_convocatoria,fecha_expiracion,creador FROM convocatoria WHERE activo='true' ORDER BY titulo desc";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
            $this->connexion_bd=null;
        }
        public function mostrarTodasConvocatoriaNombreAscendente(){
            $sql="SELECT titulo,descripcion_convocatoria,fecha,direcccion_pdf,id_convocatoria,fecha_expiracion,creador FROM convocatoria WHERE activo='true' ORDER BY titulo asc";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
            $this->connexion_bd=null;
        }

        public function mostrarTodasConvocatoriaAutorDescendente(){
            $sql="SELECT titulo,descripcion_convocatoria,fecha,direcccion_pdf,id_convocatoria,fecha_expiracion,creador FROM convocatoria WHERE activo='true' ORDER BY creador desc";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
            $this->connexion_bd=null;
        }
        public function mostrarTodasConvocatoriaAutorAscendente(){
            $sql="SELECT titulo,descripcion_convocatoria,fecha,direcccion_pdf,id_convocatoria,fecha_expiracion,creador FROM convocatoria WHERE activo='true' ORDER BY creador asc";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
            $this->connexion_bd=null;
        }/*
        public function subirConvocatoria($nombreDeConvocatoria,$fechaActual,$direccionBaseDeDatos,$direccionBaseDeDatos,$FechaHoraExpiracion,$tipoConvocatoria,$departamento,$gestion,$autor){
            $sql= "INSERT INTO convocatoria(titulo,fecha,direcccion_pdf,descripcion_convocatoria,activo,fecha_expiracion,tipo_convocatoria,departamento,gestion,creador)
            VALUES (':nomConvo',':fechaAct',':dirBase','$direccionBaseDeDatos',TRUE,'$FechaHoraExpiracion','$tipoConvocatoria','$departamento','$gestion','$autor')";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array());
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
            $this->connexion_bd=null;
        }*/
    }
    
?>