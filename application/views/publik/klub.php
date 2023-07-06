<section id="contant" class="contant main-heading team">
         <div class="row">
            <div class="container">
            <?php foreach($data_klub as $row) { ?>
               <div class="col-md-4 column">
                  <div class="card">
                     <img class="img-responsive" src="<?php echo base_url('/uploads/logo/'.$row->foto_pemain); ?>" alt="John" style="width:100%">
                     <div class="">
                        <h4><?php echo $row->nama_klub; ?></h4>
                        <p class="title"><?php echo $row->nama_klub; ?></p>
                        <p>
                        <!-- <div class="center"><button class="button">Contact</button></div> -->
                        </p>
                     </div>
                  </div>
               </div>
            <?php } ?>
            </div>
         </div>
      </section>