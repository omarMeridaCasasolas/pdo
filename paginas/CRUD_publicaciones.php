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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style/bootstrap.css">
    <link rel="stylesheet" href="../style/myStyle.css">
    <style type="text/css">
        #nuevaConvocatoria:link
        {
        text-decoration:none;
        }
    </style>
        <script src="https://kit.fontawesome.com/d848ccec99.js" crossorigin="anonymous"></script> 
</head>

<body>
    <header class="bg-info w-100 p-4">
        <h3 class="font-italic"><i class="fas fa-users"></i>  
            <?php
                
                /////////////////////
                if(isset($_SESSION['sexoUsuario'])){
                    $sexo=$_SESSION['sexoUsuario'];
                    if($sexo=="Hombre"){
                        echo "Bienvenido ";
                        if(isset($_SESSION['cargoUsuario'])){
                            $cargo=$_SESSION['cargoUsuario'];
                            if($cargo=="Administrador"){
                                echo "Administrador ";
                            }else{
                                if($cargo=="Secretaria"){
                                    echo "Secretario ";
                                }
                            }
                        }
                    }else{
                        echo "Bienvenida ";
                        if(isset($_SESSION['cargoUsuario'])){
                            $cargo=$_SESSION['cargoUsuario'];
                            if($cargo=="Administrador"){
                                echo "Administradora ";
                            }else{
                                if($cargo=="Secretaria"){
                                    echo "Secretaria ";
                                }
                            }
                        }
                    }
                }else{
                    echo "Bienvenid@";
                }            
            echo $_SESSION['sesion'];     
            
            $extension=" ";
            if($_SESSION['bandera']){
                $extension="asc";
                $_SESSION['bandera']=false;
            }else{
                $extension="  ";
                $_SESSION['bandera']=true;
            }       

            ?>
        </h3>        
        <a href="../paginas/cambiarEmailPassword.php" class="float-right text-dark">Cambiar Contraseña y/o Password</a>
        <br>
        <a href="../formularios/form_cerrarSession.php" class="float-right text-dark">cerrar session</a>
    </header>
    <?php
                if(isset($_GET['tit']) && isset($_GET['color'])){ ?>

                    <div class="container w-50 pt-2">
                        <div class='alert alert-<?php echo $_GET['color'];?>  alert-dissmisible fade show' role='alert'>
                            <?php echo $_GET['tit'];?>
                            <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>
            
                        </div>
                    </div>
                <?php
            }?>
    <main class='container w-75 mt-2'>
          <div class='table-responsive'>
            <table class='table table-hover'>
                <h4>Lista de convocatoria</h4>
                <a href='crearPublicacion.php' class='btn btn-success p-2 rounded-lg m-2' id='nuevaConvocatoria'>Crear nueva convocatoria</a>
                    <thead class='bg-primary'>
                        <tr>
                            <th><a href="CRUD_publicaciones.php?convocatoria=<?php echo $extension ?>" class="btn btn-dark">Convocatoria &#8597;</a></th>
                            <th><a href="CRUD_publicaciones.php?autor=<?php echo $extension ?>" class="btn btn-dark">Autor &#8597;</a></th>
                            <th><a href="CRUD_publicaciones.php?fecha=<?php echo $extension ?>" class="btn btn-dark">Fecha de creacion &#8597;</a></th>
                            <th>PDF</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    require_once("../modelo/convocatoria.php");
                    $convocatoria = new Convocatoria();
                    $resultado=$convocatoria->mostrarTodasConvocatoriaFechaAscendente(); 
                    if(isset($_GET['fecha'])){
                        $fecha=$_GET['fecha'];
                        if($fecha=='asc'){
                            $resultado=$convocatoria->mostrarTodasConvocatoriaFechaDescendente(); 
                        }else{
                            $resultado=$convocatoria->mostrarTodasConvocatoriaFechaAscendente(); 
                        }
                    }
                    if(isset($_GET['convocatoria'])){
                        $myConvocatoria=$_GET['convocatoria'];
                        if($myConvocatoria=='asc'){
                            $resultado=$convocatoria->mostrarTodasConvocatoriaNombreDescendente(); 
                        }else{
                            $resultado=$convocatoria->mostrarTodasConvocatoriaNombreAscendente(); 
                        }
                    }
                    if(isset($_GET['autor'])){
                        $autor=$_GET['autor'];
                        if($autor=='asc'){
                            $resultado=$convocatoria->mostrarTodasConvocatoriaAutorDescendente();
                        }else{
                            $resultado=$convocatoria->mostrarTodasConvocatoriaAutorAscendente();
                        }
                    }
                    foreach($resultado as $elemento){                
                            echo "<tr>";
                            echo    "<td><h6>".$elemento['titulo']."</h6>Expiracion:".$elemento['fecha_expiracion']."</td>";
                            echo    "<td><h6>".$elemento['creador']."</h6></td>";      
                            echo    "<td><h6>".$elemento['fecha']."</h6></td>";
                            echo    "<td>";
                            echo        "<a  href='".$elemento['direcccion_pdf']."' target='_blank'>Abrir ".$elemento['titulo']."</a>";
                            echo    "</td>";
                            echo    "<td>";
                            echo        "<a href='../formularios/form_eliminarConvocatoria.php?id=".$elemento['id_convocatoria']."'  class='btn btn-danger' title='Eliminar'><i class='fas fa-trash-alt'></i></a>
                                        <a href='editarConvocatoria.php?id=".$elemento['id_convocatoria']."' class='btn btn-primary' title='Editar'><i class='fas fa-edit'></i></a>
                                </td>
                            </tr>";
                        }
                    echo "</tbody>
                </table>
        </div>
    </main>";
    ?>

    <footer class="pieIndice">
        <div class="text-center">
            <h6 class="d-inline-block">Contacto: <a href="">correo_del_Administardor@mail.com ,</a> <a href="">  correo_de_la_Empresa@mail.com</a></h6>
            <h6 class="d-inline-block">Telefono: (+591) 72584871 Administrador, (+591) 77581871 Secretaria</h6 >
        </div>
        <div class="text-center">
            <h6>Sitios Relacionados : 
                <a href="http://www.umss.edu.bo/">UMSS</a>
                <a href="http://websis.umss.edu.bo/"> | WEBSISS</a>
                <a href="https://www.facebook.com/UmssBolOficial"> | facebook</a>
                <a href="https://twitter.com/UmssBolOficial"> | Twitter</a>
                <a href="https://www.instagram.com/umssboloficial/"> | Instagram</a>
                <a href="https://www.linkedin.com/school/universidad-mayor-de-san-simon/"> | Linkedin</a>
                <a href="https://www.youtube.com/universidadmayordesansimon"> | Youtube</a>                
            </h6>
        </div>
        <div class="text-center">
            <h6>Derechos Reservados © 2020 · Universidad Mayor de San Simón.</h6>
        </div>
    </footer>
</body>

</html>