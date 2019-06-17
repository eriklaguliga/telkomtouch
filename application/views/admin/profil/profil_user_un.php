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
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
      </div>
      <!-- /.row -->
      <script type="text/javascript">
    $(document).ready(function(){
        $('#btn_updatePassword').click(function(){
          $.ajax({ 
            type: "POST",
            url: "<?php echo base_url()?>admin/permintaan/ubah_pass",
            data: $('#updatePassword').serialize(),
            success: function(response){
              console.log(response);
               if (response == "1") {
                  $('#notification').html('<div id="information" class="alert alert-warning alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><h4>  <i class="icon fa fa-check"></i> Information!</h4><span></span></div>');
                  $('#notification span').html("Password berhasil disimpan");
                  $('#password').html("");
                  $('#npassword').html("");
                  $('#cpassword').html("");
                      $('html, body').animate({
                          scrollTop: $("#top").offset().top
                      }, 300);
               } else {
                  $('#notification').html('<div id="information" class="alert alert-warning alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><h4>  <i class="icon fa fa-check"></i> Information!</h4><span></span></div>');
                  $('#notification span').html(response);
                      $('html, body').animate({
                          scrollTop: $("#top").offset().top
                      }, 300);
               }
            }
           });    
        });

        $('#btn_updateProfile').click(function(){
          $.ajax({ 
            type: "POST",
            url: "<?php echo base_url()?>admin/permintaan/profile_up",
            data: $('#updateProfile').serialize(),
            success: function(response){
              $('#notification').html('<div id="information" class="alert alert-warning alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><h4>  <i class="icon fa fa-check"></i> Information!</h4><span></span></div>');
              $('#notification span').html(response);
                  $('html, body').animate({
                      scrollTop: $("#top").offset().top
                  }, 300);
            }
           });    
        });
    });
</script>
<script>
$(document).ready(function(){
 $('#show_hide').on('click', function(){
 var passwordField = $('#password');
 var passwordFieldType = passwordField.attr('type');
 if(passwordFieldType == 'password'){
  passwordField.attr('type', 'text');
 } else {
  passwordField.attr('type', 'password');
 }
 });
});
$(document).ready(function(){
 $('#show_hide').on('click', function(){
 var passwordField = $('#password');
 var passwordFieldType = passwordField.attr('type');
 if(passwordFieldType == 'password'){
  passwordField.attr('type', 'text');
 } else {
  passwordField.attr('type', 'password');
 }
 });
});
</script>
  <div class="row" style="background:#FAFAFA;margin:1px" id="top">
  <div id="notification"></div>
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs nav-tabs-bordered">
      <li class="nav-item"><a href="#tab_1" class="nav-link active" data-toggle="tab">Profil Pengguna</a></li>
      <li class="nav-item"><a href="#tab_2" class="nav-link" data-toggle="tab">Ubah Passwod</a></li>
    </ul>
    <div class="tab-content tabs-bordered">


      <div class="tab-pane fade" id="tab_2">    
        <form action="<?php echo base_url()?>admin/permintaan/ubah_pass" method="post">
        <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <p class="login-box-msg">Anda dapat melakukan perubahan password:</p>
            <div class="input-group">
              <span class="input-group-addon">
                <div style="width:150px;text-align:left">
                  <i class="fa fa-qrcode" style="width:20px"></i> Username
                </div>
              </span>
              <input type="text" class="form-control" placeholder="username" name="username" readonly value="<?php echo $this->session->userdata('username') ?>"/>
            </div>
            <div class="input-group">
              <span class="input-group-addon">
                <div style="width:150px;text-align:left">
                  <i class="fa fa-key" style="width:20px"></i> Password Lama
                </div>
              </span>
              <input type="password" class="form-control" placeholder="Password Lama" name="password" id="password" required/>
              <span class="input-group-addon" id="show_hide" name="show_hide"><i class="fa fa-eye"></i></span>
            </div>
            <div class="input-group">
              <span class="input-group-addon">
                <div style="width:150px;text-align:left">
                  <i class="fa fa-unlock" style="width:20px"></i> Password Baru
                </div>
              </span>
              <input type="password" class="form-control" placeholder="** Password Baru" name="npassword" id="npassword"  required/>
            </div>
            <div class="input-group">
              <span class="input-group-addon">
                <div style="width:150px;text-align:left">
                  <i class="fa fa-unlock" style="width:20px"></i> Retype Password Baru
                </div>
              </span>
              <input type="password" class="form-control" placeholder="** Retype password Baru" name="cpassword" id="cpassword"  required/>
            </div>
            <font color="red"><span>** Password Minimal 5 karakter</span></font>
            <br>
            <br>
            <div class="row">
              <div class="col-xs-12 col-md-6">
                <button type="submit" name="submit"  class="btn btn-warning1 btn-block btn-flat"><i class="fa fa-save"></i> Ubah Password</button>
                <br>
                <br>
              </div><!-- /.col -->
            </div>
        </div>
        </div>
        </form>
      </div>

      <div class="tab-pane fade in active" id="tab_1">    
        <!-- <form action="<?php echo base_url()?>morganisasi/profile_doupdate" method="post"> -->
        <form action="<?php echo base_url()?>admin/permintaan/profile_up_un" method="post">
        <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <p class="login-box-msg">Silahkan periksa kembali kelengkapan data profil anda :</p>
            <div class="input-group">
              <span class="input-group-addon">
                <div style="width:150px;text-align:left">
                  <i class="fa fa-qrcode" style="width:20px"></i> Username
                </div>
              </span>
              <input type="text" class="form-control" placeholder="username" name="username" readonly value="<?php echo $this->session->userdata('username') ?>"/>
            </div>
            <div class="input-group">
              <span class="input-group-addon" >
                <div style="width:150px;text-align:left">
                  <i class="fa fa-user" style="width:20px"></i> Nama Lengkap
                </div>
              </span>
              <input type="text" class="form-control" placeholder="** Nama Lengkap" name="nama" value="<?php echo $profil['nama'] ?>"/>
              <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
            </div>
             <div class="input-group">
              <span class="input-group-addon">
                <div style="width:150px;text-align:left">
                  <i class="fa fa-envelope" style="width:20px"></i> Email
                </div>
              </span>
              <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $profil['email'] ?>" required/>
              <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
            </div>
            <div class="input-group">
              <span class="input-group-addon">
                <div style="width:150px;text-align:left">
                  <i class="fa fa-phone" style="width:20px"></i> Phone
                </div>
              </span>
              <input type="text" class="form-control" placeholder="** No. Tlp" name="phone_number" value="<?php echo $profil['phone_number'] ?>"/>
              <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
            </div>
            <div class="input-group">
              <span class="input-group-addon">
                <div style="width:150px;text-align:left">
                  <i class="fa fa-phone" style="width:20px"></i> Job Title
                </div>
              </span>
              <input type="text" class="form-control" placeholder="** Job Title" name="job_title" readonly value="<?php echo $profil['job_title'] ?>"/>
              <span class="glyphicon  form-control-feedback"></span>
            </div>
            <div class="input-group">
              <span class="input-group-addon">
                <div style="width:150px;text-align:left">
                  <i class="fa fa-phone" style="width:20px"></i> Bidang
                </div>
              </span>
              <input type="text" class="form-control" placeholder="** Sub Departement" name="sub_dep" readonly value="<?php echo $profil['nama_bidang'] ?>"/>
              <span class="glyphicon  form-control-feedback"></span>
            </div>
            <div class="input-group">
              <span class="input-group-addon">
                <div style="width:150px;text-align:left">
                  <i class="fa fa-home" style="width:20px"></i>Update Bidang
                </div>
              </span>
              <div class="form-group">
              <select name="bidang" id="bidang" class = "form-control input-lg"> 
                    <option value=""> Select Bidang</option>
                    <?php 
                    foreach ($bidang as $row)
                    {
                      echo '<option value="'.$row->id_bidang.'">'.$row->nama_bidang.'</option>';

                    }
                    ?>
                    </select>
            
              
                </div>
                
            </div>
            <div class="input-group">
              <span class="input-group-addon">
                <div style="width:150px;text-align:left">
                  <i class="fa fa-home" style="width:20px"></i> nama sesksi
                </div>
              </span>
              <input type="text" class="form-control" placeholder="** Sub Departement" name="sub_dep" readonly value="<?php echo $profil['nama_subbidang'] ?>"/>
              <span class="glyphicon  form-control-feedback"></span>
            </div>
            <div class="input-group">
              <span class="input-group-addon">
                <div style="width:150px;text-align:left">
                  <i class="fa fa-home" style="width:20px"></i>update seksi
                </div>
              </span>
              <div class="form-group">
                <select name="seksi" id="seksi" class="form-control input-lg">
                <option value = "">Pilih bidang terlebih dahulu</option>
                </select>
                </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-md-6">
                <button type="submit" name="submit" class="btn btn-success btn-block btn-flat "><i class="fa fa-save"></i> Simpan</button>
                <br>
                <br>
              </div><!-- /.col -->
            </div>
        </div>
        </div>
        </form>        
      </div>
    </div>
  </div><!-- /.form-box -->
</div>

<script type="text/javascript">
$(function(){
    $("#menu_dashboard").addClass("active open");
    $("#menu_dashboard ul").addClass("colapse in");   
    $("#menu_enterprise_profile").addClass("active");

  });
</script>
      <!-- /.row -->

      <!-- Main row -->
     
</body>
</html>
