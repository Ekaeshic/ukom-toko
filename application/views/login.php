<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Gedung Rapar Kerja | <?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page" style="">
    <!-- MODAL REGISTER -->
    <div class="modal fade" id="register">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="<?php echo base_url('auth/Register') ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Daftar Akun baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger" style="display: none" role="alert" id="alertdaftar"></div>
                        <span id="alertusername"></span>
                        <div class="input-group mb-3">
                            <input REQUIRED type="text" id="name" name="name" class="form-control" placeholder="Nama Lengkap">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-id-card"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input REQUIRED type="text" id="username" name="username" class="form-control usernamedaftar" placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input REQUIRED type="password" name="password" id="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input REQUIRED type="password" name="password2" id="password2" class="form-control" placeholder="Konfirmasi Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input REQUIRED type="email" name="email" id="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input REQUIRED type="date" name="dob" id="dob" class="form-control" placeholder="Tanggal Lahir">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-calendar"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <select REQUIRED class="custom-select" name="gender" id="gender" placeholder="Jenis Kelamin">
                                <option value="m">Laki-laki</option>
                                <option value="f">Perempuan</option>
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-heart"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <textarea REQUIRED name="address" id="address" class="form-control" placeholder="Alamat" rows="4" cols="50"></textarea>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-home"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input REQUIRED type="text" name="city" id="city" class="form-control" placeholder="Kota">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-home"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input REQUIRED type="text" id="phone" name="phone" class="form-control" onkeypress="return isNumberKey(event)" placeholder="Nomor Telepon">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-sim-card"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input REQUIRED type="text" name="paypal" id="paypal" class="form-control" placeholder="Paypal ID">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-wallet"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                        <button type="submit" id="daftar" name="daftar" class="btn btn-primary btn-block btn-flat">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">

        <span class="text-red" id="message"></span>
        <form action="<?php echo base_url('auth') ?>" method="post" autocomplete="off">
          <?php echo $this->session->flashdata('message'); ?>
          <div class="input-group mb-3">
            <input type="text" id="username" name="username" class="form-control" value="<?php echo set_value('username'); ?>" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <?php echo form_error('username'); ?>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12 text-center">
              <button type="submit" name="masuk" class="btn btn-primary btn-block btn-flat">Masuk</button>
              <a href="#" data-toggle="modal" data-target="#register" class="btn btn-success btn-block btn-flat">Mendaftar</a>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
  
  <!-- jQuery -->
  <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="<?= base_url('assets/') ?>plugins/toastr/toastr.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>

  <!-- user -->
  <script src="<?= base_url('assets/') ?>dist/js/user.js"></script></script>

</body>

</html>