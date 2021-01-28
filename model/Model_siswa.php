<?php

require_once "conn/Conn.php";

class Model_siswa extends Conn 
{
  public function getData($nisn)
  {
    $stmt = $this->conn->query("SELECT * FROM tb_master mas INNER JOIN tb_siswa s ON mas.nisn = s.nisn INNER JOIN tb_mapel m ON mas.id_mapel = m.id_mapel WHERE mas.nisn = '$nisn'");

    return $stmt;
  }

  public function getJumlahMateri()
  {
    $stmt = $this->conn->query("SELECT COUNT(materi) AS jumlahMateri FROM tb_mapel GROUP BY nama_mapel");

    return $stmt;
  }
}

$mod_siswa = new Model_siswa;