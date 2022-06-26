<?php // lib

namespace Application\Lib\Database;
//namespace Application\Lib\Database\PDO\PDO;

require("config.php");


class DatabaseConnection
{
  private $login;
  private $pass;
  private $connec;

  public function __construct($db, $login = 'blog', $pass = 'blog')
  {
    $this->login = $login;
    $this->pass = $pass;
    $this->db = $db;
    $this->connexion();
  }

  private function connexion()
  {
    try {
      $bdd = new PDO(
        'mysql:host=localhost;dbname=' . $this->db . ';charset=utf8mb4',
        $this->login,
        $this->pass
      );
      $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
      $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
      $this->connec = $bdd;
    } catch (PDOException $e) {
      $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
      die($msg);
    }


  }

  public function q($sql, array $cond = null)
  {
    $stmt = $this->connec->prepare($sql);

    if ($cond) {
      foreach ($cond as $v) {
        $stmt->bindParam($v[0], $v[1], $v[2]);
      }
    }

    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->closeCursor();
    $stmt = NULL;
  }
}

/*
* class DatabaseConnection

class DatabaseConnection{

  public function getConnection()
  {

  if ($this->database === null) {
    $dsn="mysql:dbname=".BASE.";host=".SERVER;
		try{
		$this->database=new PDO($dsn,USER,PASSWD);
		}
		catch(PDOException $e){
		printf("Échec de la connexion : %s\n", $e->getMessage());
		exit();
		}

    return $this->database;
  }
  }
}// end class DatabaseConnection

*/

/*class DatabaseConnection
{
  public ?\PDO $database = null;


  public function getConnection() //: \PDO
  {


  if ($this->database === null) {

      var_dump('test:null');

      $this->database = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'blog', 'blog');
    }

    var_dump($this->database);

    return $this->database;
  }
}*/
