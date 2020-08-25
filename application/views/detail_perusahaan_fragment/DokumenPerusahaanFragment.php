<div class="wrapper wrapper-content animated fadeInRight">
  <form class="form-inline m-b-sm" id="toolbar_form" onsubmit="return false;">
    <button type="button" class="btn btn-success my-1 mr-sm-2" id="new_btn" disabled="disabled" data-loading-text="Loading..." style="display:none"><i class="fal fa-plus"></i> Tambah Dokumen Perusahaan</button>
  </form>

  <div class="row">
    <div class="col-lg-12">
      <div class="ibox">
        <div class="ibox-content">
          <div class="table-responsive">
            <table id="dokumen_perusahaan_datatable" class="table table-bordered table-hover" style="padding:0px">
              <thead>
                <tr>
                  <th style="width: 15%; text-align:center!important">Jenis Dokumen</th>
                  <th style="width: 15%; text-align:center!important">Nomor Dokumen</th>
                  <th style="width: 15%; text-align:center!important">Dokumen</th>
                  <th style="width: 5%; text-align:center!important">Aksi</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal inmodal" id="dokumen_perusahaan_modal" tabindex="-1" opd="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah Dokumen Perusahaan</h4>
      </div>
      <div class="modal-body" id="modal-body">
        <form opd="form" id="dokumen_perusahaan_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_perusahaan" name="id_perusahaan">
          <div class="form-group">
            <label for="id_jenis_dokumen_perusahaan">Jenis Dokumen Perusahaan</label>
            <select class="form-control mr-sm-2" name="id_jenis_dokumen_perusahaan" id="id_jenis_dokumen_perusahaan" required="required"></select>
          </div>
          <div class="form-group">
            <label for="no_dokumen_perusahaan">Nomor Dokumen Perusahaan</label>
            <input type="text" placeholder="Nomor Dokumen Perusahaan" class="form-control" id="no_dokumen_perusahaan" name="no_dokumen_perusahaan" required="required">
          </div>
          <div class="form-group">
            <label for="dokumen_perusahaan">Dokumen Perusahaan</label>
            <p class="no-margins"><span id="dokumen_perusahaan">-</span></p>
          </div>
          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="add_btn" data-loading-text="Loading..."><strong>Tambah Dokumen</strong></button>
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

    var toolbar = {
      'form': $('#toolbar_form'),
      'newBtn': $('#new_btn'),
    }
    toolbar.newBtn.toggle(!dataInfo['edit_perusahaan']);

    var dokumen_perusahaan_datatable = $('#dokumen_perusahaan_datatable').DataTable({
      'columnDefs': [{
        targets: [1, 2, 3],
        className: 'text-center'
      }, ],
      deferRender: true,
      "order": [
        [0, "desc"]
      ],
      paging: false,
      ordering: false,
      searching: false
    });

    var dokumen_perusahaan_modal = {
      'self': $('#dokumen_perusahaan_modal'),
      'form': $('#dokumen_perusahaan_modal').find('#dokumen_perusahaan_form'),
      'add_btn': $('#dokumen_perusahaan_modal').find('#add_btn'),
      'id_perusahaan': $('#dokumen_perusahaan_modal').find('#id_perusahaan'),
      'id_jenis_dokumen_perusahaan': $('#dokumen_perusahaan_modal').find('#id_jenis_dokumen_perusahaan'),
      'no_dokumen_perusahaan': $('#dokumen_perusahaan_modal').find('#no_dokumen_perusahaan'),
      'dokumen_perusahaan': new FileUploader($('#dokumen_perusahaan_modal').find('#dokumen_perusahaan'), "", "dokumen_perusahaan", ".png , .pdf , .jpg , .jpeg", false, true),
    }
    dokumen_perusahaan_modal.id_perusahaan.val(id_perusahaan);

    var dataDokumenPerusahaan = {}

    $.when(getAllDokumenPerusahaan(), getAllJenisDokumenPerusahaan()).then((e) => {
      toolbar.newBtn.prop('disabled', false);
    }).fail((e) => {
      console.log(e)
    });

    function getAllDokumenPerusahaan() {
      swal({
        title: 'Loading pengiriman...',
        allowOutsideClick: false
      });
      swal.showLoading();
      return $.ajax({
        url: `<?php echo site_url('DokumenPerusahaanController/getAll/') ?>`,
        'type': 'GET',
        data: {
          id_perusahaan: id_perusahaan
        },
        success: function(data) {
          swal.close();
          var json = JSON.parse(data);
          if (json['error']) {
            return;
          }
          dataDokumenPerusahaan = json['data'];
          renderDokumenPerusahaan(dataDokumenPerusahaan);
        },
        error: function(e) {}
      });
    }

    function renderDokumenPerusahaan(data) {
      if (data == null || typeof data != "object") {
        console.log("Dokumen Perusahaan::UNKNOWN DATA");
        return;
      }
      var i = 0;

      var renderData = [];
      Object.values(data).forEach((dokumen) => {
        var deleteButton = `
        <a class="delete dropdown-item" data-id='${dokumen['id_dokumen_perusahaan']}'><i class='fa fa-trash'></i> Hapus Dokumen Perusahaan</a>
      `;
        var button = `
        <div class="btn-group" opd="group">
          <button id="action" type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='fa fa-bars'></i></button>
          <div class="dropdown-menu" aria-labelledby="action">
            ${deleteButton}
          </div>
        </div>
      `;
        renderData.push([dokumen['nama_jenis_dokumen_perusahaan'], dokumen['no_dokumen_perusahaan'], downloadButton("<?= base_url('uploads/dokumen_perusahaan/') ?>", dokumen['dokumen_perusahaan'], true), button]);
      });
      dokumen_perusahaan_datatable.clear().rows.add(renderData).draw('full-hold');
    }

    function getAllJenisDokumenPerusahaan() {
      return $.ajax({
        url: `<?php echo site_url('ParameterController/getAllJenisDokumenPerusahaan/') ?>`,
        'type': 'GET',
        data: {},
        success: function(data) {
          var json = JSON.parse(data);
          if (json['error']) {
            return;
          }
          dataRole = json['data'];
          renderJenisDokumenPerusahaan(dataRole);
        },
        error: function(e) {}
      });
    }

    function renderJenisDokumenPerusahaan(data) {
      dokumen_perusahaan_modal.id_jenis_dokumen_perusahaan.empty();
      dokumen_perusahaan_modal.id_jenis_dokumen_perusahaan.append($('<option>', {
        value: "",
        text: "-- Pilih Jenis Dokumen Perusahaan --"
      }));
      Object.values(data).forEach((d) => {
        dokumen_perusahaan_modal.id_jenis_dokumen_perusahaan.append($('<option>', {
          value: d['id_jenis_dokumen_perusahaan'],
          text: d['id_jenis_dokumen_perusahaan'] + ' :: ' + d['nama_jenis_dokumen_perusahaan'],
        }));
      });
    }

    toolbar.newBtn.on('click', (e) => {
      dokumen_perusahaan_modal.form.trigger('reset');
      dokumen_perusahaan_modal.self.modal('show');
    });

    dokumen_perusahaan_modal.form.submit(function(event) {
      event.preventDefault();
      swal(saveConfirmation("Konfirmasi tambah", "Yakin akan menambahakan dokumen ini?", "Ya, Tambah!")).then((result) => {
        if (!result.value) {
          return;
        }
        buttonLoading(dokumen_perusahaan_modal.add_btn);
        $.ajax({
          url: "<?= site_url('DokumenPerusahaanController/add') ?>",
          'type': 'POST',
          data: new FormData(dokumen_perusahaan_modal.form[0]),
          contentType: false,
          processData: false,
          success: function(data) {
            buttonIdle(dokumen_perusahaan_modal.add_btn);
            var json = JSON.parse(data);
            if (json['error']) {
              swal("Simpan Gagal", json['message'], "error");
              return;
            }
            var dokumenPerusahaan = json['data']
            dataDokumenPerusahaan[dokumenPerusahaan['id_dokumen_perusahaan']] = dokumenPerusahaan;
            swal("Simpan Berhasil", "", "success");
            renderDokumenPerusahaan(dataDokumenPerusahaan);
            dokumen_perusahaan_modal.self.modal('hide');
          },
          error: function(e) {}
        });
      });
    });

    dokumen_perusahaan_datatable.on('click', '.delete', function() {
      event.preventDefault();
      var id = $(this).data('id');
      swal(deleteConfirmation("Konfirmasi hapus", "Yakin akan menghapus dokumen ini?", "Ya, Hapus!")).then((result) => {
        if (!result.value) {
          return;
        }
        $.ajax({
          url: "<?= site_url('DokumenPerusahaanController/delete') ?>",
          'type': 'POST',
          data: {
            'id_dokumen_perusahaan': id
          },
          success: function(data) {
            var json = JSON.parse(data);
            if (json['error']) {
              swal("Delete Gagal", json['message'], "error");
              return;
            }
            delete dataDokumenPerusahaan[id];
            swal("Delete Berhasil", "", "success");
            renderDokumenPerusahaan(dataDokumenPerusahaan);
          },
          error: function(e) {}
        });
      });
    });
  });
</script>