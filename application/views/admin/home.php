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
      <!-- /.row -->
  <?php $this->load->view('admin/footer') ?>
</body>
</html>
