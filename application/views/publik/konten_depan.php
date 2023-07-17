<div class="matchs-info">
   <section id="contant" class="contant">
      <div class="container">
         <div class="row">
            <?php
            foreach($berita as $row){ ?>
            <div class="col-lg-6 col-sm-6 col-xs-12">
               <div class="news-post-holder">
                  <div class="news-post-widget">
                     <img class="img-responsive" src="<?php echo base_url('uploads/fotoberita/'.$row->foto); ?>" alt="">
                     <div class="news-post-detail">
                        <span class="date"><?= date('d-m-Y H:i:s', strtotime($row->tanggal)); ?></span>
                        <h2><a href="<?php echo site_url('Publik/berita/'.$row->slug); ?>#contant"><?= $row->judul; ?></a></h2>
                        <p><?php echo substr($row->isi, 0, 100) . '...'; ?></p>
                     </div>
                  </div>
               </div>
            </div>
            <?php } ?>
         </div>
      </div>
   </section>
</div>
      