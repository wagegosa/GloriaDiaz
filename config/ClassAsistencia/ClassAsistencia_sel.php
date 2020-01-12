 <?php
  date_default_timezone_set('America/Bogota');

class Asistencia extends DataBase
{
	public $id;
  public $num_cedula;
  public $nombre;
  public $num_telefo;
  public $localidad;
  public $User;
	public $creacion;
  public $modificacion;
  public function listarAsistencia(){
    $hoy = date('Y-m-d');
    try
    {
      parent::Conexion();
      $sql = "SELECT A.idtba_regist_asiste, CONVERT(A.fec_creaci, DATE) AS fec_creaci, A.nom_comple, B.usuario
                FROM gloriadiaz.tba_regist_asiste A
          INNER JOIN gloriadiaz.tba_usuario B ON ( A.usuario = B.idtba_Usuario)
               WHERE CONVERT(A.fec_creaci,DATE) = '$hoy'
            ORDER BY A.nom_comple ASC ";
      $qry = $this->dbCon->prepare($sql);
      $qry->execute();
      $row = $qry->fetchAll(PDO::FETCH_OBJ);
      $qry->closeCursor();
      return $row;
      $this->dbCon = null;
    }
    catch ( PDOException $e )
    {
      die("Ha ocurrido un error inesperado en la base de datos.<br>".$e->getMessage());
    }
  }
  public function listarAsistenciaActi(){
    date_default_timezone_set('America/Bogota');
    $hoy = date('Y-m-d');
    try{
      parent::Conexion();
      $sql = "SELECT COUNT(*) As contador
                FROM gloriadiaz.tba_regist_asiste A
               WHERE CONVERT(A.fec_creaci,DATE) = '$hoy'";
      $qry = $this->dbCon->prepare($sql);
      $qry->execute();
      $row = $qry->fetchAll(PDO::FETCH_OBJ);
      $qry->closeCursor();
      return $row;
      $this->dbCon = null;
    }
    catch ( PDOException $e )
    {
      die("Ha ocurrido un error inesperado en la base de datos.<br>".$e->getMessage());
    }
  }
  public function listarEmpresaT(){
    $hoy = date('Y-m-d');
    try
    {
      parent::Conexion();
      $sql = "SELECT A.idtba_regist_asiste, CONVERT(A.fec_creaci, DATE) AS fec_creaci, A.nom_comple, B.usuario, A.empresa
                FROM gloriadiaz.tba_regist_empresa A
          INNER JOIN gloriadiaz.tba_usuario B ON ( A.usuario = B.idtba_Usuario)
               WHERE CONVERT(A.fec_creaci,DATE) = '$hoy'
            ORDER BY A.nom_comple ASC ";
      $qry = $this->dbCon->prepare($sql);
      $qry->execute();
      $row = $qry->fetchAll(PDO::FETCH_OBJ);
      $qry->closeCursor();
      return $row;
      $this->dbCon = null;
    }
    catch ( PDOException $e )
    {
      die("Ha ocurrido un error inesperado en la base de datos.<br>".$e->getMessage());
    }
  }
  public function listarEmpresa(){
    date_default_timezone_set('America/Bogota');
    $hoy = date('Y-m-d');
    try{
      parent::Conexion();
      $sql = "SELECT COUNT(*) As contador
                FROM gloriadiaz.tba_regist_empresa A
               WHERE CONVERT(A.fec_creaci,DATE) = '$hoy'";
      $qry = $this->dbCon->prepare($sql);
      $qry->execute();
      $row = $qry->fetchAll(PDO::FETCH_OBJ);
      $qry->closeCursor();
      return $row;
      $this->dbCon = null;
    }
    catch ( PDOException $e )
    {
      die("Ha ocurrido un error inesperado en la base de datos.<br>".$e->getMessage());
    }
  }
}

?>
