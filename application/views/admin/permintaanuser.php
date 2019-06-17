<!DOCTYPE html>
<html>
  <?php $this->load->view('admin/head') ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('admin/header') ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('admin/leftbar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List Request Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
      </div>
      <!-- /.row -->

      <div class="col-xs-15">
        <div class="box">
        <div class="box-header">
           <h3 class="box-title">Data Request</h3>
           <?php $level = $this->session->userdata('level'); ?>
           <?php if ($level == 2): ?>
           <div class="pull-right"></div>
           <?php elseif($level == 3): ?>
           <div class="pull-right"></div>
         <?php elseif($level == 4): ?>
           <div class="pull-right"></div>
           <?php else: ?>
           <div class="pull-right">
            <?php echo anchor('admin/permintaan/add', 'Ajukan Request Data', array('class' => 'btn btn-danger')) ?>
             
           </div>
           <?php endif; ?>
           <?php
              if ($this->session->flashdata('Berhasil')) {
                  echo "<div class='alert alert-info'>";
                  echo $this->session->flashdata('Berhasil');
                  echo "</div>";
              } elseif ($this->session->flashdata('edit')) {
                  echo "<div class='alert alert-warning'>";
                  echo $this->session->flashdata('edit');
                  echo "</div>";
              } elseif ($this->session->flashdata('hapus')) {
                  echo "<div class='alert alert-warning bg-danger'>";
                  echo $this->session->flashdata('hapus');
                  echo "</div>";
              } elseif ($this->session->flashdata('file')) {
                  echo "<div class='alert alert-warning bg-danger'>";
                  echo $this->session->flashdata('file');
                  echo "</div>";
              }
              ?>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
           <table id="example1" class="table table-bordered table-hover">
              <thead>
                 <tr>
                    <th>No</th>
                    <th>Nomor Nota</th>
                    <th>Status</th>
                    <th>Sub Divisi</th>
                    <th>Tanggal</th>
                    <th>Next Approval</th>
                    <th>Action</th>
                 </tr>
              </thead>
              <tbody>
                 <?php $level = $this->session->userdata('level'); ?>
                 <?php $namanya = $this->session->userdata('username');?>
                 <?php
                    $no = 1;
                    foreach ($nota as $p):
                        ?>
                 <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $p->nomor ?></td>
                    <td><span class="label label-warning"><?php echo $p->disposisi ?> By <?php echo $p->last_edit?></span></td>
                    <td><?php echo $p->nama_subbidang ?></td>
                    <td><?php echo $p->tanggal ?></td>
                    

                       <!--USER -->
                    <?php if ($level == 1): ?>
                          
                          <?php if ($p->tobeuser=='user' ): ?>
                            <td><span class="label label-success"><?php echo $p->tobeuser ?></span></td>
                            <td><?php echo anchor('admin/permintaan/editreturn/' . $p->id_nota, 'EDIT', array('class' => 'label label-info')) ?></td>
                          <?php else:?>
                            <td><span class="label label-success"><?php echo $p->tobeuser ?></span></td>
                            <td><?php echo anchor('admin/permintaan/lihat/' . $p->id_nota, 'LIHAT', array('class' => 'label label-info')) ?></td>
                          <?php endif ?>

                       <!--DATA OWNER -->

                    <?php elseif ($level ==2): ?>
                      <?php if ($namanya==$p->last_edit || $p->tobeuser=='FINISH' ): ?>
                            <td><span class="label label-success"><?php echo $p->tobeuser ?></span></td>
                            <td><span class="label label-info">EDITED by <?php echo $p->last_edit?></span></td>
                      <?php else:?>
                            <td><span class="label label-success"><?php echo $p->tobeuser ?></span></td>
                            <?php if ($namanya!=$p->last_edit || $p->tobeuser=='dataowner'): ?>
                              <td><?php echo anchor('admin/permintaan/edit/' . $p->id_nota, 'EDIT', array('class' => 'label label-info')) ?></td>
                            <?php else:?>
                              <td><span class="label label-danger">RESTRICTED</span></td>
                            <?php endif ?> 
                      <?php endif ?>

                       <!--DG Council-->

                    <?php elseif($level ==3): ?>
                      <?php if ($namanya==$p->last_edit): ?>
                            <td><span class="label label-success"><?php echo $p->tobeuser ?></span></td>
                            <td><span class="label label-info">EDITED</span></td>
                      <?php else:?>
                            <td><span class="label label-success"><?php echo $p->tobeuser ?></span></td>
                            <?php if ($namanya==$p->tobeuser): ?>
                              <td><?php echo anchor('admin/permintaan/edit/' . $p->id_nota, 'EDIT', array('class' => 'label label-info')) ?></td>
                            <?php else:?>
                              <td><span class="label label-danger">RESTRICTED</span></td>
                            <?php endif ?>        
                      <?php endif ?>


                       <!--ADMIN-->

                    <?php elseif($level ==4): ?>
                            
                       <?php if ($namanya==$p->last_edit): ?>
                            <td><span class="label label-success"><?php echo $p->tobeuser ?></span></td>
                            <td><span class="label label-info">EDITED</span></td>
                       <?php else:?>
                            <td><span class="label label-success"><?php echo $p->tobeuser ?></span></td>
                            <?php if ($namanya==$p->tobeuser ): ?>
                              <td><?php echo anchor('admin/permintaan/edit/' . $p->id_nota, 'EDIT', array('class' => 'label label-info')) ?></td>
                            <?php else:?>
                              <td><span class="label label-danger">RESTRICTED</span></td>
                            <?php endif ?> 
                            <?php endif ?>      
                    <?php endif; ?>
                 </tr>
                 <?php $no++; ?>
                 <?php endforeach; ?>
              </tbody>
           </table>
        </div>
        <!-- /.box-body -->
     </div>
     <!-- /.box -->
  </div>
        <!-- /.col -->
      
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Visitors Report</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="row">
                <div class="col-md-9 col-sm-8">
                  <div class="pad">
                    <!-- Map will be created here -->
                    <div id="world-map-markers" style="height: 325px;"></div>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-4">
                  <div class="pad box-pane-right bg-green" style="min-height: 280px">
                    <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                      <h5 class="description-header">8390</h5>
                      <span class="description-text">Visits</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                      <h5 class="description-header">30%</h5>
                      <span class="description-text">Referrals</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description-block">
                      <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                      <h5 class="description-header">70%</h5>
                      <span class="description-text">Organic</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div class="row">
            <div class="col-md-6">
            </div>
            <!-- /.col -->

            <div class="col-md-6">
            </div>
            <!-- /.col -->
          </div>
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Inventory</span>
              <span class="info-box-number">5,200</span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Mentions</span>
              <span class="info-box-number">92,050</span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
              <span class="progress-description">
                    20% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Downloads</span>
              <span class="info-box-number">114,381</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Direct Messages</span>
              <span class="info-box-number">163,921</span>

              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
              <span class="progress-description">
                    40% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php $this->load->view('admin/footer') ?>
</body>
</html>
