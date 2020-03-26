<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Surat Masuk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Surat Masuk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-sm">
                  <a href="?page=masuk&aksi=tambah" class="btn btn-outline-primary btn-sm"> <i class="fa fa-pencil-alt"></i> Tambah</a>
                  <button type="button" class="btn btn-outline-success btn-sm float-sm-right" data-toggle="modal" data-target="#cetakMasuk"><i class="fa fa-print"></i> Cetak</button>
                  <!-- <a href="?page=cetak" class="btn btn-outline-primary btn-sm"> <i class="fa fa-pencil-alt"></i> Cetak</a> -->
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Agenda</th>
                  <th>Tanggal Surat</th>
                  <th>Klasifikasi</th>
                  <th>Isi Surat</th>
                  <th>Asal Surat</th>
                  <th>Tanggal Agenda</th>
                  <th>File</th>
                  <th>Disposisi</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                  <?php

                  $no = 1;
                  $id = $_POST['id'];
                  // $kla_id = $_POST['kla'];
                  $sql = $conn->query("SELECT * FROM tb_masuk");
                  while ($data = $sql->fetch_assoc()) {

                   ?>

                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['no_masuk'] ?></td>
                  <td><?php echo TanggalIndo( $data['tgl_masuk']) ?></td>
                  <td><?php echo $data['kla']; ?> - 
                  <?php 
                $kla_id = $data['kla'];
                $kla = $conn->query("SELECT * FROM tb_kla WHERE no_kla='$kla_id'");
                 while($data_kla = $kla->fetch_assoc()){
                   echo $data_kla['uraian'];?>
                 <?php }?>                  
                  
                  </td>
                  <td><?php echo $data['isi']; ?></td>
                  <td><?php echo $data['asal'] ?></td>
                  <td><?php echo TanggalIndo($data['tgl_agenda']) ?></td>
                  <td><a href="img/<?php echo $data['foto']; ?>" data-toggle="lightbox">
                  <p class="img-fluid"><?php echo $data['foto']; ?></p>
                </a></td>
                <td>
                <?php 
                $id = $data['id'];
                $dispo = $conn->query("SELECT * FROM tb_dispo WHERE id='$id'");
                 while($data_dispo = $dispo->fetch_assoc()){
                   echo $data_dispo['tujuan'];?>
                 <?php }?>
                </td>
                  <td>
                    <div class="btn-group">
                        <a href="?page=masuk&aksi=edit&id=<?php echo $data['id']; ?>" type="button" class="btn btn-success" title="edit"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini..?')" href="?page=masuk&aksi=hapus&id=<?php echo $data['id']; ?>" type="button" class="btn btn-danger" title="hapus"><i class="fas fa-trash-alt"></i></a>
                      <a href="?page=dispo&id=<?php echo $data['id']; ?>" type="button" class="btn btn-warning" title="disposisi"><i class="fas fa-random"></i></a>
                    </div>
                    <!-- <div class="btn-group">                        
                      <a href="?page=masuk&aksi=cetak&id=<?php echo $data['id']; ?>" type="button" class="btn btn-info" title="cetak"><i class="fas fa-print"></i></a>
                    </div> -->
                  </td>
                </tr>

              <?php } ?>
              </tbody>
            </thead>
          </table>
</div>
</div>
