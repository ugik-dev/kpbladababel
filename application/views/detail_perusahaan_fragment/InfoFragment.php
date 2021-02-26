<div class="wrapper wrapper-content animated fadeInRight" id="info_container">
  <div class="row">
    <div class="col-lg-6">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Nama Perusahaan</h5>
          <p class="no-margins"><span id="nama_perusahaan">-</span>
            <span id="verificated">-</span></p>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Nama Pimpinan</h5>
          <p class="no-margins"><span id="nama_pimpinan">-</span></p>
        </div>
      </div>
    </div>

    <div class="col-lg-2">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Jenis Usaha</h5>
          <p class="no-margins"><span id="nama_jenis_perusahaan">-</span></p>
        </div>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-6">
          <div class="ibox">
            <div class="ibox-content">
              <h5>Bank</h5>
              <p class="no-margins"><span id="id_bank">-</span></p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="ibox">
            <div class="ibox-content">
              <h5>Nama Pemilik Rekening</h5>
              <p class="no-margins"><span id="an_bank">-</span></p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="ibox">
            <div class="ibox-content">
              <h5>No Rekening</h5>
              <p class="no-margins"><span id="no_rek_bank">-</span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="ibox">
        <div class="ibox-content">
          <h5>ID KBI</h5>
          <p class="no-margins"><span id="kbi_id">-</span></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Nomor Telepon</h5>
          <p class="no-margins"><span id="no_telepon">-</span></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Email</h5>
          <p class="no-margins"><span id="email">-</span></p>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Lokasi Perusahaan</h5>
          <p class="no-margins"><span id="lok_perusahaan_full">-</span></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Kecamatan</h5>
          <p class="no-margins"><span id="lok_perusahaan_kec">-</span></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Kab/Kota</h5>
          <p class="no-margins"><span id="lok_perusahaan_kabkot">-</span></p>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Lokasi Unit Pengelolaan</h5>
          <p class="no-margins"><span id="lok_unit_pengelolaan_full">-</span></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Kecamatan</h5>
          <p class="no-margins"><span id="lok_unit_pengelolaan_kec">-</span></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Kab/Kota</h5>
          <p class="no-margins"><span id="lok_unit_pengelolaan_kabkot">-</span></p>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Lokasi Gudang Penyimpanan</h5>
          <p class="no-margins"><span id="lok_gudang_penyimpanan_full">-</span></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Kecamatan</h5>
          <p class="no-margins"><span id="lok_gudang_penyimpanan_kec">-</span></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Kab/Kota</h5>
          <p class="no-margins"><span id="lok_gudang_penyimpanan_kabkot">-</span></p>
        </div>
      </div>
    </div>


    <?php if ($this->session->userdata()['nama_role'] == 'admin' || $this->session->userdata()['nama_role'] == 'kpb') { ?>
      <div class="col-lg-4">
        <div class="ibox">
          <div class="ibox-content">
            <button class="btn btn-primary col-lg-12" id="btn_verifikasi" data-loading-text="Loading Verifikasi..."><i class='fa fa-check'></i> Verifikasi</button>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="ibox">
          <div class="ibox-content">
            <button class="btn btn-warning col-lg-12" id="btn_dis_verifikasi" data-loading-text="Loading Disverifikasi"><i class='fa fa-edit'></i> Tolak / Batalkan Verifikasi</button>
          </div>
        </div>
      </div>
    <?php } ?>
    <div class="col-lg-3">
      <div class="ibox">
        <div class="ibox-content">
          <p class="no-margins"><span id="layer_dokumen_pdf">-</span></p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4">
      <button class="btn btn-primary my-1 mr-sm-2" id="request_verifikasi" style="display:none"><i class='fa fa-check'></i> Request Verifikasi</button>

      <button class="btn btn-success my-1 mr-sm-2" id="edit_info_btn" style="display:none"><i class='fa fa-edit'></i> Edit Informasi</button>
    </div>
  </div>
</div>

<div class="modal inmodal" id="informasi_modal" tabindex="-1" role="dialog" aria-hidden="true" autocomplete="off">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Informasi Perusahaan</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">
        <form role="form" id="informasi_form" onsubmit="return false;" type="multipart">
          <input type="hidden" id="id_perusahaan" name="id_perusahaan">
          <div class="row">
            <div class="col-sm-9">
              <div class="form-group">
                <label for="nama_perusahaanx">Nama Perusahaan</label>
                <input type="text" class="form-control" id="nama_perusahaanx" name="nama_perusahaan" placeholder="Tidak ada">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="id_jenis_perusahaanx">Jenis Usaha</label>
                <select class="form-control mr-sm-2" id="id_jenis_perusahaanx" name="id_jenis_perusahaan" required="required"></select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="id_bankx">Nama Bank</label>
                <input type="text" class="form-control" id="id_bankx" name="id_bank" placeholder="Tidak ada" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="an_bank">Nama Pemilik Bank</label>
                <input type="text" class="form-control" id="an_bankx" name="an_bank" placeholder="Tidak ada" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="no_rek_bankx">No Rekening Bank</label>
                <input type="text" class="form-control" id="no_rek_bankx" name="no_rek_bank" placeholder="Tidak ada" required="required">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="nama_pimpinanx">Nama Pimpinan</label>
                <input type="text" class="form-control" id="nama_pimpinanx" name="nama_pimpinan" placeholder="Tidak ada">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="lok_perusahaan_fullx">Lokasi Perusahaan</label>
                <input type="text" class="form-control" id="lok_perusahaan_fullx" name="lok_perusahaan_full" placeholder="Tidak ada">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="lok_perusahaan_kecx">Kecamatan</label>
                <input type="text" class="form-control" id="lok_perusahaan_kecx" name="lok_perusahaan_kec" placeholder="Tidak ada">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="lok_perusahaan_kabkotx">Kab/Kota</label>
                <input type="text" class="form-control" id="lok_perusahaan_kabkotx" name="lok_perusahaan_kabkot" placeholder="Tidak ada">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="lok_unit_pengelolaan_fullx">Lokasi Unit Pengelolaan</label>
                <input type="text" class="form-control" id="lok_unit_pengelolaan_fullx" name="lok_unit_pengelolaan_full" placeholder="Tidak ada">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="lok_unit_pengelolaan_kecx">Kecamatan</label>
                <input type="text" class="form-control" id="lok_unit_pengelolaan_kecx" name="lok_unit_pengelolaan_kec" placeholder="Tidak ada">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="lok_unit_pengelolaan_kabkotx">Kab/Kota</label>
                <input type="text" class="form-control" id="lok_unit_pengelolaan_kabkotx" name="lok_unit_pengelolaan_kabkot" placeholder="Tidak ada">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="lok_gudang_penyimpanan_fullx">Lokasi Gudang Penyimpanan</label>
                <input type="text" class="form-control" id="lok_gudang_penyimpanan_fullx" name="lok_gudang_penyimpanan_full" placeholder="Tidak ada">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="lok_gudang_penyimpanan_kecx">Kecamatan</label>
                <input type="text" class="form-control" id="lok_gudang_penyimpanan_kecx" name="lok_gudang_penyimpanan_kec" placeholder="Tidak ada">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="lok_gudang_penyimpanan_kabkotx">Kab/Kota</label>
                <input type="text" class="form-control" id="lok_gudang_penyimpanan_kabkotx" name="lok_gudang_penyimpanan_kabkot" placeholder="Tidak ada">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="no_teleponx">No Telepon</label>
                <input type="tel" class="form-control" id="no_teleponx" name="no_telepon" placeholder="Tidak ada">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="emailx">Email</label>
                <input type="email" class="form-control" id="emailx" name="email" placeholder="Tidak ada" required='required'>
              </div>
            </div>
          </div>
          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="save" data-loading-text="Loading..."><strong>Simpan</strong></button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {

    var id_perusahaan = `<?= $contentData['id_perusahaan'] ?>`;
    var info = {
      'self': $('#info_container'),
      'nama_perusahaan': $('#info_container').find('#nama_perusahaan'),
      'nama_jenis_perusahaan': $('#info_container').find('#nama_jenis_perusahaan'),
      'nama_pimpinan': $('#info_container').find('#nama_pimpinan'),
      'id_bank': $('#info_container').find('#id_bank'),
      'an_bank': $('#info_container').find('#an_bank'),
      'no_rek_bank': $('#info_container').find('#no_rek_bank'),
      'lok_perusahaan_full': $('#info_container').find('#lok_perusahaan_full'),
      'lok_perusahaan_kec': $('#info_container').find('#lok_perusahaan_kec'),
      'lok_perusahaan_kabkot': $('#info_container').find('#lok_perusahaan_kabkot'),
      'lok_unit_pengelolaan_full': $('#info_container').find('#lok_unit_pengelolaan_full'),
      'lok_unit_pengelolaan_kec': $('#info_container').find('#lok_unit_pengelolaan_kec'),
      'lok_unit_pengelolaan_kabkot': $('#info_container').find('#lok_unit_pengelolaan_kabkot'),
      'lok_gudang_penyimpanan_full': $('#info_container').find('#lok_gudang_penyimpanan_full'),
      'lok_gudang_penyimpanan_kec': $('#info_container').find('#lok_gudang_penyimpanan_kec'),
      'lok_gudang_penyimpanan_kabkot': $('#info_container').find('#lok_gudang_penyimpanan_kabkot'),
      'no_telepon': $('#info_container').find('#no_telepon'),
      'kbi_id': $('#info_container').find('#kbi_id'),
      'email': $('#info_container').find('#email'),
      'layer_dokumen_pdf': $('#info_container').find('#layer_dokumen_pdf'),
      'verificated': $('#info_container').find('#verificated'),
      'request_verifikasi': $('#request_verifikasi'),
      'edit_info_btn': $('#edit_info_btn')
    }
    info.edit_info_btn.prop('disabled', true);
    info.request_verifikasi.prop('disabled', true);
    <?php if ($this->session->userdata()['nama_role'] == 'admin' || $this->session->userdata()['nama_role'] == 'kpb') { ?>
      btn_verifikasi = $('#btn_verifikasi');
      btn_dis_verifikasi = $('#btn_dis_verifikasi');

      btn_verifikasi.on('click', function() {
        event.preventDefault();

        swal(saveConfirmation("Konfirmasi Verifikasi", "Yakin akan verifikasi data ini?", "Ya, Verifikasi!")).then((result) => {
          if (!result.value) {
            return;
          }
          buttonLoading(btn_verifikasi);
          $.ajax({
            url: "<?= site_url('AdminController/acc_seller') ?>",
            'type': 'POST',
            data: {
              'id': dataInfo['id_perusahaan'],
              'nama_perusahaan': dataInfo['nama_perusahaan'],
              'email': dataInfo['email'],
              'verificated': 'Y'
            },
            success: function(data) {
              var json = JSON.parse(data);
              buttonIdle(btn_verifikasi);
              if (json['error']) {
                swal("Verifikasi Gagal", json['message'], "error");
                return;
              }

              info.verificated.html(statusVerifikasi('Y'));
              swal("Verifikasi Berhasil", "", "success");
            },
            error: function(e) {}
          });
        });
      });

      btn_dis_verifikasi.on('click', function() {
        event.preventDefault();
        swal(deleteConfirmation("Konfirmasi Batalkan Verifikasi", "Yakin akan tolak / batalkan data ini?", "Ya")).then((result) => {
          if (!result.value) {
            return;
          }
          buttonLoading(btn_dis_verifikasi);
          $.ajax({
            url: "<?= site_url('AdminController/acc_seller') ?>",
            'type': 'POST',
            data: {
              'id': dataInfo['id_perusahaan'],
              'verificated': 'N',
              'nama_perusahaan': dataInfo['nama_perusahaan'],
              'email': dataInfo['email']
            },
            success: function(data) {
              var json = JSON.parse(data);
              buttonIdle(btn_dis_verifikasi);

              if (json['error']) {
                swal("Verifikasi Gagal", json['message'], "error");
                return;
              }
              info.verificated.html(statusVerifikasi('N'));
              swal("Pembatalan Verifikasi Berhasil", "", "success");
            },
            error: function(e) {}
          });
        });
      });

    <?php }
    ?>

    var informasiModal = {
      self: $('#informasi_modal'),
      form: $('#informasi_form'),
      id_perusahaan: $('#informasi_modal').find('#id_perusahaan'),
      'nama_perusahaan': $('#informasi_modal').find('#nama_perusahaanx'),
      'id_jenis_perusahaan': $('#informasi_modal').find('#id_jenis_perusahaanx'),
      'id_bank': $('#informasi_modal').find('#id_bankx'),
      'an_bank': $('#informasi_modal').find('#an_bankx'),
      'no_rek_bank': $('#informasi_modal').find('#no_rek_bankx'),
      'nama_pimpinan': $('#informasi_modal').find('#nama_pimpinanx'),
      'lok_perusahaan_full': $('#informasi_modal').find('#lok_perusahaan_fullx'),
      'lok_perusahaan_kec': $('#informasi_modal').find('#lok_perusahaan_kecx'),
      'lok_perusahaan_kabkot': $('#informasi_modal').find('#lok_perusahaan_kabkotx'),
      'lok_unit_pengelolaan_full': $('#informasi_modal').find('#lok_unit_pengelolaan_fullx'),
      'lok_unit_pengelolaan_kec': $('#informasi_modal').find('#lok_unit_pengelolaan_kecx'),
      'lok_unit_pengelolaan_kabkot': $('#informasi_modal').find('#lok_unit_pengelolaan_kabkotx'),
      'lok_gudang_penyimpanan_full': $('#informasi_modal').find('#lok_gudang_penyimpanan_fullx'),
      'lok_gudang_penyimpanan_kec': $('#informasi_modal').find('#lok_gudang_penyimpanan_kecx'),
      'lok_gudang_penyimpanan_kabkot': $('#informasi_modal').find('#lok_gudang_penyimpanan_kabkotx'),
      'no_telepon': $('#informasi_modal').find('#no_teleponx'),
      'email': $('#informasi_modal').find('#emailx'),
      save_btn: $('#informasi_modal').find('#save'),
    }

    var dataJenisPerusahaan = {};
    var dataBank = {};
    $.when(getAllJenisPerusahaan(), getAllBank()).then((e) => {
      renderInfo();
      info.edit_info_btn.prop('disabled', false);
      info.request_verifikasi.prop('disabled', false);
    }).fail((e) => {
      console.log(e)
    });


    function getAllJenisPerusahaan() {
      return $.ajax({
        url: `<?php echo site_url('ParameterController/getAllJenisPerusahaan/') ?>`,
        'type': 'GET',
        data: {},
        success: function(data) {
          var json = JSON.parse(data);
          if (json['error']) {
            return;
          }
          dataJenisPerusahaan = json['data'];
          renderJenisPerusahaan(dataJenisPerusahaan);
        },
        error: function(e) {}
      });
    }

    function renderJenisPerusahaan(data) {
      informasiModal.id_jenis_perusahaan.empty();
      informasiModal.id_jenis_perusahaan.append($('<option>', {
        value: "",
        text: "-- Pilih --"
      }));
      Object.values(data).forEach((d) => {
        informasiModal.id_jenis_perusahaan.append($('<option>', {
          value: d['id_jenis_perusahaan'],
          text: d['id_jenis_perusahaan'] + ' :: ' + d['nama_jenis_perusahaan'],
        }));
      });
    }

    function getAllBank() {
      return $.ajax({
        url: `<?php echo site_url('BankController/getAll/') ?>`,
        'type': 'GET',
        data: {},
        success: function(data) {
          var json = JSON.parse(data);
          if (json['error']) {
            return;
          }
          dataBank = json['data'];
          renderBank(dataBank);
        },
        error: function(e) {}
      });
    }

    function renderBank(data) {
      // informasiModal.id_bank.empty();
      // informasiModal.id_bank.append($('<option>', { value: "", text: "-- Pilih --"}));
      // Object.values(data).forEach((d) => {
      //   informasiModal.id_bank.append($('<option>', {
      //     value: d['id_bank'],
      //     text: d['nama_bank'],
      //   }));
      // });
      if (data == null || typeof data != "object") return;
      informasiModal.id_bank.typeahead({
        source: Object.values(data).map((e) => {
          return `${e['nama_bank']} -- ${e['id_bank']}`;
        }),
        afterSelect: function(data) {
          informasiModal.id_bank.val(data);
        }
      });
      informasiModal.id_bank.on('blur', function(e) {
        if (empty(informasiModal.id_bank.val())) {
          informasiModal.id_bank.val('');
        }
      });
    }




    function renderInfo() {

      info.an_bank.html(dataInfo['an_bank'] ? dataInfo['an_bank'] : '-');
      info.no_rek_bank.html(dataInfo['no_rek_bank'] ? dataInfo['no_rek_bank'] : '-');
      if (dataInfo['id_bank'] != "") info.id_bank.html(dataBank[dataInfo['id_bank']]['nama_bank']);
      info.kbi_id.html(dataInfo['kbi_id']);
      info.nama_perusahaan.html(dataInfo['nama_perusahaan']);
      info.nama_jenis_perusahaan.html(dataInfo['nama_jenis_perusahaan']);
      info.nama_pimpinan.html(dataInfo['nama_pimpinan'] ? dataInfo['nama_pimpinan'] : 'Tidak Ada');
      info.lok_perusahaan_full.html(dataInfo['lok_perusahaan_full'] ? dataInfo['lok_perusahaan_full'] : 'Tidak Ada');
      info.lok_perusahaan_kec.html(dataInfo['lok_perusahaan_kec'] ? dataInfo['lok_perusahaan_kec'] : 'Tidak Ada');
      info.lok_perusahaan_kabkot.html(dataInfo['lok_perusahaan_kabkot'] ? dataInfo['lok_perusahaan_kabkot'] : 'Tidak Ada');
      info.lok_unit_pengelolaan_full.html(dataInfo['lok_unit_pengelolaan_full'] ? dataInfo['lok_unit_pengelolaan_full'] : 'Tidak Ada');
      info.lok_unit_pengelolaan_kec.html(dataInfo['lok_unit_pengelolaan_kec'] ? dataInfo['lok_unit_pengelolaan_kec'] : 'Tidak Ada');
      info.lok_unit_pengelolaan_kabkot.html(dataInfo['lok_unit_pengelolaan_kabkot'] ? dataInfo['lok_unit_pengelolaan_kabkot'] : 'Tidak Ada');
      info.lok_gudang_penyimpanan_full.html(dataInfo['lok_gudang_penyimpanan_full'] ? dataInfo['lok_gudang_penyimpanan_full'] : 'Tidak Ada');
      info.lok_gudang_penyimpanan_kec.html(dataInfo['lok_gudang_penyimpanan_kec'] ? dataInfo['lok_gudang_penyimpanan_kec'] : 'Tidak Ada');
      info.lok_gudang_penyimpanan_kabkot.html(dataInfo['lok_gudang_penyimpanan_kabkot'] ? dataInfo['lok_gudang_penyimpanan_kabkot'] : 'Tidak Ada');
      info.no_telepon.html(dataInfo['no_telepon'] ? dataInfo['no_telepon'] : 'Tidak Ada');
      info.email.html(dataInfo['email'] ? dataInfo['email'] : 'Tidak Ada');
      info.edit_info_btn.toggle(!dataInfo['edit_perusahaan']);
      if (dataInfo['verificated'] == 'N') info.request_verifikasi.toggle(!dataInfo['edit_perusahaan']);

      btnx = downloadButtonV2("<?= site_url('FormatDokumenController/pdf_profile_perusahaan/') ?>", "?id_perusahaan=" + dataInfo['id_perusahaan'], "PDF Informasi Perusahaan")
      info.layer_dokumen_pdf.html(btnx);
      info.verificated.html(statusVerifikasi(dataInfo['verificated']));
    }

    info.request_verifikasi.on('click', function() {
      event.preventDefault();
      swal(saveConfirmation("Konfirmasi Request", "Jika verifikasi diterima dan anda mengubah data profile perusahaan, anda harus melakukan verifikasi kembali. Yakin akan request verifikasi sekarang ? ", "Ya Request Sekarang!")).then((result) => {
        if (!result.value) {
          return;
        }
        $.ajax({
          url: "<?= site_url('PerusahaanController/reqeust_verifikasi') ?>",
          'type': 'POST',
          data: {
            'id_perusahaan': id_perusahaan,
          },
          success: function(data) {
            var json = JSON.parse(data);
            if (json['error']) {
              swal("Verifikasi Gagal", json['message'], "error");
              return;
            }
            info.verificated.html(statusVerifikasi('R'));
            swal("Request Berhasil diajukan", "", "success");
            if (dataInfo['verificated'] == 'N') info.request_verifikasi.toggle('hide');

          },
          error: function(e) {}
        });
      });
    });


    function statusVerifikasi(status) {
      if (status == 'R')
        return ` <i class='fa fa-hourglass-start text-primary'> Request Verifikasi </i>`;
      else if (status == 'Y')
        return ` <i class='fa fa-check text-success'> Telah Diverifikasi</i>`;
      else
        return `  <i class='fa fa-edit text-warning'> Belum Diverifikasi</i>`;
    }

    info.edit_info_btn.on('click', function() {
      informasiModal.self.modal('show');
      informasiModal.id_perusahaan.val(dataInfo['id_perusahaan']);
      informasiModal.nama_perusahaan.val(dataInfo['nama_perusahaan']);
      informasiModal.id_jenis_perusahaan.val(dataInfo['id_jenis_perusahaan']);
      informasiModal.nama_pimpinan.val(dataInfo['nama_pimpinan']);
      informasiModal.lok_perusahaan_full.val(dataInfo['lok_perusahaan_full']);

      informasiModal.an_bank.val(dataInfo['an_bank']);
      informasiModal.no_rek_bank.val(dataInfo['no_rek_bank']);
      if (dataInfo['id_bank'] != "") informasiModal.id_bank.val(dataBank[dataInfo['id_bank']]['nama_bank'] + ' -- ' + dataInfo['id_bank']);
      informasiModal.lok_perusahaan_kec.val(dataInfo['lok_perusahaan_kec']);
      informasiModal.lok_perusahaan_kabkot.val(dataInfo['lok_perusahaan_kabkot']);
      informasiModal.lok_unit_pengelolaan_full.val(dataInfo['lok_unit_pengelolaan_full']);
      informasiModal.lok_unit_pengelolaan_kec.val(dataInfo['lok_unit_pengelolaan_kec']);
      informasiModal.lok_unit_pengelolaan_kabkot.val(dataInfo['lok_unit_pengelolaan_kabkot']);
      informasiModal.lok_gudang_penyimpanan_full.val(dataInfo['lok_gudang_penyimpanan_full']);
      informasiModal.lok_gudang_penyimpanan_kec.val(dataInfo['lok_gudang_penyimpanan_kec']);
      informasiModal.lok_gudang_penyimpanan_kabkot.val(dataInfo['lok_gudang_penyimpanan_kabkot']);
      informasiModal.no_telepon.val(dataInfo['no_telepon']);
      informasiModal.email.val(dataInfo['email']);
    });

    informasiModal.form.on('submit', (ev) => {

      swal(saveConfirmation("Konfirmasi Perubahan Data", "Jika anda mengubah data profile perusahaan, anda harus melakukan verifikasi kembali. Yakin akan mengubah data? ", "Ya!")).then((result) => {
        if (!result.value) {
          return;
        }
        ev.preventDefault();
        buttonLoading(informasiModal.save_btn);
        $.ajax({
          url: "<?= site_url('PerusahaanController/update') ?>",
          type: "POST",
          data: new FormData(informasiModal.form[0]),
          contentType: false,
          processData: false,
          success: (data) => {
            buttonIdle(informasiModal.save_btn);
            json = JSON.parse(data);
            if (json['error']) {
              swal("Update gagal", json['message'], "error");
              return;
            }
            dataInfo = json['data'];
            renderInfo();
            swal("Berhasil disimpan", 'Input Informasi Berhasil', "success");
            informasiModal.self.modal('hide');
          },
          error: () => {
            buttonIdle(informasiModal.save_btn);
          },
        });
      });
    });
  });
</script>