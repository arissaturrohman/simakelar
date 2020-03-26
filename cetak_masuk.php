<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}
include("inc/config.php");
include("inc/TanggalIndo.php");
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');
error_reporting(E_ALL ^(E_NOTICE | E_WARNING));


$sql = $conn->query("SELECT * FROM tb_opd");
    $data = $sql->fetch_assoc();
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI MAKELAR | Aplikasi Manajemen Surat Masuk & Keluar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link href="dist/css/ekko-lightbox.css" rel="stylesheet">
  <link rel="stylesheet" href="dist/css/style.css">
  <link rel="shortcut icon" href="img/<?= $data['foto']; ?>" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="plugins/jquery/jquery.min.js"></script>

</head>
<body class="hold-transition sidebar-mini">

<div class="container">
<div class="row mt-3">
  <div class="col-md-3 text-right pr-2 mt-3">
  <img src="img/<?= $data['foto']; ?>" width="25%">
  </div>
  <div class="col-xs-6 text-center">
  <p class="h3 mb-0">PEMERINTAH KABUPATEN DEMAK</p>
  <p class="h2 mb-1"><b><?= $data['opd']; ?></b></p>
  <?= $data['alamat']; ?> - Telp. <?= $data['telp']; ?><br>
  Email : <?= $data['email']; ?> - Website : <?= $data['web']; ?>
  
  </div>
</div><hr>

<div class="row">

<div class="card-body">

        
          
          <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                  <th width="2%" class="align-middle text-center">No</th>
                  <th width="6%" class="align-middle text-center">No Agenda</th>
                  <th width="12%" class="align-middle text-center">Tanggal Surat</th>
                  <th width="15%" class="align-middle text-center">Klasifikasi</th>
                  <th class="align-middle text-center">Isi Surat</th>
                  <th width="15%" class="align-middle text-center">Asal Surat</th>
                  <th width="12%" class="align-middle text-center">Tanggal Agenda</th>
                  <th width="10%" class="align-middle text-center">Disposisi</th>
                </tr>
                </thead>
                <tbody>  
                <?php 
                $no = 1;
                if (isset($_GET['cetak'])) {
                  $awal = $_GET['tgl_awal'];
                  $akhir = $_GET['tgl_akhir'];
                  if (!empty($awal) ==0 || !empty($akhir) ==0) {
                    
                    ?>
                      <script language="JavaScript">
                        alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
                        document.location='./?page=masuk';
                    </script>
                    <?php
                  }           
                  ?>
                    <div class="text-center mb-3 mt-0">
                    <i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b>
                    <?php echo TanggalIndo($_GET['tgl_awal'])?></b> s/d <b><?php echo TanggalIndo($_GET['tgl_akhir'])?></b></i>
                    </div>
                    <?php
                    // $awal = $_GET['tgl_awal'];
                    // $akhir = $_GET['tgl_akhir'];
                    $sql = $conn->query("SELECT * FROM tb_masuk WHERE tgl_agenda BETWEEN '".$awal."' AND '".$akhir."'");
                  } else {
                    $sql = $conn->query("SELECT * FROM tb_masuk");
                  }
                    if($sql->num_rows > 0){
                      while ($data = $sql->fetch_assoc()) {
                        ?>                      

                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['no_masuk'] ?></td>
                  <td><?php echo TanggalIndo( $data['tgl_masuk']) ?></td>
                  <td><?php echo $data['kla'] ?> - 
                  <?php 
                $kla_id = $data['kla'];
                $kla = $conn->query("SELECT * FROM tb_kla WHERE no_kla='$kla_id'");
                 while($data_kla = $kla->fetch_assoc()){
                   echo $data_kla['uraian'];?>
                 <?php }?> </td>
                  <td><?php echo $data['isi'] ?></td>
                  <td><?php echo $data['asal'] ?></td>
                  <td><?php echo TanggalIndo($data['tgl_agenda']) ?></td>
                <td>
                <?php 
                $id = $data['id'];
                $dispo = $conn->query("SELECT * FROM tb_dispo WHERE id='$id'");
                while($data_dispo = $dispo->fetch_assoc()){
                  echo $data_dispo['tujuan']?></td>                  
                </tr>
                 <?php }?>
                 <?php }} else { ?>
                 <tr>
                  <td colspan="8" class="text-center">
                  <?php                 
                    echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
                  } ?>    
                  </td>
                 </tr>

              
              </tbody>
            </thead>
          </table>
          </div>
          </div>
          <div class="container">
          <div class="row">
          <?php
           $hari_ini = date('Y m d');
            $sql = $conn->query("SELECT * FROM tb_opd");
            $data = $sql->fetch_assoc();
          ?>
            <div class="col offset-9 text-center">
              Demak, <?= TanggalIndo($hari_ini); ?>
              <br><br><br>
              <b><u><?= $data['ka_opd'];?></u></b><br>
              NIP. <?= $data['nip'];?>
            </div>
          </div>
          </div>
          <script>
            window.print();
          </script>


    <!-- <footer class="main-footer">
    <div class="float-right">
      Created by : <a href="https://github.com/arissaturrohman/" target="_blank"><b>Arissatur Rohman</b></a>  | Version 1.0      
    </div>
      <?php
      $sql = $conn->query("SELECT * FROM tb_opd");
      $data = $sql->fetch_assoc();
      ?>
    <strong>Copyright &copy; 2019 - <?= date('Y'); ?> <a href="http://kecgajah.demakkab.go.id/" target="_blank"><?= $data['opd']; ?></a>.</strong> All rights
    reserved.
  </footer> -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="dist/js/autocomplete.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="dist/js/adminlte.min.js"></script>
  <script src="dist/js/ekko-lightbox.js"></script>
  <script src="dist/js/ekko-lightbox.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>


</body>
</html>