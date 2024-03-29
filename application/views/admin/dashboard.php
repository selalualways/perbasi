
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">group_work</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL KLUB</div>
                            <div class="number count-to" data-from="0" data-to="<?= $data_klub; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">directions_run</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL PEMAIN</div>
                            <div class="number count-to" data-from="0" data-to="<?= $data_pemain; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">sports</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL PELATIH</div>
                            <div class="number count-to" data-from="0" data-to="<?= $data_pelatih; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">flag</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL WASIT</div>
                            <div class="number count-to" data-from="0" data-to="<?= $data_wasit; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- #END# Widgets -->
            </div>
        </div>
    </section>
