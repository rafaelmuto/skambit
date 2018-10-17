<?php
// classe cuida da conneccao com o mySQL
class Dbh{
  private $servername;
  private $username;
  private $password;
  private $dbname;
  private $charset;
  private $port;
  protected $pdo;

  public function __construct(){
    $this->servername = "localhost";
    $this->username = "root";
    $this->password = "";
    $this->dbname = "skambitdb";
    $this->charset = "utf8";
    $this->port = 3306;

    try {
      $dns = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";charset=" . $this->charset . ";port:" . $this->port;
      $this->pdo = new PDO($dns, $this->username, $this->password);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $this->pdo;
    } catch (PDOException $e) {
      echo  "Connection Failed: " . $e->getMessage();
    }
  }
}
?>
