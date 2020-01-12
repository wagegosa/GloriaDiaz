 <?php
//llamamos a la connecion
require('../General/connexion.php');

//capturamos
$id= $_POST['id'];
$perfil= $_POST['perfil'];
$usaurio= $_POST['usaurio'];
$pass= $_POST['pass'];
$nom_comple= $_POST['nom_comple'];
$activo= $_POST['activo'];
if($_POST != "" ){
  try{
    $Con= new DataBase();
    $Conexion= $Con->Conexion();
    $query = "UPDATE gloriadiaz.tba_usuario 
                 SET perfil = '$perfil', usuario = '$usaurio', pass = '$pass', nom_comple = '$nom_comple', activo = '$activo', fec_modifi =  now()
               WHERE idtba_Usuario = '$id'";
    $Conexion->query($query);
    $Resul= $Conexion->prepare($query);
    $Resul->bindParam(':id', $id, PDO::PARAM_STR, 100);
    $Resul->execute();
    $Resul->setFetchMode(PDO::FETCH_ASSOC);
    $Resultado= $Resul->rowCount();
    echo "<script>alert('¡Se almaceno correctamente.!');</script>";
    if($Resultado == 0){
      header("Location: ../../admin/usuarios/index.php");
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