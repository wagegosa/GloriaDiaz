 <?php

class Perfil extends DataBase
{
	public $idtbp_perfil;
  public $nombre;
	public $activo;

  public function listarPerfil(){
    try
    {
      parent::Conexion();
      $sql = "SELECT * FROM gloriadiaz.tbp_perfil";
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
  public function listarPerfilActi()
  {
    try
    {
      parent::Conexion();
      $sql = "SELECT * FROM gloriadiaz.tbp_perfil where activo = 'Y'";
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
