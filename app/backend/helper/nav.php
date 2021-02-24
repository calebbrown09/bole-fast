<nav class="navbar navbar-expand-md navbar-dark fixed-top " style="background: #0779e4;">
  <a class="navbar-brand" href="home" style="font-weight: bold;">BoleFast</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home">Inicio</a>
      </li>
      <?php if($app['id_rol'] == 2) { ?>
      <li class="nav-item active">
        <a class="nav-link" href="browser">Buscador de estudiantes</a>
      </li>
      <?php } ?>
    </ul>
    <a href="https://bolefast.eddukate.org/app/backend/process/logout.php">
      <button class="btn btn-info btn-sm" type="button">Cerrar sesión</button>
    </a>
  </div>
</nav>