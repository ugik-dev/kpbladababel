<div class="wrapper wrapper-content animated fadeInRight">
  <div class="ibox ssection-container">
    <div class="ibox-content">
      <form class="form-inline" id="toolbar_form" onsubmit="return false;">
        <button type="button" class="btn btn-success my-1 mr-sm-2" id="new_btn" disabled="disabled"><i class="fal fa-plus"></i> Tambah Harga MWP Baru</button>
        <div class="bg-primary p-w-xs">.</div><span class="m-l-xs">Harga Petani</span>
        <div class="bg-success p-w-xs m-l-sm">.</div><span class="m-l-xs">Harga FOB</span>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="ibox">
        <div class="ibox-content">
          <div class="table-responsive">
            <table id="HargaMWPTable" class="table table-bordered table-hover" style="padding:0px;font-size:11px">
              <thead>
                <tr>
                  <th style="width: 10%;">Tanggal</th>
                  <th style="width: 12%;">MWP1</th>
                  <th style="width: 12%;">MWP2</th>
                  <th style="width: 12%;">ASTA</th>
                  <th style="width: 12%;">ESA</th>
                  <th style="width: 12%;">IPC</th>
                  <th style="width: 12%;">SNI1</th>
                  <th style="width: 12%;">ISO</th>
                  <th style="width: 5%;">Action</th>
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

<div class="modal inmodal" id="harga_mwp_modal" tabindex="-1" opd="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Harga MWP</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">
        <form opd="form" id="harga_mwp_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_harga_mwp" name="id_harga_mwp">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="tanggal_berlaku">Tanggal Berlaku</label>
                <input type="text" class="form-control" placeholder="Tanggal Berlaku" id="tanggal_berlaku" name="tanggal_berlaku" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="harga_mwp1_petani">MWP1 Petani (Rp)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="harga_mwp1_petani" name="harga_mwp1_petani" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="harga_mwp1_fob">MWP1 FOB (Rp)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="harga_mwp1_fob" name="harga_mwp1_fob" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="d_harga_mwp1_petani">MWP1 Petani (USD)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="d_harga_mwp1_petani" name="d_harga_mwp1_petani" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="d_harga_mwp1_fob">MWP1 FOB (USD)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="d_harga_mwp1_fob" name="d_harga_mwp1_fob" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="harga_mwp2_petani">MWP2 Petani (Rp)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="harga_mwp2_petani" name="harga_mwp2_petani" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="harga_mwp2_fob">MWP2 FOB (Rp)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="harga_mwp2_fob" name="harga_mwp2_fob" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="d_harga_mwp2_petani">MWP2 Petani (USD)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="d_harga_mwp2_petani" name="d_harga_mwp2_petani" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="d_harga_mwp2_fob">MWP2 FOB (USD)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="d_harga_mwp2_fob" name="d_harga_mwp2_fob" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="harga_asta_petani">ASTA Petani (Rp)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="harga_asta_petani" name="harga_asta_petani" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="harga_asta_fob">ASTA FOB (Rp)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="harga_asta_fob" name="harga_asta_fob" required="required">
              </div>
            </div>

            <div class="col-sm-3">
              <div class="form-group">
                <label for="d_harga_asta_petani">ASTA Petani (USD)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="d_harga_asta_petani" name="d_harga_asta_petani" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="d_harga_asta_fob">ASTA FOB (USD)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="d_harga_asta_fob" name="d_harga_asta_fob" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="harga_esa_petani">ESA Petani (Rp)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="harga_esa_petani" name="harga_esa_petani" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="harga_esa_fob">ESA FOB (Rp)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="harga_esa_fob" name="harga_esa_fob" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="d_harga_esa_petani">ESA Petani (USD)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="d_harga_esa_petani" name="d_harga_esa_petani" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="d_harga_esa_fob">ESA FOB (USD)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="d_harga_esa_fob" name="d_harga_esa_fob" required="required">
              </div>
            </div>

            <div class="col-sm-3">
              <div class="form-group">
                <label for="harga_ipc_petani">IPC Petani (Rp)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="harga_ipc_petani" name="harga_ipc_petani" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="harga_ipc_fob">IPC FOB (Rp)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="harga_ipc_fob" name="harga_ipc_fob" required="required">
              </div>
            </div>

            <div class="col-sm-3">
              <div class="form-group">
                <label for="d_harga_ipc_petani">IPC Petani (USD)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="d_harga_ipc_petani" name="d_harga_ipc_petani" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="d_harga_ipc_fob">IPC FOB (USD)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="d_harga_ipc_fob" name="d_harga_ipc_fob" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="harga_sni1_petani">SNI1 Petani (Rp)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="harga_sni1_petani" name="harga_sni1_petani" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="harga_sni1_fob">SNI1 FOB (Rp)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="harga_sni1_fob" name="harga_sni1_fob" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="d_harga_sni1_petani">SNI1 Petani (USD)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="d_harga_sni1_petani" name="d_harga_sni1_petani" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="d_harga_sni1_fob">SNI1 FOB (USD)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="d_harga_sni1_fob" name="d_harga_sni1_fob" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="harga_iso_petani">ISO Petani (Rp)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="harga_iso_petani" name="harga_iso_petani" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="harga_iso_fob">ISO FOB (Rp)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="harga_iso_fob" name="harga_iso_fob" required="required">
              </div>
            </div>

            <div class="col-sm-3">
              <div class="form-group">
                <label for="d_harga_iso_petani">ISO Petani (USD)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="d_harga_iso_petani" name="d_harga_iso_petani" required="required">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="d_harga_iso_fob">ISO FOB (USD)</label>
                <input type="number" min="0" step="1" placeholder="0" class="form-control" id="d_harga_iso_fob" name="d_harga_iso_fob" required="required">
              </div>
            </div>

          </div>

          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="add_btn" data-loading-text="Loading..."><strong>Tambah Harga</strong></button>
          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="save_edit_btn" data-loading-text="Loading..."><strong>Simpan Perubahan</strong></button>
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
    $('#kelola_harga_mwp').addClass('active');
    // $('#setting_parm').addClass('active');


    var toolbar = {
      'form': $('#toolbar_form'),
      'id_role': $('#toolbar_form').find('#id_role'),
      'newBtn': $('#new_btn'),
    }

    var HargaMWPTable = $('#HargaMWPTable').DataTable({
      'columnDefs': [{
        targets: [0, 1, 2, 3, 4, 5, 6, 7, 8],
        className: 'text-center'
      }],
      deferRender: true,
      "ordering": false,
    });

    var harga_mwp_modal = {
      'self': $('#harga_mwp_modal'),
      'info': $('#harga_mwp_modal').find('.info'),
      'form': $('#harga_mwp_modal').find('#harga_mwp_form'),
      'addBtn': $('#harga_mwp_modal').find('#add_btn'),
      'saveEditBtn': $('#harga_mwp_modal').find('#save_edit_btn'),
      'id_harga_mwp': $('#harga_mwp_modal').find('#id_harga_mwp'),
      'tanggal_berlaku': $('#harga_mwp_modal').find('#tanggal_berlaku'),
      'harga_mwp1_petani': $('#harga_mwp_modal').find('#harga_mwp1_petani'),
      'harga_mwp1_fob': $('#harga_mwp_modal').find('#harga_mwp1_fob'),
      'harga_mwp2_petani': $('#harga_mwp_modal').find('#harga_mwp2_petani'),
      'harga_mwp2_fob': $('#harga_mwp_modal').find('#harga_mwp2_fob'),
      'harga_asta_petani': $('#harga_mwp_modal').find('#harga_asta_petani'),
      'harga_asta_fob': $('#harga_mwp_modal').find('#harga_asta_fob'),
      'harga_esa_petani': $('#harga_mwp_modal').find('#harga_esa_petani'),
      'harga_esa_fob': $('#harga_mwp_modal').find('#harga_esa_fob'),
      'harga_ipc_petani': $('#harga_mwp_modal').find('#harga_ipc_petani'),
      'harga_ipc_fob': $('#harga_mwp_modal').find('#harga_ipc_fob'),
      'harga_sni1_petani': $('#harga_mwp_modal').find('#harga_sni1_petani'),
      'harga_sni1_fob': $('#harga_mwp_modal').find('#harga_sni1_fob'),
      'harga_iso_petani': $('#harga_mwp_modal').find('#harga_iso_petani'),
      'harga_iso_fob': $('#harga_mwp_modal').find('#harga_iso_fob'),

      'd_harga_mwp1_petani': $('#harga_mwp_modal').find('#d_harga_mwp1_petani'),
      'd_harga_mwp1_fob': $('#harga_mwp_modal').find('#d_harga_mwp1_fob'),
      'd_harga_mwp2_petani': $('#harga_mwp_modal').find('#d_harga_mwp2_petani'),
      'd_harga_mwp2_fob': $('#harga_mwp_modal').find('#d_harga_mwp2_fob'),
      'd_harga_asta_petani': $('#harga_mwp_modal').find('#d_harga_asta_petani'),
      'd_harga_asta_fob': $('#harga_mwp_modal').find('#hd_arga_asta_fob'),
      'd_harga_esa_petani': $('#harga_mwp_modal').find('#d_harga_esa_petani'),
      'd_harga_esa_fob': $('#harga_mwp_modal').find('#d_harga_esa_fob'),
      'd_harga_ipc_petani': $('#harga_mwp_modal').find('#d_harga_ipc_petani'),
      'd_harga_ipc_fob': $('#harga_mwp_modal').find('#d_harga_ipc_fob'),
      'd_harga_sni1_petani': $('#harga_mwp_modal').find('#d_harga_sni1_petani'),
      'd_harga_sni1_fob': $('#harga_mwp_modal').find('#d_harga_sni1_fob'),
      'd_harga_iso_petani': $('#harga_mwp_modal').find('#d_harga_iso_petani'),
      'd_harga_iso_fob': $('#harga_mwp_modal').find('#d_harga_iso_fob'),
    }

    harga_mwp_modal.tanggal_berlaku.datepicker({
      todayBtn: "linked",
      autoclose: true,
      format: "yyyy-mm-dd"
    });

    var dataHargaMWP = {}

    $.when(getAllHargaMWP()).then((e) => {
      toolbar.newBtn.prop('disabled', false);
    }).fail((e) => {
      console.log(e)
    });

    function getAllHargaMWP() {
      swal({
        title: 'Loading harga_mwp...',
        allowOutsideClick: false
      });
      swal.showLoading();
      return $.ajax({
        url: `<?php echo site_url('HargaMWPController/getAll/') ?>`,
        'type': 'GET',
        data: toolbar.form.serialize(),
        success: function(data) {
          swal.close();
          var json = JSON.parse(data);
          if (json['error']) {
            return;
          }
          dataHargaMWP = json['data'];
          renderHargaMWP(dataHargaMWP);
        },
        error: function(e) {}
      });
    }

    function renderHargaMWP(data) {
      if (data == null || typeof data != "object") {
        console.log("HargaMWP::UNKNOWN DATA");
        return;
      }
      var i = 0;

      var renderData = [];
      Object.values(data).sort((a, b) => new Date(b['tanggal_berlaku']) - new Date(a['tanggal_berlaku'])).forEach((harga_mwp) => {
        var editButton = `
        <a class="edit dropdown-item" data-id='${harga_mwp['id_harga_mwp']}'><i class='fa fa-pencil'></i> Edit Harga MWP</a>
      `;
        var deleteButton = `
        <a class="delete dropdown-item" data-id='${harga_mwp['id_harga_mwp']}'><i class='fa fa-trash'></i> Hapus Harga MWP</a>
      `;
        var button = `
        <div class="btn-group" opd="group">
          <button id="action" type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='fa fa-bars'></i></button>
          <div class="dropdown-menu" aria-labelledby="action">
            ${editButton}
            ${deleteButton}
          </div>
        </div>
      `;
        renderData.push([harga_mwp['tanggal_berlaku'],
          renderHargaPetani(harga_mwp['harga_mwp1_petani']) + renderHargaFOB(harga_mwp['harga_mwp1_fob']) +
          renderHargaPetaniD(harga_mwp['d_harga_mwp1_petani']) + renderHargaFOBD(harga_mwp['d_harga_mwp1_fob']),
          renderHargaPetani(harga_mwp['harga_mwp2_petani']) + renderHargaFOB(harga_mwp['harga_mwp2_fob']) +
          renderHargaPetaniD(harga_mwp['d_harga_mwp2_petani']) + renderHargaFOBD(harga_mwp['d_harga_mwp2_fob']),
          renderHargaPetani(harga_mwp['harga_asta_petani']) + renderHargaFOB(harga_mwp['harga_asta_fob']) +
          renderHargaPetaniD(harga_mwp['d_harga_asta_petani']) + renderHargaFOBD(harga_mwp['d_harga_asta_fob']),
          renderHargaPetani(harga_mwp['harga_esa_petani']) + renderHargaFOB(harga_mwp['harga_esa_fob']) +
          renderHargaPetaniD(harga_mwp['d_harga_esa_petani']) + renderHargaFOBD(harga_mwp['d_harga_esa_fob']),
          renderHargaPetani(harga_mwp['harga_ipc_petani']) + renderHargaFOB(harga_mwp['harga_ipc_fob']) +
          renderHargaPetaniD(harga_mwp['d_harga_ipc_petani']) + renderHargaFOBD(harga_mwp['d_harga_ipc_fob']),
          renderHargaPetani(harga_mwp['harga_sni1_petani']) + renderHargaFOB(harga_mwp['harga_sni1_fob']) +
          renderHargaPetaniD(harga_mwp['d_harga_sni1_petani']) + renderHargaFOBD(harga_mwp['d_harga_sni1_fob']),
          renderHargaPetani(harga_mwp['harga_iso_petani']) + renderHargaFOB(harga_mwp['harga_iso_fob']) +
          renderHargaPetaniD(harga_mwp['d_harga_iso_petani']) + renderHargaFOBD(harga_mwp['d_harga_iso_fob']),
          button
        ]);
      });
      HargaMWPTable.clear().rows.add(renderData).draw('full-hold');
    }

    function renderHargaPetani(harga) {
      return `<div class="bg-primary">Rp. ${harga}</div>`;
    }

    function renderHargaFOB(harga) {
      return `<div class="bg-success">Rp. ${harga}</div>`;
    }

    function renderHargaPetaniD(harga) {
      return `<div class="bg-primary">USD ${harga}</div>`;
    }

    function renderHargaFOBD(harga) {
      return `<div class="bg-success">USD ${harga}</div>`;
    }

    toolbar.newBtn.on('click', (e) => {
      harga_mwp_modal.form.trigger('reset');
      harga_mwp_modal.self.modal('show');
      harga_mwp_modal.addBtn.show();
      harga_mwp_modal.saveEditBtn.hide();
    });

    HargaMWPTable.on('click', '.edit', function() {
      harga_mwp_modal.form.trigger('reset');
      harga_mwp_modal.self.modal('show');
      harga_mwp_modal.addBtn.hide();
      harga_mwp_modal.saveEditBtn.show();

      var currentData = dataHargaMWP[$(this).data('id')];
      harga_mwp_modal.id_harga_mwp.val(currentData['id_harga_mwp']);
      harga_mwp_modal.tanggal_berlaku.val(currentData['tanggal_berlaku']);
      harga_mwp_modal.harga_mwp1_petani.val(currentData['harga_mwp1_petani']);
      harga_mwp_modal.harga_mwp1_fob.val(currentData['harga_mwp1_fob']);
      harga_mwp_modal.harga_mwp2_petani.val(currentData['harga_mwp2_petani']);
      harga_mwp_modal.harga_mwp2_fob.val(currentData['harga_mwp2_fob']);
      harga_mwp_modal.harga_asta_petani.val(currentData['harga_asta_petani']);
      harga_mwp_modal.harga_asta_fob.val(currentData['harga_asta_fob']);
      harga_mwp_modal.harga_esa_petani.val(currentData['harga_esa_petani']);
      harga_mwp_modal.harga_esa_fob.val(currentData['harga_esa_fob']);
      harga_mwp_modal.harga_ipc_petani.val(currentData['harga_ipc_petani']);
      harga_mwp_modal.harga_ipc_fob.val(currentData['harga_ipc_fob']);
      harga_mwp_modal.harga_sni1_petani.val(currentData['harga_sni1_petani']);
      harga_mwp_modal.harga_sni1_fob.val(currentData['harga_sni1_fob']);
      harga_mwp_modal.harga_iso_petani.val(currentData['harga_iso_petani']);
      harga_mwp_modal.harga_iso_fob.val(currentData['harga_iso_fob']);

      d_harga_mwp_modal.harga_mwp1_petani.val(currentData['d_harga_mwp1_petani']);
      d_harga_mwp_modal.harga_mwp1_fob.val(currentData['d_harga_mwp1_fob']);
      d_harga_mwp_modal.harga_mwp2_petani.val(currentData['d_harga_mwp2_petani']);
      d_harga_mwp_modal.harga_mwp2_fob.val(currentData['d_harga_mwp2_fob']);
      d_harga_mwp_modal.harga_asta_petani.val(currentData['d_harga_asta_petani']);
      d_harga_mwp_modal.harga_asta_fob.val(currentData['d_harga_asta_fob']);
      d_harga_mwp_modal.harga_esa_petani.val(currentData['d_harga_esa_petani']);
      d_harga_mwp_modal.harga_esa_fob.val(currentData['d_harga_esa_fob']);
      d_harga_mwp_modal.harga_ipc_petani.val(currentData['d_harga_ipc_petani']);
      d_harga_mwp_modal.harga_ipc_fob.val(currentData['d_harga_ipc_fob']);
      d_harga_mwp_modal.harga_sni1_petani.val(currentData['d_harga_sni1_petani']);
      d_harga_mwp_modal.harga_sni1_fob.val(currentData['d_harga_sni1_fob']);
      d_harga_mwp_modal.harga_iso_petani.val(currentData['d_harga_iso_petani']);
      d_harga_mwp_modal.harga_iso_fob.val(currentData['d_harga_iso_fob']);
    });

    harga_mwp_modal.form.submit(function(event) {
      event.preventDefault();
      var isAdd = harga_mwp_modal.addBtn.is(':visible');
      var url = "<?= site_url('HargaMWPController/') ?>";
      url += isAdd ? "add" : "edit";
      var button = isAdd ? harga_mwp_modal.addBtn : harga_mwp_modal.saveEditBtn;

      swal(saveConfirmation("Konfirmasi simpan", "Yakin akan menyimpan harga MWP ini", "Ya, Simpan!")).then((result) => {
        if (!result.value) {
          return;
        }
        buttonLoading(button);
        $.ajax({
          url: url,
          'type': 'POST',
          data: harga_mwp_modal.form.serialize(),
          success: function(data) {
            buttonIdle(button);
            var json = JSON.parse(data);
            if (json['error']) {
              swal("Simpan Gagal", json['message'], "error");
              return;
            }
            var harga_mwp = json['data']
            dataHargaMWP[harga_mwp['id_harga_mwp']] = harga_mwp;
            swal("Simpan Berhasil", "", "success");
            renderHargaMWP(dataHargaMWP);
            harga_mwp_modal.self.modal('hide');
          },
          error: function(e) {}
        });
      });
    });

    HargaMWPTable.on('click', '.delete', function() {
      event.preventDefault();
      var id = $(this).data('id');
      swal(deleteConfirmation("Konfirmasi hapus", "Yakin akan menghapus harga MWP ini?", "Ya, Hapus!")).then((result) => {
        if (!result.value) {
          return;
        }
        $.ajax({
          url: "<?= site_url('HargaMWPController/delete') ?>",
          'type': 'POST',
          data: {
            'id_harga_mwp': id
          },
          success: function(data) {
            var json = JSON.parse(data);
            if (json['error']) {
              swal("Delete Gagal", json['message'], "error");
              return;
            }
            delete dataHargaMWP[id];
            swal("Delete Berhasil", "", "success");
            renderHargaMWP(dataHargaMWP);
          },
          error: function(e) {}
        });
      });
    });
  });
</script>