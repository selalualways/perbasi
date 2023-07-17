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
                              <h2><?php echo $judul ?></h2>
                           </div>
                        </div>
                  </div>
                  <div class="body">
                    <?php echo form_open($action, 'class="form-horizontal" enctype="multipart/form-data"') ?>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="tanggal">Tanggal</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="hidden" value="<?= $id_berita; ?>" name="id_berita" />
                                        <input type="datetime-local" name="tanggal" class="form-control" placeholder="Masukkan Tanggal"
                                        value="<?php echo $tanggal ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="judul">Judul</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Berita"
                                        value="<?php echo $judul ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <?php if($foto == NULL || $foto == "") { ?>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="foto_pemain">Foto Berita</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="foto_berita" class="form-control" value="<?php echo $foto ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } else { ?>
                            <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="foto_pemain">Foto Berita</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                    <img src="<?php echo base_url('uploads/fotoberita/'.$foto); ?>" style="height: 90px;border: 1px solid black;" />
                                    </div>
                                    <br/>
                                    <a class="resetfoto" href="<?php echo site_url('Berita/resetfoto/'.$id_berita.''); ?>" ><i class="material-icons">clear</i> Reset Foto</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="isi">Isi Berita</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                    <textarea cols="110" name="isi" rows="10"  placeholder="Masukkan Isi Berita"><?php echo $isi ?></textarea>

                                    </div>
                                </div>
                            </div>
                        </div>

                        

                        <div class="row clearfix">
                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <a href="<?php echo site_url('Berita') ?>" class="btn btn-danger">Kembali</a>
                                <input type="submit" value="Simpan" class="btn btn-primary">
                            </div>
                        </div>

                        <?php echo form_close() ?>
                  </div>
               </div>
            </div>
      </div>
   </div>
</section>