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
        <li class="active">Detail Request Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-xs-12">
   <div class="box">
      <div class="box-header">
         <h3 class="box-title">Data Request</h3>
         
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
               <div class="row">
                  <div class="col-xs-12">
                     <div class="form-group" style="margin-top:10px">
                        <span class="col-xs-2" style="margin-left:10px; margin-bottom:15px; font-size:18px">Nomor Nota :</span>
                        <div class="col-xs-4">
                           <input class="form-control" type="text" readonly="" id="onlynumber" value="<?php echo $nota['nomor'] ?>"  name="nomor" maxlength="11"  required />
                        </div>
                        <span class="col-xs-2" style="margin-left:10px; margin-bottom:15px; font-size:18px">Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                        <div class="col-xs-3">
                           <input class="form-control" value="<?php echo $nota['tobeuser'] ?>"  type="text" readonly="" id="onlynumber" name="disposisi" maxlength="15"  required />
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12" style="margin-top:10px">
                     <div class="form-group">
                        <span class="col-xs-2" style="margin-left:10px; margin-bottom:15px; font-size:18px">Nama bidang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                        <div class="col-xs-3">
                           <input class="form-control" type="text" value="<?php echo $this->session->userdata('nama_bidang'); ?>" readonly="" id="user" name="namauser" maxlength="50"  required />
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12" style="margin-top:10px">
                     <div class="form-group">
                        <span class="col-xs-2" style="margin-left:10px; margin-bottom:15px; font-size:18px">Nama sub bidang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                        <div class="col-xs-3">
                           <input class="form-control" type="text" value="<?php echo $this->session->userdata('nama_seksi'); ?>" readonly="" id="user" name="namauser" maxlength="50"  required />
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-xs-12" style="margin-top:10px">
                     <div class="form-group">
                        <span class="col-xs-2" style="margin-left:10px; margin-bottom:15px; font-size:18px">Oleh &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                        <div class="col-xs-3">
                           <input class="form-control" type="text" value="<?php echo $this->session->userdata('username'); ?>" readonly="" id="user" name="namauser" maxlength="50"  required />
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12" style="margin-top:10px">
                     <div class="form-group">
                        <span class="col-xs-2" style="margin-left:10px; margin-bottom:15px; font-size:18px">nama use case &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                        <div class="col-xs-3">
                           <input class="form-control" type="text" value="<?php echo $nota['isi_nota']; ?>" readonly="" id="user" name="namauser" maxlength="50"  required />
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12" style="margin-top:15px">
                     <div class="form-group">
                        <span class="col-xs-2" style="margin-left:10px; margin-bottom:15px; font-size:18px">Deskripsi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span>
                        <div class="col-xs-4">
                           <textarea disabled class="textarea" name="keterangan" placeholder="isi nota"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $nota['deskripsi'] ?></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12" style="margin-top:15px">
                     <div class="form-group">
                        <span class="col-xs-2" style="margin-left:10px; margin-bottom:15px; font-size:18px">Keterangan use case &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span>
                        <div class="col-xs-4">
                           <textarea disabled class="textarea" name="isi_nota" placeholder="isi nota"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $nota['isi_nota'] ?></textarea>
                        </div>
                     </div>
                  </div>

                  <div class="col-xs-12" style="margin-top:15px">
                     <div class="form-group">
                        <span class="col-xs-2" style="margin-left:10px; margin-bottom:15px; font-size:18px">jenis data & stakeholder &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span>
                        <div class="col-xs-4">
                           <textarea disabled class="textarea" name="isi_nota" placeholder="isi nota"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $nota['stakeholder'] ?></textarea>
                        </div>
                     </div>
                  </div>


                  <div class="col-xs-12" style="margin-top:15px; margin-bottom: 10px">
                     <div class="form-group">
                     <a href="<?php echo base_url().'admin/permintaan/download?nomor=',$nota['nomor']; ?>" class="dwn">Download file</a>
                     </div>
                  </div>
                  
             
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
                           </tr>
                           <?php $no++; ?>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  </div>
                  
                  
                  <!-- /.col -->
               </div>
               <!-- /.row -->
            </div>
      <!-- /.box-body -->
   </div>
   <!-- /.box -->
</div>  
<?php $this->load->view('admin/footer') ?>
</body>
</html>
