<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidad Mayor de San simon</title>
    <link rel="stylesheet" href="style/bootstrap.css">
    <link rel="stylesheet" href="style/myStyle.css">
</head>
<body>
    <?php
        if(isset($_GET['error'])){
            echo "<script>";
            echo    "alert('Error al autentificar');";
            echo "</script>";
        }
    ?>
    <?php include("plantillas/header.php");?>   
    <section>
        <div class="d-block w-75 mx-auto">
            <h2 class="text-center" >Publicaciones de Convocatorias</h2>
            <?php
                date_default_timezone_set('America/La_Paz');
                $fechaActual=date("Y-m-d H:i:s");
                include_once("modelo/convocatoria.php");
                $convocatoria= new  Convocatoria();
                $consulta=$convocatoria->mostrarConvocatoriaFechaAscendente($fechaActual);
                foreach($consulta as $elemento){
                    echo "<h2>".$elemento['titulo']."</h2>";
                    echo "<h5>Descripcion del documento</h5>";
                    echo "<h6>".$elemento['descripcion_convocatoria']."</h6>";
                    echo "<a href='".$elemento['direcccion_pdf']."' target='_blank' >Abrir archivo ".$elemento['titulo']."</a>";
                    echo "<p class='float-right'>".$elemento['fecha']."</p>";
                    echo "<hr>";
                }
                $convocatoria->cerrarConexion();
                
            ?>
        </div>
    </section>
    <?php include("plantillas/footer.php");?>
</body>
</html>
