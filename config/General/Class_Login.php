 <?php

 require('../General/connexion.php');

$usaurio= $_POST['username'];
$pass= $_POST['pass'];
if($_POST != "" ){
  try{
    $Con= new DataBase();
    $Conexion= $Con->Conexion();
    $query = "SELECT * FROM  gloriadiaz.tba_usuario where usuario = '$usaurio' and pass = '$pass' ";
    $Conexion->query($query);
    $Resul= $Conexion->prepare($query);
    $Resul->bindParam(':id', $id, PDO::PARAM_STR, 100);
    $Resul->execute();
    $Resul->setFetchMode(PDO::FETCH_ASSOC);
    $Resultado= $Resul->rowCount();
    // echo "<script>alert('¡Se almaceno correctamente.!');</script>";
    if($Resultado != 0 ){
      while ($R= $Resul->fetch()):
        switch ($R['perfil']) {
          case '1':
            header("Location: ../../operario/asistentes/index.php");
            break;
          case '2':
            header("Location: ../../admin/index.php");
            break;
          default:
            header("Location: ../../index.php");
            break;
        }
        // if($R['perfil'] == 1 && $R['activo'] == "Y"){
        // }elseif ($R['perfil'] == 2 && $R['activo'] == "Y") {
        // }else{
        // }
      endwhile;
    }else{
        header("Location: ../../index.php");
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
