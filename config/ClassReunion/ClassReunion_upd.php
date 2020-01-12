 <?php
//llamamos a la connecion
require('../General/connexion.php');

//capturamos
$id= $_POST['id'];
$fec_reunion= $_POST['fec_reunion'];
$hor_reunio= $_POST['hor_reunio'];
$ho_finxxx= $_POST['ho_finxxx'];
$direccion= $_POST['direccion'];
$organizador= $_POST['organizador'];
$telefono= $_POST['telefono'];
$barrio= $_POST['barrio'];
$localidad= $_POST['localidad'];
$activo= $_POST['activo'];
if($_POST != "" ){
  try{
    $Con= new DataBase();
    $Conexion= $Con->Conexion();
    $query = "UPDATE tba_reunion 
                 SET fec_reunio_inicio = '$fec_reunion', hor_inicio = '$hor_reunio', hor_finxxx = '$ho_finxxx', 
                     direccion = '$direccion', organizador = '$organizador', telefono = '$telefono', 
                     barrio = '$barrio', localidad = '$localidad', activo = '$activo'
               WHERE idtba_reunion = $id";
    $Conexion->query($query);
    $Resul= $Conexion->prepare($query);
    $Resul->bindParam(':id', $id, PDO::PARAM_STR, 100);
    $Resul->execute();
    $Resul->setFetchMode(PDO::FETCH_ASSOC);
    $Resultado= $Resul->rowCount();
    echo "<script>alert('¡Se almaceno correctamente.!');</script>";
    if($Resultado == 0){
      header("Location: ../../admin/reunion/index.php");
      die;
    }else{
        echo "Fallo la redirección";
        exit();
    }
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