<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/template/back/dist') ?>/img/user2-160x160.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('nama') ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                <i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
        
<!-- LEVEL      -->
      <?php $level = $this->session->userdata('level'); ?>
      <?php if ($level == 1): ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Request Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?php echo site_url('admin/permintaan') ?>"><i class="fa fa-plus"></i> List Request Data</a></li>
          
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-user"></i> <span>Profile Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?php echo site_url('admin/permintaan/profile') ?>"><i class="fa fa-user"></i> Edit Profil</a></li>
          
        </ul>
      </li>

      <?php elseif ($level == 2): ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Request Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?php echo site_url('admin/permintaan') ?>"><i class="fa fa-edit"></i>Approval Request Data</a></li>
          <li><a href="<?php echo site_url('admin/histori') ?>"><i class="fa fa-search"></i> History Request Data</a></li>
          
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-user"></i> <span>Profile Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?php echo site_url('admin/permintaan/profile') ?>"><i class="fa fa-user"></i> Edit Profil</a></li>
          
        </ul>
      </li>
      <?php elseif ($level == 3): ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Request Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?php echo site_url('admin/permintaan') ?>"><i class="fa fa-edit"></i>Approval Request Data</a></li>
          <li><a href="<?php echo site_url('admin/historidg') ?>"><i class="fa fa-search"></i> History Request Data</a></li>
          
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-user"></i> <span>Profile Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?php echo site_url('admin/permintaan/profile') ?>"><i class="fa fa-user"></i> Edit Profil</a></li>
          
        </ul>
      </li>

      <?php elseif ($level == 4): ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Request Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?php echo site_url('admin/permintaan') ?>"><i class="fa fa-edit"></i>Approval Request Data</a></li>
          <li><a href="<?php echo site_url('admin/historia') ?>"><i class="fa fa-search"></i> History Request Data</a></li>
          
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-user"></i> <span>Profile Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?php echo site_url('admin/permintaan/profile') ?>"><i class="fa fa-user"></i> Edit Profil</a></li>
          
        </ul>
      </li>
      <?php endif; ?>
<!-- LEVEL      -->
      
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
