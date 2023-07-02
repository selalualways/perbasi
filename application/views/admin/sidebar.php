<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url('AdminBSB')?>/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</div>
                    <div class="email">perbasibjm@gmail.com</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profil</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="<?php echo $menu_home ?>">
                        <a href="<?php echo site_url('Admin') ?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="<?php echo $menu_klub ?>">
                        <a href="<?php echo site_url('Klub') ?>">
                            <i class="material-icons">group_work</i>
                            <span>Klub</span>
                        </a>
                    </li>
                    <li class="<?php echo $menu_pemain ?>">
                        <a href="<?php echo site_url('Pemain') ?>">
                            <i class="material-icons">directions_run</i>
                            <span>Pemain</span>
                        </a>
                    </li>
                    <li class="<?php echo $menu_pelatih ?>">
                        <a href="<?php echo site_url('Pelatih') ?>">
                            <i class="material-icons">sports</i>
                            <span>Pelatih</span>
                        </a>
                    </li>
                    <li class="<?php echo $menu_wasit ?>">
                        <a href="<?php echo site_url('Wasit') ?>">
                            <i class="material-icons">flag</i>
                            <span>Wasit</span>
                        </a>
                    </li>
                    <li class="<?php echo $menu_berita ?>">
                        <a href="<?php echo site_url('Berita') ?>">
                            <i class="material-icons">assignment</i>
                            <span>Berita</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Login/logout') ?>">
                            <i class="material-icons">exit_to_app</i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        
    </section>