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
                              <h2><?php echo $judul ?></h2>
                           </div>
                        </div>
                  </div>
                  <div class="body">
                    <?php echo form_open($action, 'class="form-horizontal" enctype="multipart/form-data"') ?>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="nik">NIK</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK"
                                            value="<?php echo $nik ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="nama_pemain">Nama Pemain</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="nama_pemain" class="form-control" placeholder="Masukkan Nama"
                                        value="<?php echo $nama_pemain ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Maunya ID Pemain Drop Down List -->
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="id_klub">ID Klub</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    
                                        <select class="form-control show-tick" name="id_klub">
                                        <?php

                                        foreach($data_klub as $klub){ ?>
                                            <option value='<?php echo $klub->id_klub ?>' <?php if($klub->id_klub == $id_klub) { echo "selected"; } ?>>
                                                <?php echo $klub->nama_klub ?>
                                            </option>
                                        <?php } ?>
                                    </select>   
                                        
                                </div>
                            </div>
                        </div>
                        <!-- Maunya ID Pemain Drop Down List -->

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="tempat_lahir">Tempat Lahir</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir Pemain"
                                        value="<?php echo $tempat_lahir ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="tanggal_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir Pemain"
                                        value="<?php echo $tanggal_lahir ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="tinggi_badan">Tinggi Badan</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="tinggi_badan" class="form-control" placeholder="Masukkan Tinggi Badan Pemain"
                                        value="<?php echo $tinggi_badan ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="berat_badan">Berat Badan</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="berat_badan" class="form-control" placeholder="Masukkan Berat Badan Pemain"
                                        value="<?php echo $berat_badan ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="foto_pemain">Foto Pemain</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="foto_pemain" class="form-control" value="<?php echo $foto_pemain ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <a href="<?php echo site_url('Pemain') ?>" class="btn btn-danger">Kembali</a>
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