<section class="content">
   <div class="container-fluid">
      <div class="block-header">
            <h2>PEMAIN</h2>
      </div>
      
      <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="header">
                        <div class="row clearfix">
                           <div class="col-xs-12 col-sm-6">
                              <h2>DAFTAR PEMAIN</h2>
                           </div>
                           <div class="col-xs-12 col-sm-6 align-right">
                           <a href="<?php echo site_url('Pemain/tambah_pemain') ?>" class="btn btn-primary"> 
                              <i class="material-icons">add</i> <span>Tambah</span></a>
                           </div>
                        </div>
                  </div>
                  <div class="body">
                  <table class="table">
                     <tr> 
                        <th>NIK</th>
                        <th>Nama Pemain</th>
                        <th>ID Klub</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Tinggi Badan</th>
                        <th>Berat Badan</th>
                        <th>Foto Pemain</th>
                     </tr>
                     <?php foreach($data_pemain as $row) { ?>
                     <tr>
                        <td><?php echo $row->nik; ?></td>
                        <td><?php echo $row->nama_pemain; ?></td>
                        <td><?php echo $row->id_klub; ?></td>
                        <td><?php echo $row->tempat_lahir; ?></td>
                        <td><?php echo $row->tanggal_lahir; ?></td>
                        <td><?php echo $row->tinggi_badan; ?></td>
                        <td><?php echo $row->berat_badan; ?></td>
                        <td><?php echo $row->foto_pemain; ?></td>
                        <td>
                           <a href="<?php echo site_url('Pemain/ubah_pemain/'. $row->nik) ?>" class="btn btn-sm btn-warning"> 
                              <i class="material-icons">create</i> <span>Ubah</span></a>
                           <a href="<?php echo site_url('Pemain/hapus_pemain/'. $row->nik) ?>" class="btn btn-sm btn-danger"> 
                              <i class="material-icons">clear</i> <span>Hapus</span></a>
                        </td>
                     </tr>
                     <?php } ?>

                  </table>
                  </div>
               </div>
            </div>
      </div>
   </div>
</section>