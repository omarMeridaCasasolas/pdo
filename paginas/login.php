<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidad Mayor de San simon</title>
    <link rel="stylesheet" href="../style/bootstrap.css">
    <link rel="stylesheet" href="../style/myStyle.css">
</head>
<body>
    <?php
        if(isset($_GET['dato'])){
            $valor=$_GET['dato'];
            echo "<script>";
            if($valor=='x'){
            echo    "alert('Se ha enviado su contraseña a su correo');";
            }else{
                if($valor=='y'){
                    echo  "alert('Usuario no encontrado');";
                }else{
                    echo  "alert('Error al  evaluar la sentencia');";
                }
            }
            echo "</script>";
        }
    ?>
    <?php include("../plantillas/header.php");?>

<!-- Login -->
    <div class="overlay" id="overlay">
            <div id="formReenvio">
                <form action="../formularios/form_enviarEmail.php" method="post">
                    <a href="" class="float-right m-2">Cancelar</a>
                    <br>
                    <h2>Formulario de Reenvio</h2>
                    <label class="d-block mx-auto" for="reenvio_Pass">Correo Electronico: <input class="p-2 font" type="email" name="reenvio_Pass" id="reenvio_Pass" required placeholder="ejemplo@gmail.com"></label>
                    <label class="d-block mx-auto" for="catcha"><input type="text" name="" id="catcha"></label>
                    <input class="d-block my-2 mx-auto btn btn-primary" type="submit" value="Reenviar">
                </form>
            </div>
        </div>

    <section class="principal">
        <div class="border border-dark bg-success w-50 mx-auto my-5 p3">
            <form action="../formularios/form_VerificarUsuario.php" method="post" class="rounded-sm">
                <label class="font-italic d-block p-1" for="loginCorreo">Correo Electronico</label>
                <input class="font-italic h4 d-block w-75 mx-auto p-2 rounded-sm" type="mail" name="IdUsuaario" id=""  autocomplete='off' id="loginCorreo" placeholder="Ejemplo@gmail.com">
                <label class="font-italic d-block p-1" for="loginPass"> Contraseña</label>
                <input class="font-italic h4 d-block w-75 mx-auto p-2 rounded-sm" type="password" name="IdPassword" id="loginPass"  pattern="[a-zA-Z0-9]{4,15}" placeholder="****************" autocomplete='off'>
                <input type="submit" value="Entrar" class="btn btn-primary d-block mx-auto my-3">
                <!--<a class="text-dark m-2" href="" id="btnSend">Reenviar contraseña a tu correo</a>   pattern="^[a-z0-9_-]{3,30}-->
            </form>
            <a class="text-dark m-2" href="#" id="btnSend">Reenviar contraseña a tu correo</a>
            <!--<button class="bg-success"id="btnSend">Reenviar contraseña a tu correo</button>-->
        </div>
    </section>
    <?php include("../plantillas/footer.php");?>
    <script src="../style/MyScript.js"></script>
</body>
</html>
