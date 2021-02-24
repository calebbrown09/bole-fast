<?php


include "app/backend/config/config.php";


if (!isset($_SESSION['user_id'])) {
  session_start();
  if (isset($_SESSION['user_id'])) {
    $sql_db_user = "SELECT * from usuarios WHERE id = '$_SESSION[user_id]'";
    $result = mysqli_query($con, $sql_db_user);
    while ($app = mysqli_fetch_array($result)) {

      switch ($app['id_rol']) {
        case '1':
          print "<script>window.location='https://bolefast.eddukate.org/home';</script>";
          break;
        case '2':
          print "<script>window.location='https://bolefast.eddukate.org/admin';</script>";
          break;
        default:
          # code...
          break;
      }
    }
  }
} else {
}



?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

  <title>BoleFast - Sistema de Boletines de Eddukate</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="https://getbootstrap.com/docs/4.0/examples/floating-labels/floating-labels.css" rel="stylesheet">
</head>

<body style="font-family: Poppins; background: #0779e4; color: white;">
  <form class="form-signin" method="POST" action="app/backend/process/login.php">
    <div class="text-center mb-4">
      <h1 class="h3 mb-3 font-weight-bold" style="font-size: 40px;">BoleFast</h1>
    </div>

    <div class="form-group">
      <input type="text" id="cedula" name="cedula" class="form-control" placeholder="Número de cédula" required>
    </div>

    <div class="form-group">
      <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
    </div>

    <button class="btn btn-lg btn-warning btn-block" type="submit" style="color: white;">Ingresar</button>
    <br>
    <small><a href="register" style="text-decoration: none; color: #a6dcef; font-size: 15px;">¿Aún no tienes tu cuenta? Registrate aquí</a></small>
    <br><br>
    <div class="alert alert-success" role="alert">
  Yuju! Registra tu colegio desde: <strong>colegios@eddukate.org</strong>
</div>
    <p class="mt-5 mb-3 text-center" style="color: white;">&copy; The Brown Companies 2019-2020</p>
  </form>
</body>

</html>