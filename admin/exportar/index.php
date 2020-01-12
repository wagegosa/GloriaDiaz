<?php 
  session_start();
  require "../../config/General/connexion.php";
?>
<!DOCTYPE html>
<html lang="es" ng-app> 

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Bootstrap núcleo CSS-->
  <link rel="stylesheet" media="screen" href="../../css/assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" media="screen" href="../../css/assets/bootstrap/css/bootstrap.min.css">
  <!--Biblioteca de iconos monocromáticos y símbolos-->
  <link rel="stylesheet" href="../../css/assets/bootstrap/fonts/glyphicons-pro/css/glyphicons-pro.css">
  <link rel="stylesheet" href="../../css/assets/bootstrap/fonts/font-awesome/css/font-awesome.min.css">
  <!-- iconos extras -->
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <!--Paginación, filtrado de registros-->
  <link rel="stylesheet" href="../../css/assets/footable/css/footable.bootstrap.min.css">
  <title>Reportes</title>
</head>
<body>
  <div class="container">
    <?php   include "../../plantillas/menu/menu_admin2.php"; ?>
    <div class="row">
      <div class="col-md-12">
        <h3 class="page-header"><span class="glyphicon glyphicon-save"></span> Reportes</h3>
        <ol class="breadcrumb">
          <li><a href="">Inicio</a></li>
          <li><a href="">Reportes</a></li>
          <li class="active">Generar Reporte</li>
        </ol>
      </div>
    </div>
    <h3 class="page-header"><span class="glyphicons glyphicons-group"></span> Por Reunión</h3>
    <!-- exportar por fachas -->
    <form method="post" autocomplete="off" id="frm" action="../../admin/exportar/exportar.php">
      <div class="row">
        <div class="col-md-2">
          <label for="fecha_inicial">Fecha Inicial:</label>
        </div>
        <div class="col-md-2">
          <input type="date" class="form-control" name="fecha_inicial" rows="5" id="fecha_inicial" >
          <span class="help-block" id="error"></span>
        </div>
        <div>
          <button type="submit" class="btn btn-success btn-lg btn-block"><i class='fas fa-file-excel' style='font-size:20px;color:white'></i> Exportar</button>
        </div>
      </div>
    </form>
  </div>
  <div class="container"><br>
    <form method="post" autocomplete="off" id="frm" action="../../admin/exportar/exportar_total.php">
      <!-- Exportar total  Reunión-->
      <div class="row">
        <div class="col-md-4">
          <label for="email">Todo:</label>
        </div class="col-md-8">
        <div>
          <button type="submit" class="btn btn-success btn-lg btn-block"><i class='fas fa-file-excel' style='font-size:20px;color:white'></i> Exportar</button>
        </div>
      </div>
    </form>
  </div>
  <div class="container">
    <h3 class="page-header"><span class="glyphicon glyphicon-briefcase"></span> Por Empresas</h3>
    <!-- Exportar por fechas empresas -->
    <form method="post" autocomplete="off" id="frm" action="../../admin/exportar/exportarEmpresa.php">
      <div class="row">
        <div class="col-md-2">
          <label for="fecha_inicial">Fecha Inicial:</label>
        </div>
        <div class="col-md-2">
          <input type="date" class="form-control" name="fecha_inicial" rows="5" id="fecha_inicial" >
          <span class="help-block" id="error"></span>
        </div>
        <div>
          <button type="submit" class="btn btn-success btn-lg btn-block"><i class='fas fa-file-excel' style='font-size:20px;color:white'></i> Exportar</button>
        </div>
      </div>
    </form>
  </div>
  <!-- Exportar total empresas -->
  <div class="container"><br>
    <form method="post" autocomplete="off" id="frm" action="../../admin/exportar/exportar_total_empresa.php">
      <div class="row">
        <div class="col-md-4">
          <label for="email">Todo:</label>
        </div class="col-md-8">
        <div>
          <button type="submit" class="btn btn-success btn-lg btn-block"><i class='fas fa-file-excel' style='font-size:20px;color:white'></i> Exportar</button>
        </div>
      </div>
    </form>
  </div>
  <!-- LIBRERIAS validadoras-->
  <script src="../../css/assets/js/plugins/jquery/jquery-3.2.1.min.js"></script>
  <script src="../../css/assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- Plugin para la validación de formularios -->
  <script src="../../css/assets/jquery_validation/dist/jquery.validate.min.js"></script>
  <script src="../../css/assets/jquery_validation/dist/localization/messages_es.js"></script>
  <!-- Plugin para listado, navegación y filtrado en tablas -->
  <script src="../../css/assets/footable/js/footable.min.js"></script>
  <script src="../../css/assets/footable/js/configTable.js"></script>
    <script>
    $(document).ready(function() {
      $("#frm").validate({
        rules: {
          pregunta: {required: true, minlength: 2, maxlength: 255},
          estado: { required: true},
        }
      })
    });
  </script>
</body>
</html>