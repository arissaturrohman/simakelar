<div class="container-fluid ">
        <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Disposisi Surat</h3>
              </div>
              <!-- /.card-header -->

              <?php

                  $id = $_GET['id'];
                  $sql = $conn->query("SELECT * FROM tb_masuk WHERE id='$id'");
                  $data = $sql->fetch_assoc();

               ?>
            
              <!-- form start -->
              <form method="POST">
                <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Tujuan Diposisi</label>
                    <input type="text" class="form-control" name="tujuan">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Batas Waktu</label>
                    <input type="date" class="form-control" name="batas_waktu" >
                  </div>
                  </div>
                  <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Isi Diposisi</label>                    
                    <textarea type="text" class="form-control" name="isi_dispo"></textarea>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Catatan</label>
                    <input type="text" class="form-control" name="catatan">
                  </div>
                  </div>
                  <div class="form-group">
                    <label>Sifat Disposisi</label>
                    <select class="form-control" name="sifat">
                    <option value="Biasa">Biasa</option>
                    <option value="Penting">Penting</option>
                    <option value="Segera">Segera</option>
                    <option value="Rahasia">Rahasia</option>
                    </select>
                  </div>                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" name="simpan" class="btn btn-primary" value="Submit"/>
                  <a href="?page=masuk" class="btn btn-secondary">Batal</a>
                </div>
              </form>
            </div>
            <!-- /.card -->


<?php

if (isset($_POST['simpan'])) {
  $tujuan   = $_POST['tujuan'];
  $waktu    = $_POST['batas_waktu'];
  $isi      = $_POST['isi_dispo'];
  $catatan  = $_POST['catatan'];
  $sifat    = $_POST['sifat'];
  $id_surat = $_GET['id'];
            $query = mysqli_query($conn, "SELECT * FROM tb_masuk WHERE id='$id_surat'");
            $no =1;
            list($id_surat) = mysqli_fetch_array($query);


    $sql = $conn->query("INSERT INTO tb_dispo (tujuan, batas_waktu, isi_dispo, catatan, sifat, id) VALUES (
      '$tujuan',
      '$waktu',
      '$isi',
      '$catatan',
      '$sifat',
      '$id_surat'      
       )");

    if ($sql) {
      ?>
      <script type="text/javascript">
      alert("Disposisi berhasil ditambahkan..!");
      window.location.href="?page=dispo&id=<?php echo $data['id']; ?>";
      </script>
      <?php
    }
}
 ?>
