 <?php

class Reunion extends DataBase
{
	public $idtba_reunion;
  public $nombre;
	public $activo;

  public function listarReunion(){
    try
    {
      parent::Conexion();
      $sql = "SELECT A.idtba_reunion, 
                     A.fec_reunio_inicio, 
                     A.hor_inicio, 
                     A.hor_finxxx, 
                     A.direccion, 
                     A.organizador,
                     A.telefono, 
                     A.barrio, 
                     C.nombre AS localidad, 
                     A.activo 
                FROM gloriadiaz.tba_reunion A
          INNER JOIN gloriadiaz.tbp_localida C ON (A.localidad = C.tbp_localida)";
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
  public function listarReunionActi()
  {
    try
    {
      parent::Conexion();
      $sql = "SELECT * FROM gloriadiaz.tba_reunion where activo = 'Y'";
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
  public function listarReunionhora()
  {
    try
    {
      parent::Conexion();
      $sql = "SELECT idtba_reunion 
                FROM gloriadiaz.tba_reunion 
               WHERE activo = 'Y'
                 AND CONVERT (fec_reunio_inicio, DATE) = CONVERT (NOW(), DATE) 
                 AND DATE_FORMAT(NOW( ), '%H:%i' ) >= DATE_FORMAT(hor_inicio, '%H:%i') 
                 AND DATE_FORMAT(NOW( ), '%H:%i' ) <= DATE_FORMAT(hor_finxxx, '%H:%i')";
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
