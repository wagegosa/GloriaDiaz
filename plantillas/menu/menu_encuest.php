<?php  
if(empty($_SESSION['active'])){
  header('location: ./');
}
?>
<div class="pos-f-t">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="">Encuestas</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav">
        <!-- asistencias -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Asistencias  </a>
            <ul class="dropdown-menu">
              <li><a href="index.php">Nueva</a></li>
            </ul>
        </li>
        <!-- Reuniones -->
        <li class="nav-item dropdown">
        </li>
        <!-- usuarios -->
        <li class="nav-item dropdown">
        </li>
        <!-- Perfil -->
        <li class="nav-item dropdown">
        </li>
        <!-- Reporte -->
        <li class="nav-item dropdown">
        </li>
        <li class="nav-item dropdown">
        </li>
        <li class="nav-item dropdown">
        </li>
        <li class="nav-item dropdown">
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['usuario']; ?>  </a>
          <ul class="dropdown-menu">
            <li><a href="../config/General/salir.php">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</div>