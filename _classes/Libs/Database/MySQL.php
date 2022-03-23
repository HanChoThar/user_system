<?php

namespace Libs\Database;

use PDO;
use PDOException;

class MySQL {
  private $dbname;
  private $dbhost;
  private $dbpass;
  private $dbuser;
  private $db;

  public function __construct(
    $dbname = "project", $dbhost = "localhost", $dbpass = "", $dbuser = "root"
  )
  {
    $this->dbname = $dbname;
    $this->dbhost = $dbhost;
    $this->dbpass = $dbpass;
    $this->dbuser = $dbuser;
    $this->db = null;
  }

  public function connect()
  {
    try {
      $this->db = new PDO(
      "mysql:host=$this->dbhost;dbname=$this->dbname",
      $this->dbuser,
      $this->dbpass,
      [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
      ]
      );

      return $this->db;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}


