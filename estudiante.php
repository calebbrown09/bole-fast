<?php

session_start();

include("app/backend/config/config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == null) {
    print "<script>window.location='home';</script>";
}

$found = false;
$sql1 = "select * from usuarios where id_rol=\"2\" AND id=\"$_SESSION[user_id]\"";
$query = $con->query($sql1);
while ($r = $query->fetch_array()) {
    $found = true;
    break;
}
if ($found) {
} else {
    print "<script>window.location='home';</script>";
}

$sql_db_user = "SELECT * from usuarios WHERE id = '$_SESSION[user_id]'";
$result = mysqli_query($con, $sql_db_user);
while ($admin = mysqli_fetch_array($result)) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Buscador de Estudiantes | BoleFast</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/jumbotron/">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <link href="app/public/css/jumbotron.css" rel="stylesheet">
    </head>

    <body>
        <?php include("app/backend/helper/nav.php"); ?>

        <main role="main">
            <?php

            $cedula = base64_decode($_GET['c']);


            $found = false;
            $sql1 = "select * from boletines where num_cedula=\"$cedula\" AND colegio=\"$admin[colegio]\"";
            $query = $con->query($sql1);
            while ($r = $query->fetch_array()) {
                $found = true;
                break;
            }
            if ($found) {



                $sql_db_user = "SELECT * from usuarios WHERE num_cedula = '$cedula'";
                $result = mysqli_query($con, $sql_db_user);
                while ($app = mysqli_fetch_array($result)) {


            ?>
                    <!-- Main jumbotron for a primary marketing message or call to action -->
                    <div class="jumbotron" style="background: #0278ae; color: white; ">
                        <div class="container">
                            <h1 class="display-3" style="font-size: 30px; font-weight: bold;">Estudiante <?php echo $app['nombre_completo']; ?></h1>
                            <small>Cédula: <?php echo $app['num_cedula']; ?></small>
                        </div>
                    </div>
                    <div class="container">
                        <h1 class="display-3" style="font-size: 25px;">Boletines del estudiante</h1>

                        <br><br>
                        <?php



                        $sql_db_user = "SELECT * from boletines WHERE num_cedula = '$cedula' AND colegio = '$admin[colegio]'";
                        $result = mysqli_query($con, $sql_db_user);
                        while ($boletin = mysqli_fetch_array($result)) {

                            $cedula_encript = base64_encode($boletin['num_cedula']);

                        ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <h2 style="font-size: 30px; font-weight: bold;">Boletín del trimestre <?php echo $boletin['trimestre']; ?></h2>
                                    <p><a class="btn btn-primary" href="app/backend/documents/<?php echo $boletin['boletin']; ?>" download role="button">Descargar boletín</a>
                                        <?php

                                        if ($boletin['activo'] == 1) {




                                        ?>
                                            <a href="app/backend/process/eliminar_boletin?id=<?php echo $boletin['id'] . "&student=" . $_GET['c'] ?>">
                                                <button type="button" class="btn btn-warning">Desactivar Boletín</button>
                                            </a>
                                        <?php    } else { ?>
                                            <a href="app/backend/process/eliminar_boletin?id=<?php echo $boletin['id'] . "&student=" . $_GET['c'] . "&reactivar=1" ?>">
                                                <button type="button" class="btn btn-success">Reactivar Boletín</button>
                                            </a>
                                        <?php }  ?>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                            Eliminar boletín
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">¿Quieres elminiar este boletín?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Al eliminar este boletín ya no podrá recuperarlo, nosotros te recomendamos en desactivar el boletín. Esta acción no tiene retroceso, ya eliminado el boletín no se podrá recuperar.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                                                        <a href="app/backend/process/eliminar?id=<?php echo $boletin['id'] . "&student=" . $boletin['num_cedula']; ?>">
                                                            <button type="button" class="btn btn-secondary">Eliminar boletín</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </p>
                                </div>
                            </div>

                            <hr>
                    <?php
                        }
                    } ?>
                    </div>
                <?php } else {

                $found = false;
                $sql1 = "select * from usuarios where num_cedula=\"$cedula\" AND colegio=\"$admin[colegio]\"";
                $query = $con->query($sql1);
                while ($r = $query->fetch_array()) {
                    $found = true;
                    break;
                }
                if ($found) {
                    echo '
                <div class="jumbotron" style="background: #ffd571; color: white;">
                    <div class="container">
                        <h1 class="display-3" style="font-size: 30px; font-weight: bold;">El estudiante que buscó no tiene boletines disponibles</h1>
                        <a href="browser"><button type="button" class="btn btn-success">Buscar nuevo estudiante</button></a>
                    </div>
                </div>
                <div class="container">
                <div class="alert alert-success" role="alert">
                <h4 class="alert-heading"><strong>¿Piensas que es un error?</strong></h4>
                <p>El estudiante con cédula <strong>' . $cedula . '</strong> no tiene un boletín registrado en nuestras bases de datos, si piensas que es un error puede enviarnos un correo a <strong>quejas@eddukate.org</strong>. Si requiere puede enviar el boletín nuevamente en el botón de abajo.</p>
                <hr>
                <p class="mb-0">Enviar el boletín nuevamente 
                <a href="admin?c='. $_GET['c'] .'">
                <button type="button" class="btn btn-primary btn-sm">Enviar nuevamente el boletín</button>
                </a>
                </p>
                </div>
                </div>
                
                ';
                } else {
                    echo ' 
                <div class="jumbotron" style="background: #EC3636; color: white;">
                    <div class="container">
                        <h1 class="display-3" style="font-size: 30px; font-weight: bold;">El estudiante que buscó no existe en nuestro registros.</h1>
                        <a href="browser"><button type="button" class="btn btn-success">Buscar nuevo estudiante</button></a>
                    </div>
                </div>';
                }
            } ?>
    </body>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>

    </html>
<?php
} ?>