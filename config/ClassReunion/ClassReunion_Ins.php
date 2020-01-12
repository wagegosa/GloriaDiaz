 <?php
 //llamamos a la connecion
require('../General/connexion.php');
//capturamos
$fec_reunion= $_POST['fec_reunion'];
$hor_reunio= $_POST['hor_reunio'];
$ho_finxxx= $_POST['ho_finxxx'];
$direccion= $_POST['direccion'];
$organizador= $_POST['organizador'];
$telefono= $_POST['telefono'];
$barrio= $_POST['barrio'];
$localidad= $_POST['localidad'];
$activo= $_POST['activo'];
//Validamos que el metodo POST este enviando datos.
if ($_POST != "" ){
  try{
    $Con= new DataBase();
    $Conexion= $Con->Conexion();
    $query = "INSERT INTO gloriadiaz.tba_reunion(fec_reunio_inicio, hor_inicio, hor_finxxx, direccion, organizador,  telefono, barrio, localidad, fec_creacio, fec_modifi, activo) VALUES ('$fec_reunion',  '$hor_reunio', '$ho_finxxx', '$direccion', '$organizador', '$telefono', '$barrio', '$localidad',  now(), now(), '$activo')";
    $Conexion->query($query);
    echo "<script>alert('¡Se almaceno correctamente.!');</script>";
    header("Location: ../../admin/reunion/index.php");
  }
  catch ( PDOException $e ){
    die("Ha ocurrido un error inesperado en la base de datos.<br>".$e->getMessage());
    echo "Por favor revisar los datos que se estan insertando.";
  }
}
//si no esta enviando datos, nos notifica por un scritp y nos muestra que nos trae.
else{
  echo "<script>alert('¡Por favor revisar los datos ingresados, estos no pueden estar vacíos! ');</script>";
  die('<h1>Por favor regrese a la pagina anterior y termine de ingresar datos.</h1>');
   // echo '<input type="hidden" id="error" name="error">'
  header("Location:../../admin/preguntas/Con_preguntas.php");
}
?>