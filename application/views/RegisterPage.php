<?php $this->load->view('Fragment/HeaderFragment', ['title' => $title]);
if (!empty($_COOKIE['lang_set']) && $_COOKIE['lang_set'] == 'en') {
}
?>


<div class="col-md-12">

  <div style="float: right; padding : 3px" class="alert alert-light">
    <a id='lang_in'> Indonesia</a> | <a id='lang_en'>English </a>
  </div>


  <div>
    <!-- <div class="row"> -->
    <div class="registerColumns animated fadeInDown">
      <div class="row">
        <div class="col-md-12">
          <span class="text-center">
            <h3 class="font-bold" style="margin-bottom:16px">
              <?php if (!empty($_COOKIE['lang_set']) && $_COOKIE['lang_set'] == 'en') {
                echo 'Registration System Information Kantor Pemasaran Bersama';
              } else {
                echo 'Pendaftaran Sistem Informasi Kantor Pemasaran Bersama';
              } ?>
            </h3>
          </span>
        </div>
        <div class="col-md-12">
          <div class="ibox-content">
            <form id="registerForm" class="m-t" role="form">
              <h3>
                <?php if (!empty($_COOKIE['lang_set']) && $_COOKIE['lang_set'] == 'en') {
                  echo 'Registration Account';
                } else {
                  echo 'Daftar Akun';
                } ?>

              </h3>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" placeholder="Username" class="form-control" id="username" name="username" required="required" autocomplete="username">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" placeholder="" class="form-control" id="password" name="password" autocomplete="new-password">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="repassword">
                      <?php if (!empty($_COOKIE['lang_set']) && $_COOKIE['lang_set'] == 'en') {
                        echo 'Comfirmation Password';
                      } else {
                        echo 'Konfirmasi Password';
                      } ?>
                    </label>
                    <input type="password" placeholder="Password" class="form-control" id="repassword" name="repassword" autocomplete="new-password">
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
                <label for="jenis_akun">
                  <?php if (!empty($_COOKIE['lang_set']) && $_COOKIE['lang_set'] == 'en') {
                    echo 'Participant';
                  } else {
                    echo 'Partisipasi';
                  } ?>
                </label>
                <select class="form-control mr-sm-3" id="jenis_akun" name="jenis_akun" required="required">
                  <option value=""></option>
                  <option value="B">
                    <?php if (!empty($_COOKIE['lang_set']) && $_COOKIE['lang_set'] == 'en') {
                      echo 'as Buyer';
                    } else {
                      echo 'Sebagai Pembeli';
                    } ?></option>
                  <option value="S">
                    <?php if (!empty($_COOKIE['lang_set']) && $_COOKIE['lang_set'] == 'en') {
                      echo 'as Seller';
                    } else {
                      echo 'Sebagai Penjual';
                    } ?></option>
                </select>
              </div>
              <div class="form-group">
                <label for="nama">
                  <?php if (!empty($_COOKIE['lang_set']) && $_COOKIE['lang_set'] == 'en') {
                    echo 'Personal Name';
                  } else {
                    echo 'Nama Personal';
                  } ?></label>
                <input type="text" placeholder="" class="form-control" id="nama" name="nama" required="required">
              </div>
              <div class="form-group">
                <label for="nama_perusahaan">
                  <?php if (!empty($_COOKIE['lang_set']) && $_COOKIE['lang_set'] == 'en') {
                    echo 'Companny Name';
                  } else {
                    echo 'Nama Perusahaan';
                  } ?></label>
                <input type="text" placeholder="" class="form-control" id="nama_perusahaan" name="nama_perusahaan" required="required">
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
                <label for="alamat">
                  <?php if (!empty($_COOKIE['lang_set']) && $_COOKIE['lang_set'] == 'en') {
                    echo 'Address';
                  } else {
                    echo 'Alamat';
                  } ?></label>
                <textarea rows="4" type="text" placeholder="" class="form-control" id="alamat" name="alamat" required="required"></textarea>
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
              <button type="submit" id="registerBtn" class="btn btn-primary block full-width m-b" data-loading-text="Registering In...">
                <?php if (!empty($_COOKIE['lang_set']) && $_COOKIE['lang_set'] == 'en') {
                  echo 'Register';
                } else {
                  echo 'Daftar';
                } ?></button>
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
      <!-- </div> -->
    </div>

  </div>

  <style>
    .logo {
      flex: 0 0 50%;
      max-width: 50%;
    }
  </style>
  <script>

  </script>
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

      var lang_in = $('#lang_in');
      var lang_en = $('#lang_en');
      lang_in.on('click', (ev) => {
        document.cookie = "lang_set=in";
        location.reload();
      });
      lang_en.on('click', (ev) => {
        document.cookie = "lang_set=en";
        location.reload();
      });

      function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') {
            c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
          }
        }
        return "";
      }

    });
  </script>
  <style>
    body {
      background-color: #f3f3f4 !important;
    }
  </style>
  <?php $this->load->view('Fragment/FooterFragment'); ?>