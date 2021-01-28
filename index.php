<?php
require_once "model/Model_siswa.php";

$msg = "";
$output = "";
$tabelOutput = '';

if (isset($_POST['submit'])) {

  if (!empty($_POST['nisn'])) {
    $nisn = $_POST['nisn'];
    $siswa = $mod_siswa->getData($nisn);

    if ($siswa->num_rows > 0) {

      $jum_materi = $mod_siswa->getJumlahMateri()->fetch_assoc();
      $kolom = $jum_materi['jumlahMateri'] + 1;
      
      while ($s = $siswa->fetch_assoc()) {

        $tabelOutput .= '
      <table class="table table-bordered table-sm">
      <thead>
      <tr>
      <th colspan="'.$kolom.'"><center>Tabel Praktek '.$s['nama_mapel'].'</center></th>
      </tr>
      </thead>
      <tbody>
      <tr>
      <td>Materi</td>
      <td>'.$s['id_mapel'].'</td>
      </tr>
      <tr>
      <td>Status</td>
      <td><i class="fa fa-check"></i></td>
      </tr>
      </tbody>
      </table><br/>
      ';
      }

      foreach ($siswa as $r) {
        $nisn = $r['nisn'];
        $nama_lengkap = $r['nama_lengkap'];
        $kelas = $r['kelas'].' - '.$r['jurusan'];
      }

      $output = '<div class="row mt-3 esor">
      <div class="col-12 my-auto">
      <div class="masthead-content text-white pb-5 py-md-0" style="padding-top: 1rem;">
      <table class="table table-bordered table-sm">
      <tr>
      <td>NISN</td>
      <td>'.$nisn.'</td>
      </tr>
      <tr>
      <td>Nama Lengkap</td>
      <td>'.$nama_lengkap.'</td>
      </tr>
      <tr>
      <td>Kelas - Jurusan</td>
      <td>'.$kelas.'</td>
      </tr>
      </table><br/>

      ';

      $output .= $tabelOutput;      

      $output .= '
      </div>
      </div>
      </div>';
    } else {
      $output = '<div class="mt-1"><span>Data siswa tidak ditemukan!</span></div>';
    }
  } else {
    $msg = '<span class="text text-warning">NISN harus diisi!</span>';
  }
}
?>


<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Coming Soon - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/coming-soon.min.css" rel="stylesheet">

  <style type="text/css">
    .duwur {
      background-color: #203551;
      border-radius: 0 0 6px 6px;
    }

    .esor p {
      color: #000000;
    }
  </style>
</head>

<body>
  <div class="container h-100">
    <div class="row h-40 duwur">
      <div class="col-12 mt-5">
        <div class="masthead-content text-white pt-5 py-md-0" style="padding-bottom: 1rem;">
          <h1 class="mb-3">RPL v3.2</h1>
          <p class="mb-3">Disini kalian bisa melihat tabel yang didalamnya terdapat materi apa saja yang sudah kalian kerjakan! <br/>Masukan <strong>NISN</strong> kalian lalu klik Submit untuk menampilkan tabel!</p>
          <form method="POST" action="">
            <div class="input-group input-group-newsletter" style="width: 300px;">
              <input type="text" name="nisn" class="form-control" autocomplete="off" placeholder="Masukan NISN..." aria-label="Masukan NISN..." aria-describedby="submit-button">
              <div class="input-group-append">
                <button class="btn btn-secondary" type="submit" name="submit" id="submit-button">Submit</button>
              </div>
            </div>
            <div class="mt-1">

              <?= $msg ?>

            </div>
          </form>


        </div>
      </div>
    </div>
    
    <?= $output ?>

  </div>

</body>
</html>