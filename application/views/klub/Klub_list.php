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
                  <table class="table table-bordered table-striped" id="tabelklub">
                     <thead>
                        <tr> 
                           <td width="30px">No</td>
                           <td width="250px">Nama Klub</td>
                           <td width="250px">Pengurus</td>
                           <td width="150px">Logo</td>
                           <td width="250px">Struktur Pengurus</td>
                           <td width="250px">Aksi</td>
                        </tr>
                     </thead>
                     <tbody>
                     <?php foreach($data_klub as $row) { ?>
                     <tr>
                        <td align="center" width="30px"><?php echo $row->id_klub; ?></td>
                        <td><?php echo $row->nama_klub; ?></td>
                        <td><?php echo $row->pengurus; ?></td>
                        <td alugn="center"><?php echo $row->logo; ?></td>
                        <td align="center"><?php echo $row->struktur_pengurus; ?></td>
                        <td class="text-nowrap">
                           <a href="<?php echo site_url('Klub/ubah_klub/'. $row->id_klub) ?>" class="btn btn-sm btn-warning"> 
                              <i class="material-icons">create</i> <span>Ubah</span></a>
                           <a href="<?php echo site_url('Klub/hapus_klub/'. $row->id_klub) ?>" class="btn btn-sm btn-danger"> 
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
      $('#tabelklub').DataTable();
   })
</script>  