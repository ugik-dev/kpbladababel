<?php $this->load->view('Fragment/HeaderFragment', ['title' => $title]); ?>

<div class="registerColumns animated fadeInDown">
  <div class="row">
    <div class="col-md-12">
      <span class="text-center">
        <h3 class="font-bold" style="margin-bottom:16px">Sistem Integrasi Layanan Pengiriman Lada Putih Bangka Belitung</h3>
      </span>
    </div>
    <div class="col-md-12">
      <div class="ibox-content">
        <form id="registerForm" class="m-t" role="form">
          <h3>Daftar Akun</h3>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" placeholder="Username" class="form-control" id="username" name="username" required="required" autocomplete="username">
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
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" placeholder="Email" class="form-control" id="email" name="email" required="required">
          </div>

          <hr>
          <hr>
          <div class="form-group">
            <label for="jenis_akun">Participant</label>
            <select class="form-control mr-sm-3" id="jenis_akun" name="jenis_akun" required="required">
              <option value=""></option>
              <option value="B"> as Buyer</option>
              <option value="S"> as Seller</option>
            </select>
          </div>
          <div class="form-group">
            <label for="nama">Personal Name</label>
            <input type="text" placeholder="Personal Name" class="form-control" id="nama" name="nama" required="required">
          </div>
          <div class="form-group">
            <label for="nama_perusahaan">Companny Name</label>
            <input type="text" placeholder="Companny Name" class="form-control" id="nama_perusahaan" name="nama_perusahaan" required="required">
          </div>
          <div class="form-group" id="divregion">
            <label for="regional">Region</label>
            <select class="form-control mr-sm-3" id="region" name="region" required="required">
              <option value=""></option>
              <option value="D">Domestict / Dalam Negeri</option>
              <option value="F">Foreign / Luar Negeri</option>
            </select>
          </div>
          <div class="form-group">
            <label for="alamat">Address</label>
            <textarea rows="4" type="text" placeholder="Address" class="form-control" id="alamat" name="alamat" required="required"></textarea>
          </div>
          <!-- <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="no_telp">No Telepon / HP</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telepon / HP" required="required">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="no_fax">No Fax</label>
                <input type="text" class="form-control" id="no_fax" name="no_fax" placeholder="No Fax">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="id_bankx">Bank</label>
            <label for="id_bankx">Nama Bank</label>
            <input type="text" class="form-control" id="id_bankx" name="id_bank" placeholder="Tidak ada" required="required">
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="an_bank">Nama Pemilik Bank</label>
                <input type="text" class="form-control" id="an_bankx" name="an_bank" placeholder="Tidak ada" required="required">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="no_rek_bankx">No Rekening Bank</label>
                <input type="text" class="form-control" id="no_rek_bankx" name="no_rek_bank" placeholder="Tidak ada" required="required">
              </div>
            </div>
          </div>
          <hr>
          <hr>
          <label for="">KTP <small>.jpeg .jpg .png</small></label>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group" id="kpt">
                <p class="no-margins"><span id="ktp">-</span></p>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="No KTP" required="required">
              </div>
            </div>
          </div>
          <label for="">NPWP <small>.jpeg .jpg .png</small></label>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group" id="npwp">
                <p class="no-margins"><span id="npwp">-</span></p>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <input type="text" class="form-control" id="no_npwp" name="no_npwp" placeholder="No NPWP" required="required">
              </div>
            </div>
          </div> -->
          <!-- <div id='format_permohonan_pengiriman_all'></div> -->
          <button type="submit" id="registerBtn" class="btn btn-primary block full-width m-b" data-loading-text="Registering In...">Daftar</button>
          <a class="btn btn-default block full-width m-b" href="<?= site_url('login') ?>">Login</a>
        </form>
        <p class="m-t">
          <small>Sistem Informasi Kantor Pemasaran Berasama </small>
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
      <small>© 2020</small>
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
    var divregion = $('#divregion');
    var region = $('#region');
    var submitBtn = registerForm.find('#registerBtn');
    // ktp = $('#ktp');
    // ktp = new FileUploader($('#ktp'), "", "ktp", ".png , .jpg , .jpeg", false, true);
    // npwp = $('#npwp');
    // npwp = new FileUploader($('#npwp'), "", "npwp", ".png , .jpg , .jpeg", false, true);
    // divregion.attr('hidden', true);
    var btn1 = $('#jenis_akun');
    btn1.on('change', (ev) => {
      if (btn1.val() == 'S') {
        divregion.attr('hidden', true);
        region.attr('required', false);
      }
      if (btn1.val() == 'B') {
        divregion.attr('hidden', false);
        region.attr('required', true);
      }
    });

    registerForm.on('submit', (ev) => {
      ev.preventDefault();
      buttonLoading(submitBtn);
      $.ajax({
        url: "<?= site_url() . 'register-process' ?>",
        type: "POST",
        data: registerForm.serialize(),
        success: (data) => {
          buttonIdle(submitBtn);
          json = JSON.parse(data);
          if (json['error']) {
            swal("Login Gagal", json['message'], "error");
            return;
          } else {
            swal("Success Registration", 'check your email to activation', "success");
          }
          // $(location).attr('href', '<?= site_url() ?>' + json['user']['nama_controller']);
        },
        error: () => {
          buttonIdle(submitBtn);
        }
      });
    });

  });
</script>
<style>
  body {
    background-color: #f3f3f4 !important;
  }
</style>
<?php $this->load->view('Fragment/FooterFragment'); ?>