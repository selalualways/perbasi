<section id="contant" class="contant main-heading team">
         <div class="row">
            <div class="container">
            <?php foreach($data_pemain as $row) { ?>
               <div class="col-md-4 column">
                  <div class="card">
                     <div class="">
                        <h4><?php echo $row->nama_pemain; ?></h4>
                        <p class="title">Posisi : <?php echo $row->posisi; ?></p>
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