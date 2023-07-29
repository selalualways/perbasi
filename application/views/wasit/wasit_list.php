<section class="content">
   <div class="container-fluid">
      <div class="block-header">
            <h2>WASIT</h2>
      </div>
      
      <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="header">
                        <div class="row clearfix">
                           <div class="col-xs-12 col-sm-6">
                              <h2>DAFTAR WASIT</h2>
                           </div>
                           <div class="col-xs-12 col-sm-6 align-right">
                           <a href="<?php echo site_url('Wasit/tambah_wasit') ?>" class="btn btn-primary"> 
                              <i class="material-icons">add</i> <span>Tambah</span></a>
                           </div>
                        </div>
                  </div>
                  <div class="body">
                  <table class="table table-striped">
                     <tr> 
                        <th>NIK</th>
                        <th>Nama Wasit</th>
                        <th>Lisensi</th>
                     </tr>
                     <?php foreach($data_wasit as $row) { ?>
                     <tr>
                        <td><?php echo $row->nik; ?></td>
                        <td><?php echo $row->nama_wasit; ?></td>
                        <td><?php echo $row->lisensi; ?></td>
                        <td class="text-nowrap">
                           <a href="<?php echo site_url('Wasit/ubah_wasit/'. $row->nik) ?>" class="btn btn-sm btn-warning"> 
                              <i class="material-icons">create</i> <span>Ubah</span></a>
                           <a href="<?php echo site_url('Wasit/hapus_wasit/'. $row->nik) ?>" class="btn btn-sm btn-danger"> 
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
