<div class="wrapper wrapper-content animated fadeInRight">
  <form class="form-inline m-b-sm" id="pengiriman_toolbar" onsubmit="return false;">
    <!-- <select class="form-control mr-sm-2" name="id_role" id="id_role"></select> -->
    <button type="button" class="btn btn-success my-1 mr-sm-2" id="new_btn" disabled="disabled" data-loading-text="Loading..." style="display:none"><i class="fal fa-plus"></i> Usul Pengiriman Baru</button>
  </form>

  <div class="row">
    <div class="col-lg-12">
      <div class="ibox">
        <div class="ibox-content">
          <div class="table-responsive">
            <table id="pengiriman_datatable" class="table table-bordered table-hover" style="padding:0px">
              <thead>
                <tr>
                  <th style="width: 7%; text-align:center!important">ID</th>
                  <th style="width: 24%; text-align:center!important">Nama Pengiriman</th>
                  <th style="width: 45%; text-align:center!important">Item</th>
                  <th style="width: 15%; text-align:center!important">Status Pengiriman</th>
                  <th style="width: 5%; text-align:center!important">Detail</th>
                  <th style="width: 5%; text-align:center!important">Duplikat</th>
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

<script>
  $(document).ready(function() {
    var id_perusahaan = `<?= $contentData['id_perusahaan'] ?>`;

    var toolbar = {
      'form': $('#pengiriman_toolbar'),
      'id_role': $('#pengiriman_toolbar').find('#id_role'),
      'id_opd': $('#pengiriman_toolbar').find('#id_opd'),
      'newBtn': $('#pengiriman_toolbar').find('#new_btn'),
    }
    toolbar.newBtn.toggle(!dataInfo['edit_perusahaan']);

    var pengiriman_datatable = $('#pengiriman_datatable').DataTable({
      'columnDefs': [{
        targets: [0, 3, 4],
        className: 'text-center'
      }, ],
      deferRender: true,
      "order": [
        [0, "desc"]
      ]
    });

    var dataPengiriman = {}

    $.when(getAllPengiriman()).then((e) => {
      toolbar.newBtn.prop('disabled', false);
    }).fail((e) => {
      console.log(e)
    });

    function getAllPengiriman() {
      swal({
        title: 'Loading pengiriman...',
        allowOutsideClick: false
      });
      swal.showLoading();
      return $.ajax({
        url: `<?php echo site_url('PengirimanController/getAll/') ?>`,
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
          dataPengiriman = json['data'];
          renderPengiriman(dataPengiriman);
        },
        error: function(e) {}
      });
    }

    function renderPengiriman(data) {
      if (data == null || typeof data != "object") {
        console.log("Pengiriman::UNKNOWN DATA");
        return;
      }
      var i = 0;

      var renderData = [];
      Object.values(data).forEach((pengiriman) => {
        var button = `
        <a class="btn btn-success btn-sm" href="<?= site_url('PengirimanController/detail') ?>?id_pengiriman=${pengiriman['id_pengiriman']}"><i class='fa fa-angle-double-right'></i></a>
      `;
        var duplikat = " ";
        if (!dataInfo['edit_perusahaan']) duplikat = ` <a class="duplikat btn-success btn-sm" data-id='${pengiriman['id_pengiriman']}'><i class='fa fa-copy'></i></a>`
        renderData.push([pengiriman['id_pengiriman'], pengiriman['nama_pengiriman'] ? pengiriman['nama_pengiriman'] : 'Tidak Ada', pengiriman['item'], statusPermohonan(pengiriman['status_proposal']), button, duplikat]);
      });
      pengiriman_datatable.clear().rows.add(renderData).draw('full-hold');
    }

    pengiriman_datatable.on('click', '.duplikat', function() {
      var currentData = dataPengiriman[$(this).data('id')];
      $.ajax({
        url: "<?= site_url('PengirimanController/duplikat') ?>",
        'type': 'Get',
        data: {
          id_pengiriman: currentData['id_pengiriman']
        },
        success: function(data) {
          buttonIdle(toolbar.newBtn);
          var json = JSON.parse(data);
          if (json['error']) {
            swal('Duplikat Pengiriman gagal', json['message'], "error");
            return;
          }
          var pengiriman = json['data'];
          dataPengiriman[pengiriman['id_pengiriman']] = pengiriman;
          swal("Duplikat Berhasil", "", "success");
          renderPengiriman(dataPengiriman);

        },
        error: function(e) {}
      });


      // UserModal.idUser.val(currentData['id_user']);
      // UserModal.username.val(currentData['username']);
      // UserModal.nama.val(currentData['nama']);
      // UserModal.opd.val(currentData['id_opd']);
    });
    toolbar.newBtn.on('click', function(e) {
      buttonLoading(toolbar.newBtn);
      $.ajax({
        url: "<?= site_url('PengirimanController/add') ?>",
        'type': 'POST',
        data: {
          id_perusahaan: id_perusahaan
        },
        success: function(data) {
          buttonIdle(toolbar.newBtn);
          var json = JSON.parse(data);
          if (json['error']) {
            swal('Tambah Pengiriman gagal', json['message'], "error");
            return;
          }
          var pengiriman = json['data'];
          $(location).attr('href', `<?= site_url() ?>PengirimanController/detail?id_pengiriman=${pengiriman['id_pengiriman']}`);
        },
        error: function(e) {}
      });
    });
  });
</script>