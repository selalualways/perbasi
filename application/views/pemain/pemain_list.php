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
                  <table class="table table-bordered table-striped" id="tabelpemain">
                     <thead>
                     <tr> 
                        <td width="30px">No</td>
                        <td width="350px">Nama Pemain</td>
                        <td width="150px">Klub</td>
                        <td width="200px">Tempat Lahir</td>
                        <td width="150px">Tanggal Lahir</td>
                        <td width="150px">Tinggi Badan</td>
                        <td width="150px">Berat Badan</td>
                        <td width="150px">Foto Pemain</td>
                        <td width="250px">Aksi</td>
                     </tr>
                     </thead>
                     <tbody>
                     <?php foreach($data_pemain as $row) { ?>
                     <tr>
                        <td align="center"><?php echo $row->nik; ?></td>
                        <td><?php echo $row->nama_pemain; ?></td>
                        <td><?php echo $row->nama_klub; ?></td>
                        <td align="center"><?php echo $row->tempat_lahir; ?></td>
                        <td align="center"><?php echo $row->tanggal_lahir; ?></td>
                        <td align="center"><?php echo $row->tinggi_badan; ?></td>
                        <td align="center"><?php echo $row->berat_badan; ?></td>
                        <td align="center">
                           <?php if ($row->foto_pemain != NULL || $row->foto_pemain != "") { ?>
                              <img src="<?php echo base_url('uploads/fotopemain/'.$row->foto_pemain); ?>" style="height: 90px;border: 1px solid black;" />
                           <?php } ?>
                        </td>
                        <td class="text-nowrap">
                           <a href="<?php echo site_url('Pemain/ubah_pemain/'. $row->nik) ?>" class="btn btn-sm btn-warning"> 
                              <i class="material-icons">create</i> <span>Ubah</span></a>
                           <a href="<?php echo site_url('Pemain/hapus_pemain/'. $row->nik) ?>" class="btn btn-sm btn-danger"> 
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
      $('#tabelpemain').DataTable();
   })
</script>   