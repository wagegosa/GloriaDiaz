<?php 
  session_start();
?>
<?php
//Conexión a la base de datos
require "../../config/General/connexion.php";

$Con= new DataBase();
$Conn= $Con->Conexion();

$_GET['id'] ? $_GET['id'] : '';

try {
  $query="SELECT * FROM gloriadiaz.tbp_perfil WHERE idtbp_perfil = ".$_GET['id'];
  $Resul= $Conn->prepare($query);
  $Resul->bindParam(':id', $id);
  $Resul->execute();
  $Resul->setFetchMode(PDO::FETCH_ASSOC);
  // $Resul->setFetchMode(PDO::FETCH_ASSOC);
  $Resultado= $Resul->rowCount();

  if($Resultado!=0){
    while ($R= $Resul->fetch()):
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
    <title>Encuestas</title>
  </head>

  <body>
    <div class="container">
      <?php   include "../../plantillas/menu/menu_admin2.php"; ?>
      <div class="row">
        <div class="col-md-12">
          <h3 class="page-header"><span class="glyphicons glyphicons-group"></span> Preguntas</h3>
          <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li><a href="index.php">Perfil</a></li>
            <li class="active">Actualizar Perfil</li>
          </ol>
        </div>
      </div>
      <!-- Formulario -->
      <form method="post" autocomplete="off" id="frm" action="../../config/ClassPerfil/ClassPerfil_upd.php">
        <div class="row">
          <div class="col-md-4">
            <label for="email">Perfil:</label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" name="perfil" id="perfil" value="<?=$R['nombre'];?>" placeholder="Perfil">
            <!-- <textarea class="form-control"name="perfil" id="perfil" placeholder="Pregunta" maxlength="255"></textarea> -->
            <span class="help-block" id="error"></span>
          </div>
          <div class="col-md-4">
            <label for="email">Activo:</label>
          </div>
          <div class="col-md-8">
            <select name="activo" id="activo" class="form-control">
              <option value="0">Seleccione...</option>
              <?php 
                if($R['activo'] != "N"){
              ?>
                  <option value="Y" selected>Si</option>
                  <option value="N">No</option>
              <?php
                }else{
              ?>
                  <option value="Y">Si</option>
                  <option value="N" selected>No</option>
              <?php
                }
              ?>
            </select>
            <span class="help-block" id="error"></span>
          </div>
        </div>
        <div><br>
          <input type="hidden" name="id" id="id" value="<?= $R['idtbp_perfil']?>">
          <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
          <!--<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Guardar</a>-->
        </div>
      </form>
    </div>
  </body>
  <!-- LIBRERIAS validadoras-->
  <script src="../../css/assets/bootstrap/js/jquery.min.js"></script>
  <script src="../../css/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../css/assets/bootstrap/js/popper.min.js"></script>
  <script src="../../css/assets/bootstrap/js/custom.js"></script>
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
          nuero_cedula: { required: true, minlength: 3, maxlength: 10, number: true },
          primer_nombre: {required: true, minlength: 2 },
          segundo_nombre: {minlength: 2 },
          apellidos: { required: true, maxlength: 60},
          direccion: { required: true, maxlength: 120},
          telefono: { required: true, minlength: 7, maxlength: 10 },
          Ciudad: { required: true},
        }
      })
    });
  </script>
  </html>
  <?php    
    endwhile;
  }else{
    echo "No se encontraron registros con el ID " .$id;
  }
} catch (PDOException $e) {
  die("Error occurred:" . $e->getMessage());
}
?>
