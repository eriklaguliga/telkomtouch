<header class="main-header">
  <!-- Logo -->
  <a href="<?php echo base_url('admin/home') ?>" class="logo">

    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b></b>DG</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg" ><b>DTP</b>DG</span>
  </a>

  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <?php $level = $this->session->userdata('level'); ?>
        <?php if ($level == 1): ?>  
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success"><?php echo $jumlah ?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have <?php echo $jumlah ?> messages</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li><!-- start message -->
                <?php
                  $no = 1;
                  foreach ($hasil as $h):
                ?>
                  <a href="<?php echo base_url('admin/permintaan/editreturn/' .$h['id_nota']) ?>">
                    <div class="pull-left">
                      <img src="<?php echo base_url('assets/template/back/dist') ?>/img/user2-160x160.png" class="user-image" alt="User Image">
                    </div>
                    <h4>
                      <?php echo $h['last_edit'] ?>
                      <small><i class="fa fa-clock-o"></i> <?php echo $h['tanggal'] ?></small>
                    </h4>
                    <p><?php echo $h['isi_nota'] ?></p>
                  </a>
                <?php $no++; ?>
                <?php endforeach; ?>
                </li>
                <!-- end message -->
                
              </ul>
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>
          </ul>
        </li>
        
        <?php elseif ($level == 2): ?>
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success"><?php echo $jumlah ?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have <?php echo $jumlah ?> messages</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li><!-- start message -->
                <?php
                  $no = 1;
                  foreach ($hasil as $h):
                ?>
                  <a href="<?php echo base_url('admin/permintaan/editmail/' .$h['id_nota']) ?>">
                    <div class="pull-left">
                      <img src="<?php echo base_url('assets/template/back/dist') ?>/img/user2-160x160.png" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                      <?php echo $h['last_edit'] ?>
                      <small><i class="fa fa-clock-o"></i> <?php echo $h['tanggal'] ?></small>
                    </h4>
                    <p><?php echo $h['isi_nota'] ?></p>
                  </a>
                <?php $no++; ?>
                <?php endforeach; ?>
                </li>
                <!-- end message -->
                
              </ul>
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>
          </ul>
        </li>

        <?php elseif ($level == 3): ?>
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success"><?php echo $jumlah ?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have <?php echo $jumlah ?> messages</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li><!-- start message -->
                <?php
                  $no = 1;
                  foreach ($hasil as $h):
                ?>
                  <a href="<?php echo base_url('admin/permintaan/editmail/' .$h['id_nota']) ?>">
                    <div class="pull-left">
                      <img src="<?php echo base_url('assets/template/back/dist') ?>/img/user2-160x160.png" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                      <?php echo $h['last_edit'] ?>
                      <small><i class="fa fa-clock-o"></i> <?php echo $h['tanggal'] ?></small>
                    </h4>
                    <p><?php echo $h['isi_nota'] ?></p>
                  </a>
                <?php $no++; ?>
                <?php endforeach; ?>
                </li>
                <!-- end message -->
                
              </ul>
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>
          </ul>
        </li>

      <?php elseif ($level == 4): ?>
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success"><?php echo $jumlah ?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have <?php echo $jumlah ?> messages</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li><!-- start message -->
                <?php
                  $no = 1;
                  foreach ($hasil as $h):
                ?>
                  <a href="<?php echo base_url('admin/permintaan/editmail/' .$h['id_nota']) ?>">
                    <div class="pull-left">
                      <img src="<?php echo base_url('assets/template/back/dist') ?>/img/user2-160x160.png" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                      <?php echo $h['last_edit'] ?>
                      <small><i class="fa fa-clock-o"></i> <?php echo $h['tanggal'] ?></small>
                    </h4>
                    <p><?php echo $h['isi_nota'] ?></p>
                  </a>
                <?php $no++; ?>
                <?php endforeach; ?>
                </li>
                <!-- end message -->
                
              </ul>
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>
          </ul>
        </li>
        <?php endif; ?>
        <!-- Notifications: style can be found in dropdown.less -->
        
        <!-- Tasks: style can be found in dropdown.less -->
        
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url('assets/template/back/dist') ?>/img/user2-160x160.png" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $this->session->userdata('nama') ?></span>

          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo base_url('assets/template/back/dist') ?>/img/user2-160x160.png" class="img-circle" alt="User Image">

              <p>
                <?php echo $this->session->userdata('nama') ?>
                <small><?php echo $profil['username'] ?></small>
              </p>
            </li>
            <!-- Menu Body -->
            
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?php echo site_url('admin/permintaan/profile') ?>" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="<?php echo site_url('Auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>

  </nav>
</header>
