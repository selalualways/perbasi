<section class="content">
   <div class="container-fluid">
      <div class="block-header">
            <h2>BERITA</h2>
      </div>
      
      <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="header">
                        <div class="row clearfix">
                           <div class="col-xs-12 col-sm-6">
                              <h2>DAFTAR BERITA</h2>
                           </div>
                           <div class="col-xs-12 col-sm-6 align-right">
                           <a href="<?php echo site_url('Berita/tambah_berita') ?>" class="btn btn-primary"> 
                              <i class="material-icons">add</i> <span>Tambah</span></a>
                           </div>
                        </div>
                  </div>
                  <div class="body">
                  <table class="table-responsive table-bordered table-striped" id="tabelberita">
                     <thead>
                     <tr> 
                        <td width="30px">No</td>
                        <td width="150px">Tanggal</td>
                        <td width="300px">Judul</td>
                        <td width="250px">Foto</th>
                        <td width="500px">Isi</td>
                        <td width="250px">Aksi</td>
                     </tr>
                     </thead>
                     <tbody>
                     <?php foreach($data_berita as $row) { ?>
                     <tr>
                        <td><?php echo $row->id_berita; ?></td>
                        <td align="center"><?php echo $row->tanggal; ?></td>
                        <td><?php echo $row->judul; ?></td>
                        <td>
                        <?php if ($row->foto != NULL || $row->foto != "") { ?>
                              <img src="<?php echo base_url('uploads/fotoberita/'.$row->foto); ?>" style="height: 90px;border: 1px solid black;" />
                           <?php } ?>
                        </td>
                        <td><?php echo $row->isi; ?></td>
                        <td class="text-nowrap">
                           <a href="<?php echo site_url('Berita/ubah_berita/'. $row->id_berita) ?>" class="btn btn-sm btn-warning"> 
                              <i class="material-icons">create</i> <span>Ubah</span></a>
                           <a href="<?php echo site_url('Berita/hapus_berita/'. $row->id_berita) ?>" class="btn btn-sm btn-danger"> 
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
      $('#tabelberita').DataTable();
   })
</script> 