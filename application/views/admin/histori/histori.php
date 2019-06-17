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
        <li class="active">List History</li>
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
         <h3 class="box-title">History Data Request</h3>
         
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
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Tanggal</th>
                  <th>Catatan</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               
               <?php
                  $no = 1;
                  foreach ($histori as $p):
                      ?>
               <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $p->nomor ?></td>
                  <td><?php echo $p->username ?></td>
                  <td><?php echo $p->tobeuser ?></td>
                  <td><?php echo $p->tanggal ?></td>
                  <td><?php echo $p->catatan ?></td>
                  <td><?php echo anchor('admin/historia/lihat_histori/' . $p->id_nota, 'LIHAT', array('class' => 'label label-info')) ?></td>
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
  
</body>
</html>
