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
            <li><a href="../../admin/asistentes/Con_Asistencia.php
              ">Consulta</a></li>
            <li><a href="../../admin/asistentes/index.php">Nueva</a></li>
          </ul>
        </li>
        <!-- Reuniones -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Reuniones  </a>
            <ul class="dropdown-menu">
              <li><a href="../../admin/reunion/index.php">Consultar</a></li>
              <li><a href="../../admin/reunion/New_Reunion.php">Nueva</a></li>
              <!-- <li><a href="../reunion/">Reporte</a></li> -->
            </ul>
        </li>
        <!-- usuarios -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Usuarios  </a>
            <ul class="dropdown-menu">
              <li><a href="../../admin/usuarios/index.php">Consulta</a></li>
              <li><a href="../../admin/usuarios/New_usuario.php">Nuevo</a></li>
            </ul>
        </li>
        <!-- Perfil -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Perfil  </a>
            <ul class="dropdown-menu">
              <li><a href="../../admin/perfil/index.php">Consulta</a></li>
              <li><a href="../../admin/perfil/New_Perfil.php">Nuevo</a></li>
            </ul>
        </li>
        <!-- Reporte -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Reporte  </a>
          <ul class="dropdown-menu">
            <li><a href="../../admin/exportar/index.php">Generar Reportes</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- usuario -->
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['usuario']; ?>  </a>
          <ul class="dropdown-menu">
            <li><a href="../../config/General/salir.php">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</div>