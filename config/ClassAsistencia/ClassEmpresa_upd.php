 <?php
 date_default_timezone_set('America/Bogota');
 $hoy = date('Y-m-d');
//llamamos a la connecion
require('../General/connexion.php');
//capturamos
$num_cedula= $_POST['num_cedula'];
$nombre= $_POST['nombre'];
$telefono= $_POST['telefono'];
$email= $_POST['email'];
$direccion= $_POST['direccion'];
$localidad= $_POST['localidad'];
$empresa= $_POST['empresa'];
$id= $_POST['id'];
if($localidad == 0){
  $localidad = "21";
}
$lugar_votacio = $_POST['lugar_votacio'];
if($lugar_votacio == 0){
  $lugar_votacio = "643";
}
$organizador = $_POST['organizador'];
if($_POST != "" ){
  try{
    $Con= new DataBase();
    $Conexion= $Con->Conexion();
    $query = "UPDATE gloriadiaz.tba_regist_empresa SET cedula= '$num_cedula', nom_comple= '$nombre', telefono= '$telefono', correo= '$email', dir_reside= '$direccion', localida= '$localidad', lugar_votacio= '$lugar_votacio', usuario= '1',  organizador= '$organizador', empresa= '$empresa', fec_modifi= '$hoy' WHERE idtba_regist_asiste = $id";
    $Conexion->query($query);
    header("Location: ../../admin/asistentes/Con_Empresa.php?c=1");
  }
  catch ( PDOException $e ){
    echo "<script>alert('¡Por favor revisar los datos ingresados, estos no pueden estar vacíos! ');</script>";
    die('<h1>Por favor regrese a la pagina anterior y termine de ingresar datos.</h1>');
    // die("Ha ocurrido un error inesperado en la base de datos.<br>".$e->getMessage());
  }
}
else{
  die("<script>alert('¡Por favor revisar los datos ingresados, estos no pueden estar vacíos! ');</script>");
}

?>