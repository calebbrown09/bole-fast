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

            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron" style="background: #77d8d8; color: white;">
                <div class="container">
                    <h1 class="display-3" style="font-size: 30px; font-weight: bold;">Buscador de Estudiantes</h1>
                    <form method="POST" action="app/backend/process/browser">
                        <div class="form-group">
                            <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cédula del estudiante" required>
                            <small>El número de cédula con guiones Ejemplo: 3-000-0000</small>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Buscar estudiante</button>
                    </form>
                </div>
    </body>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>


    </html>
<?php } ?>