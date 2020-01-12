 <?php

class Localidad extends DataBase
{
	public $idtbp_perfil;
  public $nombre;
	public $activo;

  public function listarLocalidad(){
    try
    {
      parent::Conexion();
      $sql = "SELECT A.idtba_Usuario, B.nombre AS perfil, A.usuario, A.pass, A.nom_comple, DATE(A.fec_creaci) AS fec_creaci, 
                     A.fec_modifi, A.activo 
                FROM gloriadiaz.tba_usuario A
          INNER JOIN gloriadiaz.tbp_perfil B ON (A.perfil = B.idtbp_perfil )
            ORDER BY nom_comple ASC";
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
  public function listarLoocalidadActi()
  {
    try
    {
      parent::Conexion();
      $sql = "SELECT * FROM gloriadiaz.tbp_localida where activo = 'Y'";
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
