<?php

class Conn 
{
  private $host = "localhost";
  private $user = "root";
  private $pass = "";
  private $db_name = "data_rpl";
  protected $conn = "";

  public function __construct() {
    $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
  }
}

$conn = new Conn;