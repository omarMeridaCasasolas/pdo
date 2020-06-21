<?php
    session_start();
    $var=$_SESSION['sesion'];
    if($var == null || $var = '' ){
        echo "Erro al autentificar";
        header("Location:index.php?error=x");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/bootstrap.css">
    <link rel="stylesheet" href="../style/myStyle.css">
    <script src="https://kit.fontawesome.com/d848ccec99.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        if(isset($_GET['problem'])){
            $valor=$_GET['problem'];
            echo "<script>";
            if($valor=='x'){
                echo  "alert('La contraseñas deben concidir para procesar la informacion');";
            }
            echo "</script>";
        }
    ?>

    <header class="bg-info w-100 p-4">
                <h3 class="font-italic"><i class="fas fa-users"></i>  
                <?php
                    if(isset($_SESSION['sexoUsuario'])){
                        $sexo=$_SESSION['sexoUsuario'];
                        if($sexo=="Hombre"){
                            if(isset($_SESSION['cargoUsuario'])){
                                $cargo=$_SESSION['cargoUsuario'];
                                if($cargo=="Administrador"){
                                    echo "Administrador ";
                                }else{
                                    if($cargo=="Secretaria"){
                                        echo "Secretario ";                                       
                                    }else{
                                        echo "Usuario ";
                                    }
                                }
                            }
                        }else{
                            if(isset($_SESSION['cargoUsuario'])){
                                $cargo=$_SESSION['cargoUsuario'];
                                if($cargo=="Administrador"){
                                    echo "Administradora ";
                                }else{
                                    if($cargo=="Secretaria"){
                                        echo "Secretaria ";
                                    }
                                    else{
                                        echo "Usuaria ";
                                    }
                                }
                            }
                        }
                    }
                    echo $_SESSION['sesion']; 
                    ?>
                
                </h3>
                <a href="CRUD_publicaciones.php" class="float-right text-dark">Convocatorias</a>
                <br>
                <a href="../formularios/form_cerrarSession.php" class="float-right text-dark">cerrar session</a>
        </header>

    <form action="../formularios/form_actualizarDatos.php" method="post" class="container w-50 p-3 my-5 bg-dark text-white md w-75 sm w-100 ">
        <h1 class="text-center">Editar datos de Usuario</h1>
        <div class="form-group mx-5">
            <label for="nuevoCorreo">Escriba su nuevo correo electronico: </label>
            <input class="form-control" type="email" name="nuevoCorreo" id="nuevoCorreo" value="<?php echo $_SESSION['correo'];?>">
        </div>
        <div class="form-group mx-5">
            <label for="numeroTelefonico">Escriba su nuevo numero telefonico: </label>
            <input class="form-control" pattern="[0-9]{7,8}" title="Ingrese un numero de celular o telefono valido" type="text" name="numeroTelefonico" id="numeroTelefonico" value="<?php echo $_SESSION['telefono'];?>">
        </div>

        <div class="from-group mx-5">
            <label for="nuevoPassword">Escriba su nueva contraseña: </label>
            <input class="form-control" type="password" pattern="[a-zA-Z0-9]{4,15}" name="nuevoPassword" id="nuevoPassword" value="<?php echo $_SESSION['passoword'];?>">
        </div>
        <div class="form-group mx-5">
            <label for="copiaNuevoPassword">Reescriba su nueva contraseña: </label>
            <input class="form-control" type="password" pattern="[a-zA-Z0-9]{4,15}" name="copiaNuevoPassword" id="copiaNuevoPassword" value="<?php echo $_SESSION['passoword']?>">
        </div>
        <div class="row justify-content-center">    
            <input class="btn btn-primary mr-2" type="submit" value="ActualizarDatos" >
            <a class="btn btn-danger ml-2" href="CRUD_publicaciones"> Cancelar</a>
        </div>
    </form>
</body>
</html>