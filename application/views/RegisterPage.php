<?php $this->load->view('Fragment/HeaderFragment',['title' => $title]); ?>

<div class="registerColumns animated fadeInDown">
  <div class="row">
    <div class="col-md-12">
      <span class="text-center">
        <h3 class="font-bold" style="margin-bottom:16px">Sistem Integrasi Layanan Pengiriman Lada Putih Bangka Belitung</h3>
      </span>
    </div>
    <div class="col-md-12">
      <div class="ibox-content">
        <form id="registerForm"  class="m-t" role="form">
          <h3>Daftar Akun</h3>
          <div class="form-group">
            <label for="username">Username</label> 
            <input type="text" placeholder="Username" class="form-control" id="username" name="username" required="required" autocomplete="username">
          </div>
          <div class="form-group">
            <label for="nama">Nama</label> 
            <input type="text" placeholder="Nama" class="form-control" id="nama" name="nama" required="required">
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="password">Password</label> 
                <input type="password" placeholder="Password" class="form-control" id="password" name="password" autocomplete="new-password">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="repassword">Konfirmasi Password</label> 
                <input type="password" placeholder="Konfirmasi Password" class="form-control" id="repassword" name="repassword" autocomplete="new-password">
              </div>
            </div>
          </div>
          <button type="submit" id="registerBtn" class="btn btn-primary block full-width m-b" data-loading-text="Registering In...">Daftar</button>
          <a class="btn btn-default block full-width m-b" href="<?=site_url('login')?>">Login</a>
        </form>
        <p class="m-t">
          <small>Sistem Integrasi Layanan Pengiriman Lada Putih Bangka Belitung</small>
        </p>
      </div>
    </div>
  </div>
  <hr>
  <div class="row">
      <div class="col-md-6">
          BUMD Kepulauan Bangka Belitung
      </div>
      <div class="col-md-6 text-right">
          <small>© 2019</small>
          </div>
      </div>
  </div>
</div>
<style>
  .logo {
    flex: 0 0 50%;
    max-width: 50%;
  }
</style>
<script>
  $(document).ready(function() {

    var registerForm = $('#registerForm');
    var submitBtn = registerForm.find('#registerBtn');

    registerForm.on('submit', (ev) => {
      ev.preventDefault();
      buttonLoading(submitBtn);
      $.ajax({
        url: "<?=site_url() . 'register-process'?>",
        type: "POST",
        data: registerForm.serialize(),
        success: (data) => {
          buttonIdle(submitBtn);
          json = JSON.parse(data);
          if(json['error']){
            swal("Login Gagal", json['message'], "error");
            return;
          }
          $(location).attr('href', '<?=site_url()?>' + json['user']['nama_controller']);
        },
        error: () => {
          buttonIdle(submitBtn);
        }
      });
    });

  });
</script>
<style> body { background-color: #f3f3f4!important; } </style>
<?php $this->load->view('Fragment/FooterFragment'); ?>
