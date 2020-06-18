<?php
    require_once("conexion.php");
    class Convocatoria extends Connexion{
        public function Convocatoria(){
            parent::__construct();
        }
        public function cerrarConexion(){
            $this->connexion_bd=null;
        }
        public function mostrarConvocatoriaCompleta($id){
            $sql="SELECT * FROM convocatoria WHERE id_convocatoria= :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":id"=>$id));
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
        }
        public function mostrarConvocatoriaFechaAscendente($fechaActual){
            $sql="SELECT titulo,descripcion_convocatoria,fecha,direcccion_pdf FROM convocatoria WHERE activo='true' AND ? <= fecha_expiracion ORDER BY fecha desc";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute([$fechaActual]);
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
        }
        public function mostrarTodasConvocatoriaFechaAscendente(){
            $sql="SELECT titulo,descripcion_convocatoria,fecha,direcccion_pdf,id_convocatoria,fecha_expiracion,creador FROM convocatoria WHERE activo='true' ORDER BY fecha desc";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
        }
        public function mostrarTodasConvocatoriaFechaDescendente(){
            $sql="SELECT titulo,descripcion_convocatoria,fecha,direcccion_pdf,id_convocatoria,fecha_expiracion,creador FROM convocatoria WHERE activo='true' ORDER BY fecha asc";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
        }
        public function mostrarTodasConvocatoriaNombreDescendente(){
            $sql="SELECT titulo,descripcion_convocatoria,fecha,direcccion_pdf,id_convocatoria,fecha_expiracion,creador FROM convocatoria WHERE activo='true' ORDER BY titulo desc";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
        }
        public function mostrarTodasConvocatoriaNombreAscendente(){
            $sql="SELECT titulo,descripcion_convocatoria,fecha,direcccion_pdf,id_convocatoria,fecha_expiracion,creador FROM convocatoria WHERE activo='true' ORDER BY titulo asc";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
        }

        public function mostrarTodasConvocatoriaAutorDescendente(){
            $sql="SELECT titulo,descripcion_convocatoria,fecha,direcccion_pdf,id_convocatoria,fecha_expiracion,creador FROM convocatoria WHERE activo='true' ORDER BY creador desc";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
        }
        public function mostrarTodasConvocatoriaAutorAscendente(){
            $sql="SELECT titulo,descripcion_convocatoria,fecha,direcccion_pdf,id_convocatoria,fecha_expiracion,creador FROM convocatoria WHERE activo='true' ORDER BY creador asc";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
        }

        public function agregarConvocatoria($nombreDeConvocatoria,$fechaActual,$direccionBaseDeDatos,$descripcion,$FechaHoraExpiracion,$tipoConvocatoria,$departamento,$gestion,$autor){
            $sql= "INSERT INTO convocatoria(titulo,fecha,direcccion_pdf,descripcion_convocatoria,activo,fecha_expiracion,tipo_convocatoria,departamento,gestion,creador)
            VALUES (:nomConvocatoria,:fechaActual,:direccionBaseDeDatos,:descripcion,TRUE,:fechaHoraExpiracion,:tipoConvocatoria,:departamento,:gestion,:autor)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $resultado=$sentenceSQL->execute(array(":nomConvocatoria"=>$nombreDeConvocatoria,":fechaActual"=>$fechaActual,":direccionBaseDeDatos"=>$direccionBaseDeDatos,":descripcion"=>$descripcion,
            ":fechaHoraExpiracion"=>$fechaHoraExpiracion,":tipoConvocatoria"=>$tipoConvocatoria,":departamento"=>$departamento,":gestion"=>$gestion,":autor"=>$autor));
            $sentenceSQL->closeCursor();
            return $resultado;
        }
        public function actualizarConvocatoria($id,$titulo,$descripcion,$enlace,$fechaActual,$tipoConvocatoria,$departamento,$gestion,$FechaHoraExpiracion){
            $sql= "UPDATE convocatoria set titulo= :tit,descripcion_convocatoria= :descr,direcccion_pdf= :enlace,fecha=:fechActual,tipo_convocatoria=:tipConvo,departamento= :depar,gestion= :ges,fecha_expiracion=:fechExp WHERE id_convocatoria= :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $resultado=$sentenceSQL->execute(array(":tit"=>$titulo,":descr"=>$descripcion,":enlace"=>$enlace,":fechActual"=>$fechaActual,":tipConvo"=>$tipoConvocatoria,
            ":depar"=>$departamento,":ges"=>$gestion,"fechExp"=>$FechaHoraExpiracion,":id"=>$id));
            $sentenceSQL->closeCursor();
            return $resultado;
        }

        public function eliminarConvocatoria($id){
            $sql="UPDATE convocatoria SET activo=false WHERE id_convocatoria= :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":id"=>$id));
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
        }
    }
    
?>