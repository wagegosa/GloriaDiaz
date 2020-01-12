 <?php

class Lugar extends DataBase
{
	public $idtbp_lugares_votacio;
  public $nombre;
	public $activo;

  public function listarLugar(){
    try
    {
      parent::Conexion();
      $sql = "SELECT * FROM gloriadiaz.tbp_lugares_votacio WHERE activo = 'Y' ORDER BY nombre ASC";
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
