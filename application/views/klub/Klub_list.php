<section class="content">
   <div class="container-fluid">
      <div class="block-header">
            <h2>KLUB</h2>
      </div>
      
      <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="header">
                        <div class="row clearfix">
                           <div class="col-xs-12 col-sm-6">
                              <h2>DAFTAR KLUB</h2>
                           </div>
                           <div class="col-xs-12 col-sm-6 align-right">
                           <a href="<?php echo site_url('Klub/tambah_klub') ?>" class="btn btn-primary"> 
                              <i class="material-icons">add</i> <span>Tambah</span></a>
                           </div>
                        </div>
                  </div>
                  <div class="body">
                  <table class="table">
                     <tr> 
                        <th>ID Klub</th>
                        <th>Nama Klub</th>
                        <th>Pengurus</th>
                        <th>Logo</th>
                        <th>Struktur Pengurus</th>
                        <th>Aksi</th>
                     </tr>
                     <?php foreach($data_klub as $row) { ?>
                     <tr>
                        <td><?php echo $row->id_klub; ?></td>
                        <td><?php echo $row->nama_klub; ?></td>
                        <td><?php echo $row->pengurus; ?></td>
                        <td><?php echo $row->logo; ?></td>
                        <td><?php echo $row->struktur_pengurus; ?></td>
                        <td>
                           <a href="<?php echo site_url('Klub/hapus_klub/'. $row->id_klub) ?>" class="btn btn-sm btn-danger"> 
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