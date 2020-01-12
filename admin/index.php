<!DOCTYPE html>
<html lang="es" ng-app> 

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Bootstrap núcleo CSS-->
  <link rel="stylesheet" media="screen" href="../css/assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" media="screen" href="../css/assets/bootstrap/css/bootstrap.min.css">
  <!--Biblioteca de iconos monocromáticos y símbolos-->
  <link rel="stylesheet" href="../css/assets/bootstrap/fonts/glyphicons-pro/css/glyphicons-pro.css">
  <link rel="stylesheet" href="../css/assets/bootstrap/fonts/font-awesome/css/font-awesome.min.css">
  <!--Paginación, filtrado de registros-->
  <link rel="stylesheet" href="../css/assets/footable/css/footable.bootstrap.min.css">
  <title>Reuniones</title>
</head>
<body>
  <div class="container">
    <?php   include "../plantillas/menu/menu_admin.php"; ?>
    <div class="row">
      <div class="col-md-12">
        <h3 class="page-header"><span class="glyphicons glyphicons-group"></span> Asistentes</h3>
        <ol class="breadcrumb">
          <li><a href="">Inicio</a></li>
          <!-- <li><a href="Con_Asistencia.php">Asistentes</a></li>
          <li class="active">Nuevo Asistente</li> -->
        </ol>
      </div>
    </div>
  </div>
  <!-- LIBRERIAS validadoras-->
  <script src="../css/assets/js/plugins/jquery/jquery-3.2.1.min.js"></script>
  <script src="../css/assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- Plugin para la validación de formularios -->
  <script src="../css/assets/jquery_validation/dist/jquery.validate.min.js"></script>
  <script src="../css/assets/jquery_validation/dist/localization/messages_es.js"></script>
  <!-- Plugin para listado, navegación y filtrado en tablas -->
  <script src="../css/assets/footable/js/footable.min.js"></script>
  <script src="../css/assets/footable/js/configTable.js"></script>
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