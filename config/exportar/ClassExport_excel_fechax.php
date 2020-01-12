 <?php
 //llamamos a la connecion
require('../General/connexion.php');
//capturamos
$fecha_inicial= $_POST['fecha_inicial'];
//Validamos que el metodo POST este enviando datos.
if ($_POST != "" ){
  try{
    $Con= new DataBase();
    $Conexion= $Con->Conexion();
    $query = "SELECT A.idtba_regist_asiste, 
    A.cedula, 
    A.nom_comple, 
    A.telefono, 
    A.correo, 
    A.dir_reside, 
    B.nombre AS localidad,
    C.usuario As usuario, 
    A.activo, 
    A.fec_creaci, 
    A.fec_modifi 
    FROM gloriadiaz.tba_regist_asiste A
    INNER JOIN gloriadiaz.tbp_localida B ON(A.localida = B.tbp_localida)
    INNER JOIN gloriadiaz.tba_usuario C ON (A.usuario = C.idtba_Usuario)
    WHERE CONVERT(A.fec_creaci, DATE) = '$fecha_inicial'
    ORDER BY C.usuario ASC ";  
    $qry = $this->dbCon->prepare($sql);
    $qry->execute();
    $row = $qry->fetchAll(PDO::FETCH_OBJ);
    $qry->closeCursor();
    return $row;
    $this->dbCon = null;
    
    echo "<script>alert('¡Se almaceno correctamente.!');</script>";
    header("Location: ../../admin/exportar/exportar.php");
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