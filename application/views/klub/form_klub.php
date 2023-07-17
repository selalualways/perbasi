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
                              <h2><?php echo $judul ?></h2>
                           </div>
                        </div>
                  </div>
                  <div class="body">
                    <?php echo form_open($action, 'class="form-horizontal" enctype="multipart/form-data"') ?>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="nama_klub">Nama Klub</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="hidden" value="<?= $id_klub; ?>" name="id_klub">
                                        <input type="text" name="nama_klub" class="form-control" placeholder="Masukkan Nama Klub"
                                        value="<?php echo $nama_klub ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="pengurus">Nama Pengurus</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="pengurus" class="form-control" placeholder="Masukkan Nama Pengurus"
                                        value="<?php echo $pengurus ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if($logo == NULL || $logo == "") { ?>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="foto_pemain">Logo</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="logo" class="form-control" value="<?php echo $logo ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } else { ?>
                            <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="foto_pemain">Logo</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                    <img src="<?php echo base_url('uploads/logo/'.$logo); ?>" style="height: 90px;border: 1px solid black;" />
                                    </div>
                                    <br/>
                                    <a class="resetfoto" href="<?php echo site_url('Klub/resetlogo/'.$id_klub.''); ?>" ><i class="material-icons">clear</i> Reset Logo</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($struktur_pengurus == NULL || $struktur_pengurus == "") { ?>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="foto_pemain">Struktur Pengurus</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="struktur_pengurus" class="form-control" value="<?php echo $struktur_pengurus ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } else { ?>
                            <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="foto_pemain">Struktur Pengurus</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                    <img src="<?php echo base_url('uploads/struktur_pengurus/'.$struktur_pengurus); ?>" style="height: 90px;border: 1px solid black;" />
                                    </div>
                                    <br/>
                                    <a class="resetfoto" href="<?php echo site_url('Klub/resetstruktur/'.$id_klub.''); ?>" ><i class="material-icons">clear</i> Reset Logo</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row clearfix">
                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <a href="<?php echo site_url('Klub') ?>" class="btn btn-danger">Kembali</a>
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