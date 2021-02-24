<?php

session_start();

include("app/backend/config/config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == null) {
    print "<script>window.location='/';</script>";
}

$sql_db_user = "SELECT * from usuarios WHERE id = '$_SESSION[user_id]'";
$result = mysqli_query($con, $sql_db_user);
while ($app = mysqli_fetch_array($result)) {


?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

        <title>BoleFast - Sistema de boletín de Eddukate</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/jumbotron/">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <link href="app/public/css/jumbotron.css" rel="stylesheet">
    </head>

    <body style="font-family: Poppins;">

        <?php include("app/backend/helper/nav.php"); ?>

        <main role="main">

            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron" style="background: #4cbbb9; color: white;">
                <div class="container">
                    <h1 class="display-3" style="font-size: 30px; font-weight: bold;">Hola, <?php echo $app['nombre_completo']; ?> </h1>
                    <small>Cédula: <?php echo $app['num_cedula']; ?></small>
                    <p style="font-size: 20px;">Bienvenido al sistema de boletín de <b><?php echo $app['colegio']; ?></b> cuando tu boletín este disponible <br> podrás descargar el boletín cuando quieras y donde quieras.</p>
                </div>
            </div>
            <?php





            ?>
            <div class="container">
            <!-- Anuncios 
            <div class="alert alert-primary" role="alert">
            <strong>Anuncio:</strong> Estamos trabajando para poder brindarles nuestros servicios a la mayor cantidad de colegios posibles.
            </div>
            -->
            <!-- Boletin disponible  -->


                <?php

                $found = false;
                $sql1 = "select * from boletines where num_cedula=\"$app[num_cedula]\"";
                $query = $con->query($sql1);
                while ($r = $query->fetch_array()) {
                    $found = true;
                    break;
                }
                if ($found) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Tu boletín ya está disponible,</strong> puedes descargarlo ahora mismo.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Tu boletín aún no se encuentra disponible,</strong> regresa más tarde.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                }
                ?>

                <br>
                <?php
                // si el usuario esta registrado en el curso, que no se vuelva a registrar.

                $sql_db_user = "SELECT * from boletines WHERE num_cedula = '$app[num_cedula]'";
                $result = mysqli_query($con, $sql_db_user);
                while ($boletin = mysqli_fetch_array($result)) {



                ?>
                    <!-- Example row of columns -->
                    <div class="row">
                        <div class="col-md-6">
                            <h2 style="font-size: 30px; font-weight: bold;">Boletín del <?php if($boletin['trimestre'] == 1) { echo "Primer trimestre"; } else { if($boletin['trimestre'] == 1){echo "Segundo trimestre";} }?></h2>
 <?php

                            if ($boletin['activo'] == 1) {

                            ?>
                                <p><a class="btn btn-primary" href="app/backend/documents/<?php echo $boletin['boletin']; ?>" download role="button">Descargar boletín</a></p>
                            <?php } else { ?>
                                <a class="btn btn-secondary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Boletín desactivado
                                </a>
                                <br>
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                       Por alguna razón algún personal administrativo de tu colegio ha desactivado tu boletín, si piensas que es un error envianos tu queja a <strong>quejas@eddukate.org</strong>
                                    </div>
                                </div>
                            <?php } ?>                        </div>
                    </div>

                    <hr>
                <?php } ?>

            </div> <!-- /container -->

        </main>

        <footer class="container">
            <p>Todos los derechos reservados a The Brown Companies 2019-2020</p>
        </footer>

        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script>
            window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
        </script>
        <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
        <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
    <?php
}     ?>
    </body>

    </html>