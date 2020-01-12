<?php 
  session_start();
?>
<?php
//Conexión a la base de datos
require "../../config/General/connexion.php";

include "../../config/ClassAsistencia/ClassAsistencia_sel.php";
include "../../config/ClassLocalidad/ClassLocalidad_sel.php";
include "../../config/ClassLugar/ClassLugar_sel.php";
$asistencia = new Asistencia();
$asis    = $asistencia->listarAsistenciaActi();
$localidad = new Localidad();
$local    = $localidad->listarLoocalidadActi();
$lugar = new Lugar();
$lugar_vota = $lugar->listarLugar();

$Con= new DataBase();
$Conn= $Con->Conexion();

$_GET['id'] ? $_GET['id'] : '';

try {
  $query="SELECT * FROM gloriadiaz.tba_regist_asiste WHERE idtba_regist_asiste = ".$_GET['id'];
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
  <!-- Plugin para cuadro de selección personalizable con soporte para búsqueda. -->
  <link rel="stylesheet" href="../../css/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="../../css/plugins/select2/select2-bootstrap.css">

  <title>Asistentes</title>
</head>
<body>
  <div class="container">
    <?php include "../../plantillas/menu/menu_admin2.php"; ?>
    <div class="row">
      <div class="col-md-12">
        <h3 class="page-header"><span class="glyphicons glyphicons-group"></span> Asistentes</h3>
        <ol class="breadcrumb">
          <li><a href="">Inicio</a></li>
          <li><a href="Con_Asistencia.php">Asistentes</a></li>
          <li class="active">Nuevo Asistente</li>
        </ol>
      </div>
    </div>
    <!-- contador -->
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <span class="user">Asistencias Resgistradas: <?php foreach ($asis as $listarU): echo $listarU->contador; endforeach;?> </span>
      </div>
    </div><br>  
    <!-- Formulario -->
    <form method="post" autocomplete="on" id="frm" action="../../config/ClassAsistencia/ClassAsistencia_upd.php?c=<?=$_GET['id'];?>">
      <!-- Cedula -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="Nombre">Cedula:</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <input type="number" class="form-control" name="num_cedula" rows="5" id="num_cedula" minlength="7" maxlength="10" placeholder="Cedula" value="<?=$R['cedula'];?>">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- Nombre -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="Hora">Nombre Completo</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Completo" value="<?=$R['nom_comple'];?>">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- telefono -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="email">Telefono:</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Telefono" minlength="7" maxlength="10">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- Email -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="email">email:</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?=$R['correo'];?>">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- Dirección -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="direccion">Dirección:</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección" value="<?=$R['dir_reside'];?>">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- localidad -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="Localidad">Localidad:</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <select name="localidad" id="localidad" class="form-control select2">
            <option value="0">Seleccione... </option>
            <?php foreach ($local as $listarL): 
                if ($listarL->tbp_localida != $R['localida']) {?>
                  <option value="<?= $listarL->tbp_localida;?>"><?= $listarL->nombre;?></option>
              <?php
                }else{
                  echo "<option value='$listarL->tbp_localida' selected>$listarL->nombre</option>";
                }
               ?>
              <?php endforeach; ?>
          </select>
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- Lugar Votación -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="Localidad">Lugar Votación:</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <select name="lugar_votacio" id="lugar_votacio" class="form-control select2">
            <option value="0">Seleccione... </option>
              <?php foreach ($lugar_vota as $listarV): 
                if ($listarV->idtbp_lugares_votacio != $R['lugar_votacio']) {
                  echo "<option value='$listarV->idtbp_lugares_votacio'>$listarV->nombre</option>";
                }else{
                  echo "<option value='$listarV->idtbp_lugares_votacio' selected>$listarV->nombre</option>";
                }
                endforeach; 
              ?>
          </select>
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- ORGANIZADOR -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="direccion">Organizador:</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <input type="text" class="form-control" name="organizador" id="organizador" placeholder="Organizador" value="<?=$R['organizador'];?>">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <div><br>
        <div><br>
          <input type="hidden" name="id" id="id" value="<?= $R['idtba_regist_asiste']?>">
          <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button><br>
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
  <!-- Plugin para cuadro de selección personalizable con soporte para búsqueda. -->
  <script src="../../js/plugins/select2/select2.full.js"></script>
  <script src="../../js/plugins/select2/es.js"></script>
  <script>
    $(document).ready(function() {
     $(".select2").select2({
      language: "es"
    });
   });
 </script>
</body>
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