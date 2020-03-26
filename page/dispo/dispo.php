<div class="container-fluid ">
    <div class="row">
        <!-- left column -->
        <div class="col">
         <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
              <?php

                  $id = $_GET['id'];
                  $sql = $conn->query("SELECT * FROM tb_masuk WHERE id='$id'");
                  $data = $sql->fetch_assoc();

               ?>
                <h3 class="card-title">Disposisi Surat</h3>
                <h3 class="card-title float-right"><a href="?page=dispo&aksi=tambah&id=<?php echo $data['id']; ?>"><i class="fa fa-plus"></i> Tambah Disposisi</a>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">    

              <div class="col s12">
                <div class="card bg-secondary">
                  <div class="card-content">
                     <p><p class="description pl-3">Perihal Surat :<?php echo $data['isi']; ?><a class="float-right pr-3 text-white" href="?page=masuk"><i class="fa fa-arrow-left"></i> Kembali</a></p></p>
                     
                  </div>
                </div>
              </div>


                <table class="table">
                <thead>
                  <tr>
                    <th width="10%">Tujuan Disposisi</th>
                    <th width="20%">Isi Disposisi</th>
                    <th width="10%">Catatan</th>
                    <th width="15%">Sifat <br> Batas Waktu</th>
                    <th width="5%">Aksi</th>
                  </tr>
                
                </thead>
                <?php

                  $id = $_GET['id'];
                  $sql = $conn->query("SELECT * FROM tb_dispo WHERE id='$id'");
                  $data = $sql->fetch_assoc();

               ?>
                    <tbody>
                        <tr>
                        <td><?php echo $data['tujuan']; ?></td>                        
                        <td><?php echo $data['isi_dispo']; ?></td>                       
                        <td><?php echo $data['catatan']; ?></td>                       
                        <td><?php echo $data['sifat']; ?><br><?php echo TanggalIndo($data['batas_waktu']); ?></td>
                        <td><div class="btn-group">                        
                        <a href="?page=dispo&aksi=edit&id=<?php echo $data['id']; ?>" type="button" class="btn btn-success" title="edit"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Apakah Anda Yakin Menhgapus Data Ini..?')" href="?page=dispo&aksi=hapus&id=<?php echo $data['id']; ?>" type="button" class="btn btn-danger" title="hapus"><i class="fas fa-trash-alt"></i></a>
                    </div>
                    </td>                      
                        </tr>
                    </tbody>
                    </table>
              </div>
            </div>
        </div>
    </div>
</div>