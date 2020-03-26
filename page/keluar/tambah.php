<div class="container-fluid">
        <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Surat Keluar</h3>
              </div>
              <!-- /.card-header -->

              <?php


              $sql = $conn->query("SELECT no_keluar FROM tb_keluar ORDER BY no_keluar DESC");
              $data = $sql->fetch_assoc();
                
                  // $no = $data['no_keluar'];
                  // $noUrut = substr($no, 3, 3);
                  // $tambah = (int) $noUrut+1;

                  // if (strlen($tambah) == 1) {
                  //   $format = "000".$tambah;
                  // }elseif (strlen($tambah) == 2) {
                  //   $format = "00".$tambah;
                  // }elseif (strlen($tambah) == 3) {
                  //   $format = "0".$tambah;
                  // }else {
                  //   $format = "".$tambah;
                  // }
                  
               ?>

              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-4">
                    <label>No Agenda</label>
                    <input type="text" class="form-control" name="no_keluar">
                  </div>
                  <div class="form-group col-md-2 offset-6">
                    <label>No Sebelumnya</label>
                    <input type="text" class="form-control" value="<?php echo $data['no_keluar']; ?>" readonly>
                  </div>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Agenda</label>
                    <input type="date" class="form-control" name="tgl_agenda" id="tgl_agenda" value="<?= $_POST['tgl_agenda']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Klasifikasi</label>
                    <input type="text" class="form-control" name="kla" id="kla" value="" required>
                  </div>
                  <div class="form-group">
                    <label>Isi Surat</label>
                    <textarea type="text" class="form-control" name="isi" required> <?= $_POST['isi']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Tujuan</label>
                    <input type="text" class="form-control" name="tujuan" value="<?= $_POST['tujuan']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label>File input</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" for="customFile" name="foto" required>
                        <label class="custom-file-label">Choose file</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" name="simpan" class="btn btn-primary" value="Submit"/>
                  <a href="?page=keluar" class="btn btn-secondary">Batal</a>
                </div>
              </form>
            </div>
            <!-- /.card -->


<?php

if (isset($_POST['simpan'])) {
  $no_agenda = $_POST['no_keluar'];
  $tgl_agenda = $_POST['tgl_agenda'];
  $isi_surat = $_POST['isi'];
  $tujuan = $_POST['tujuan'];
  $kla      = $_POST['kla'];

  $foto       = $_FILES['foto']['name'];
  $source     = $_FILES['foto']['tmp_name'];
  $ekstensifoto   = array('jpeg', 'jpg', 'png', 'pdf');
  $pecah      = explode('.', $foto);
  $ekstensi   = strtolower(end($pecah));
  $ukuran     = $_FILES['foto']['size'];
  $folder     = 'img/';
  $gambar     = date('dmYHis')."-".$foto;

  if (in_array($ekstensi, $ekstensifoto) === true) {
    if ($ukuran > 1024) {

  move_uploaded_file($source, $folder.$gambar);

  $sql = $conn->query("INSERT INTO tb_keluar (no_keluar, tgl_agenda, isi, tujuan, foto, kla)
  VALUES (
    '$no_agenda',
    '$tgl_agenda',
    '$isi_surat',
    '$tujuan',
    '$gambar',
    '$kla'
      )");

  if ($sql) {
    ?>
    <script type="text/javascript">
      alert("Data berhasil ditambahkan..!");
      window.location.href="?page=keluar";
    </script>
    <?php
  }
}
  else {
    ?>
    <script type="text/javascript">
      alert("Ukuran file terlalu besar..!");
      // window.location.href="?page=masuk";
    </script>
    <?php
  }
}
  else {
    ?>
    <script type="text/javascript">
      alert("Ekstensi file yang diupload tidak diperbolehkan..!");
      // window.location.href="?page=masuk";
    </script>
    <?php
  }
}
 ?>
