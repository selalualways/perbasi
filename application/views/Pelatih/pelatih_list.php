<section class="content">
   <div class="container-fluid">
      <div class="block-header">
            <h2>Pelatih</h2>
      </div>
      
      <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="header">
                        <div class="row clearfix">
                           <div class="col-xs-12 col-sm-6">
                              <h2>DAFTAR PELATIH</h2>
                           </div>
                           <div class="col-xs-12 col-sm-6 align-right">
                           <a href="<?php echo site_url('Pelatih/tambah_pelatih') ?>" class="btn btn-primary"> 
                              <i class="material-icons">add</i> <span>Tambah</span></a>
                           </div>
                        </div>
                  </div>
                  <div class="body">
                  <table class="table-responsive table-bordered table-striped" id="tabelpelatih">
                  <thead>
                     <tr> 
                        <th>NIK</th>
                        <th>Nama Pelatih</th>
                        <th>Lisensi</th>
                     </tr>
                     </thead>
                     <tbody>
                     <?php foreach($data_pelatih as $row) { ?>
                     <tr>
                        <td><?php echo $row->nik; ?></td>
                        <td><?php echo $row->nama_pelatih; ?></td>
                        <td><?php echo $row->lisensi; ?></td>
                        <td class="text-nowrap">
                           <a href="<?php echo site_url('Pelatih/ubah_pelatih/'. $row->nik) ?>" class="btn btn-sm btn-warning"> 
                              <i class="material-icons">create</i> <span>Ubah</span></a>
                           <a href="<?php echo site_url('Pelatih/hapus_pelatih/'. $row->nik) ?>" class="btn btn-sm btn-danger"> 
                              <i class="material-icons">clear</i> <span>Hapus</span></a>
                        </td>
                     </tr>
                     <?php } ?>
                     </tbody>
                  </table>
                  </div>
               </div>
            </div>
      </div>
   </div>
</section>
<script>
   document.addEventListener('DOMContentLoaded', function(){
      $('#tabelpelatih').DataTable();
   })
</script> 