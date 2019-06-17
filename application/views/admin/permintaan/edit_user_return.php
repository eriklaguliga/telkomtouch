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
        <li class="active">Edit Request Data</li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-xs-12">
         <div class="box">
            <div class="box-header with-border">
               <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <?php
               echo form_open_multipart('admin/permintaan/editreturn');
               echo form_hidden('id_nota', $nota['id_nota']);
               ?>
            <div class="box-body">
               <div class="row">
                  <div class="col-xs-12">
                     <div class="form-group" style="margin-top:10px">
                        <span class="col-xs-2" style="margin-left:10px; margin-bottom:15px; font-size:18px">Nomor Nota :</span>
                        <div class="col-xs-4">
                           <input class="form-control" type="text" id="onlynumber" readonly="" value="<?php echo $nota['nomor'] ?>"  name="nomor" maxlength="11" autofocus required />
                        </div>
                        <span class="col-xs-2" style="margin-left:10px; margin-bottom:15px; font-size:18px">Action &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                        <div class="col-xs-3" style="margin-left:-50px;">
                           <!--<input class="form-control" value="<?php echo $nota['disposisi'] ?>"  type="text" id="onlynumber" name="disposisi" maxlength="15" autofocus required />
                              -->
                           <select id="approval" name="status" class="form-control">
                              <option value="Approved" > Approved </option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12" style="margin-top:10px">
                     <div class="form-group">
                        <span class="col-xs-2" style="margin-left:10px; margin-bottom:15px; font-size:18px">Sub Divisi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                        <div class="col-xs-4">
                           <?php echo cmb_dinamis('id_seksi','tbl_subbidang','nama_subbidang','id_seksi',$nota['id_seksi'])?>
                        </div>
                        <span class="col-xs-2" style="margin-left:10px; margin-bottom:15px; font-size:18px">Tanggal &nbsp;&nbsp;:</span>
                        <div class="col-xs-3" style="margin-left:-50px;">
                           <input class="form-control" type="text" value="<?php echo $nota['tanggal'] ?>" readonly="" id="onlynumber" name="tanggal" maxlength="11" autofocus required />
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12" style="margin-top:10px">
                     <div class="form-group">
                        <span class="col-xs-2" style="margin-left:10px; margin-bottom:15px; font-size:18px">Oleh &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                        <div class="col-xs-3">
                           <input class="form-control" type="text" value="<?php echo $this->session->userdata('username'); ?>" readonly="" id="user" name="namauser" maxlength="50" autofocus required />
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12" style="margin-top:15px">
                     <div class="form-group">
                        <span class="col-xs-2" style="margin-left:10px; margin-bottom:15px; font-size:18px">Isi Nota &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span>
                        <div class="col-xs-4">
                           <textarea class="textarea" name="isi_nota" placeholder="isi nota"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $nota['isi_nota'] ?></textarea>
                        </div>
                        <span class="col-xs-2" style="margin-left:10px; margin-bottom:15px; font-size:18px">Isi Catatan : </span>
                        <div class="col-xs-4" style="margin-left:-50px;">
                           <textarea class="textarea" name="isi_catatan" placeholder="Isi Catatan"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                     </div>
                  </div>

                  <div class="col-xs-12" style="margin-top:15px; margin-bottom: 10px">
                     <div class="form-group">
                        <span class="col-xs-4 col-xs-push-2" style="margin-left:20px; margin-top:-20px; font-size:14px; font-style:italic; color:#888">*Format file:jika di perlukan .jpg / .jpeg / .png/.docx</span>
                     </div>
                  </div>

                  <div class="col-xs-12" style="margin-top:15px">
                     <div class="form-group">
                        <span class="col-xs-2" style="margin-left:410px; margin-bottom:15px; font-size:18px"></span>
                        <div class="col-xs-2">
                           <input type="submit" name="submit" class="btn btn-lg btn-block btn-success fa fa-save" value="Simpan" />
                        </div>
                        <div class="col-xs-2 ">
                          <a href="<?php echo site_url('admin/permintaan') ?>"><input type="submit" name="submit" class="btn btn-danger btn-block btn-flat" value="Batal" /></a>
                        </div>
                     </div>
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <?php echo form_close(); ?>
         </div>
         <!-- /.box -->
      </div>
      <!-- /.col -->
   </div>
   
</body>
</html>
