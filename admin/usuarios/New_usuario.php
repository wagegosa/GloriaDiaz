<?php 
  session_start();
?>
<?php  
//Conexión a la base de datos
require "../../config/General/connexion.php";
// Class
include "../../config/ClassPerfil/ClassPerfil_sel.php";
$perfil = new Perfil();
$per    = $perfil->listarPerfilActi();
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
  <!--Paginación, filtrado de registros-->
  <link rel="stylesheet" href="../../css/assets/footable/css/footable.bootstrap.min.css">
  <title>Usuarios</title>
</head>
<body>
  <div class="container">
    <?php   include "../../plantillas/menu/menu_admin2.php"; ?>
    <div class="row">
      <div class="col-md-12">
        <h3 class="page-header"><span class="glyphicons glyphicons-group"></span> Usuarios </h3>
        <ol class="breadcrumb">
          <li><a href="">Inicio</a></li>
          <li><a href="index.php">Usuarios</a></li>
          <li class="active">Nuevo Usuario</li>
        </ol>
      </div>
    </div>
    <!-- Formulario -->
    <form method="post" autocomplete="on" id="frm" action="../../config/ClassUsuario/ClassUsuario_Ins.php">
      <!-- nombre -->
      <div class="row">
        <div class="col-md-4">
          <label for="email">Nombre:</label>
        </div>
        <div class="col-md-8">
          <input type="text" class="form-control" name="nom_comple" rows="5" id="nom_comple" placeholder="Nombre">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- usuario -->
      <div class="row">
        <div class="col-md-4">
          <label for="email">Usuario:</label>
        </div>
        <div class="col-md-8">
          <input type="text" class="form-control" name="usaurio" id="usaurio" placeholder="Usaurio">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- contraseña -->
      <div class="row">
        <div class="col-md-4">
          <label for="email">Contraseña:</label>
        </div>
        <div class="col-md-8">
          <input type="password" class="form-control" name="pass" id="pass" placeholder="Contraseña">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- perfil -->
      <div class="row">
        <div class="col-md-4">
          <label for="email">Perfil:</label>
        </div>
        <div class="col-md-8">
          <select name="perfil" id="perfil" class="form-control">
            <option value="0">Seleccione... </option>
            <?php foreach ($per as $listarP): ?>
              <option value="<?= $listarP->idtbp_perfil;?>"><?= $listarP->nombre;?></option>
            <?php endforeach; ?>
          </select>
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- activo -->
      <div class="row">
        <div class="col-md-4">
          <label for="email">Activo:</label>
        </div>
        <div class="col-md-8">
          <select name="activo" id="activo" class="form-control">
            <option value="0">Seleccione...</option>
            <option value="Y">Si</option>
            <option value="N">No</option>
          </select>
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <div><br>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
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