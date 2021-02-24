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
            <div class="jumbotron" style="background: #77d8d8; color: white;">
                <div class="container">
                    <h1 class="display-3" style="font-size: 30px; font-weight: bold;">Hola, <?php echo $app['nombre_completo']; ?> </h1>
                    <p style="font-size: 20px;">Bienvenido al sistema administrativo de boletín de <b><?php echo $app['colegio']; ?></b>.</p>
                </div>
            </div>
            <?php





            ?>
            <div class="container">
             <?php

                if (isset($_GET['c'])) {
                    $cedula_estudiante = base64_decode($_GET['c']);
                    echo '<div class="alert alert-info" role="alert">
                            Le estas volviendo a enviar el boletín al estudiante con cédula <strong>' . $cedula_estudiante . '</strong>
                         </div>';
                }

                ?>
                <?php if (!isset($_GET['c'])) { ?>
                    <div class="card">
                        <div class="card-body">
                            Enviar boletín a un Estudiante
                            <br><br>
                            <form action="app/backend/process/enviar_documento.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cedula del estudiante</label>
                                    <input type="text" class="form-control" id="cedula" name="cedula" aria-describedby="emailHelp" placeholder="Ingresar cedula del estudiante" required>
                                    <small id="emailHelp" class="form-text text-muted">El número de cedula con guiones Ejemplo: 3-123-345</small>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">El archivo</label>
                                        <input type="file" class="form-control-file" id="files" name="files" required>
                                        <small id="emailHelp" class="form-text text-muted">Se admiten archivos con extensión PDF, DOC, DOCX, PNG, JPG, JPGE</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Trimestre</label>
                                    <select id="trimestre" name="trimestre" class="form-control">
                                        <option selected value="1">Primer trimestre</option>
                                        <option selected value="2">Segundo trimestre</option>

                                    </select>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Enviar boletín</button>
                            </form>
                        </div>

                    </div>
                <?php } else { ?>
                    <div class="card">
                        <div class="card-body">
                            Enviar boletín a un Estudiante
                            <br><br>
                            <form action="app/backend/process/enviar_documento.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cedula del estudiante</label>
                                    <input type="text" class="form-control" id="cedula" name="cedula" aria-describedby="emailHelp" value="<?php echo $cedula_estudiante; ?>" placeholder="Ingresar cedula del estudiante" required>
                                    <small id="emailHelp" class="form-text text-muted">El número de cedula con guiones Ejemplo: 3-123-345</small>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">El archivo</label>
                                        <input type="file" class="form-control-file" id="files" name="files" required>
                                        <small id="emailHelp" class="form-text text-muted">Se admiten archivos con extensión PDF, DOC, DOCX, PNG, JPG, JPGE</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Trimestre</label>
                                    <select id="trimestre" name="trimestre" class="form-control">
                                        <option selected value="1">Primer trimestre</option>
                                        <option selected value="2">Segundo trimestre</option>

                                    </select>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Enviar boletín</button>
                            </form>
                        </div>

                    </div>
                <?php }  ?>
            </div> <!-- /container -->


        </main>
        <br><br><br>
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