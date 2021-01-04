<div class="wrapper wrapper-content animated fadeInRight">
  <div class="ibox ssection-container">
    <div class="ibox-content">
      <div class="row col-sm-12">
        <form class="form-inline col-sm-5" id="toolbar_form" onsubmit="return false;">
          <input type="hidden" id="status_kpb_rek_not" name="status_kpb_rek_not" value="MENUNGGU">
          <select class="form-control mr-sm-2" name="tahun" id="tahun">
            <option value='2021'>2021</option>
            <option value='2020'>2020</option>
            <option value='2019'>2019</option>
          </select>
          <select class="form-control mr-sm-2" name="status_kpb_rek" id="status_kpb_rek">
            <option value='' selected>-- SEMUA STATUS --</option>
            <option value='DIPROSES'>Diproses</option>
            <option value='DIPROSES2'>Rekomendasi</option>
            <option value='DITERIMA'>Diterima</option>
            <option value='DITOLAK'>Ditolak</option>
          </select>

          <a class="btn btn-success btn-sm" href="<?= site_url() ?>ExcelController/laporan"><i class="fa fa-download"></i> Laporan Excel</a>
        </form>

        <form class="form-inline col-6" id="excel_form" onsubmit="return false;">
          <select class="form-control mr-sm-2" name="tahun" id="tahun">
            <option value='' selected>-- Tahun --</option>
            <option value='2021'>2021</option>
            <option value='2020'>2020</option>
            <option value='2019'>2019</option>
          </select>
          <select class="form-control mr-sm-2" name="bulan" id="bulan">
            <option value='' selected>-- Bulan --</option>
            <option value='01'>Januari</option>
            <option value='02'>Februari</option>
            <option value='03'>Maret</option>
            <option value='04'>April</option>
            <option value='05'>Mei</option>
            <option value='06'>Juni</option>
            <option value='07'>Juli</option>
            <option value='08'>Agustus</option>
            <option value='09'>September</option>
            <option value='10'>Oktober</option>
            <option value='11'>November</option>
            <option value='12'>Desember</option>
          </select>

          <a class="btn btn-success btn-sm" href="#" type="submit" id="download_excel" data-loading-text="Loading..."><i class="fa fa-download"></i> Laporan Excel</a>
        </form>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="ibox">
        <div class="ibox-content">
          <div class="table-responsive">
            <table id="req_kpb_datatable" class="table table-bordered table-hover" style="padding:0px;font-size:11px">
              <thead>
                <tr>
                  <th style="width: 14%; text-align:center!important">Nama Perusahaan</th>
                  <th style="width: 33%; text-align:center!important">Rangkuman Pengiriman</th>
                  <th style="width: 10%; text-align:center!important">Status KPB </th>
                  <th style="width: 10%; text-align:center!important">Status BP3l </th>
                  <th style="width: 5%; text-align:center!important">Detail</th>
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


<div class="modal inmodal" id="reupload_modal" tabindex="-1" opd="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Re Upload Dokumen</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">
        <form opd="form" id="reupload_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_pengiriman" name="id_pengiriman">
          <input type="hidden" id="parm" name="parm">

          <div class="form-group" id="re_upload_dokumen_form">
            <label for="re_upload_dokumen">Surat Keterangan Transaksi</label>
            <p class="no-margins"><span id="re_upload_dokumen">-</span></p>
          </div>
          <!-- <div class="form-group" id="dokumen_kpb_sertifikat_ig_form">
            <label for="dokumen_kpb_sertifikat_ig">Dokumen Sertifikat IG</label>
            <p class="no-margins"><span id="dokumen_kpb_sertifikat_ig">-</span></p>
          </div> -->
          <div class="form-group">
            <label for="catatan_kpb_rek">Catatan</label>
            <textarea type="text" id="catatan_kpb_rek" class="form-control" name="catatan_kpb_rek" required="required" rows="3"></textarea>
          </div>
          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="save_edit_btn" data-loading-text="Loading..."><strong>Simpan</strong></button>
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
    $('#daftar_req_kpb').addClass('active');

    var toolbar = {
      'form': $('#toolbar_form'),
      'tahun': $('#toolbar_form').find('#tahun'),
      'status_kpb_rek': $('#toolbar_form').find('#status_kpb_rek'),
      'newBtn': $('#new_btn'),
    }

    var excel_form = {
      'form': $('#excel_form'),
      'tahun': $('#excel_form').find('#tahun'),
      'bulan': $('#excel_form').find('#bulan'),
      'download_excel': $('#download_excel'),
    }

    var ReuploadModal = {
      self: $('#reupload_modal'),
      form: $('#reupload_form'),
      'id_pengiriman': $('#reupload_form').find('#id_pengiriman'),
      'parm': $('#reupload_form').find('#parm'),
      'reupload': new FileUploader($('#reupload_form').find('#re_upload_dokumen'), "", "re_upload_dokumen", ".pdf", false, true),
      're_upload_dokumen_form': $('#reupload_form').find('#re_upload_dokumen_form'),
      'catatan_kpb_rek': $('#reupload_form').find('#catatan_kpb_rek'),
      //   'catatan_kpb_rek_form': $('#kpb_rek_form').find('#catatan_kpb_rek_form'),
      save_btn: $('#reupload_form').find('#save_edit_btn'),
    }


    var req_kpb_datatable = $('#req_kpb_datatable').DataTable({
      'columnDefs': [{
        targets: [2, 3, 4],
        className: 'text-center'
      }],
      deferRender: true,
      "ordering": false,
    });

    var dataReqKPB = {}

    toolbar.tahun.on('change', (e) => {
      getAllReqKPB();
    });
    toolbar.status_kpb_rek.on('change', (e) => {
      getAllReqKPB();
    });

    excel_form.tahun.on('change', (e) => {
      url = `<?= site_url() ?>ExcelController/laporan?tahun_laporan=${excel_form.tahun.val()}&bulan_laporan=${excel_form.bulan.val()}`
      console.log(url)
      excel_form.download_excel.prop('href', url)
    });

    excel_form.bulan.on('change', (e) => {
      url = `<?= site_url() ?>ExcelController/laporan?tahun_laporan=${excel_form.tahun.val()}&bulan_laporan=${excel_form.bulan.val()}`
      console.log(url)
      excel_form.download_excel.prop('href', url)
    });
    $.when(getAllReqKPB()).then((e) => {
      toolbar.newBtn.prop('disabled', false);
    }).fail((e) => {
      console.log(e)
    });

    function getAllReqKPB() {
      swal({
        title: 'Loading Permohonan KPB...',
        allowOutsideClick: false
      });
      swal.showLoading();
      return $.ajax({
        url: `<?php echo site_url('PengirimanController/getAll/') ?>`,
        'type': 'GET',
        data: toolbar.form.serialize(),
        success: function(data) {
          swal.close();
          var json = JSON.parse(data);
          if (json['error']) {
            return;
          }
          dataReqKPB = json['data'];
          renderReqKPB(dataReqKPB);
        },
        error: function(e) {}
      });
    }


    function statusPermohonan2(status) {
      if (status == 'DIMULAI')
        return `<i class='fa fa-edit text-warning'> Draft</i>`;
      else if (status == 'MENUNGGU')
        return `<i class='fa fa-hourglass-start text-warning'> Belum Memenuhi Prasyarat</i>`;
      else if (status == 'DIPROSES')
        return `<i class='fa fa-hourglass-start text-primary'> Diproses</i>`;
      else if (status == 'DIPROSES2')
        return `<i class='fa fa-hourglass-start text-primary'> Rekomendasi </i>`;
      else if (status == 'DITERIMA')
        return `<i class='fa fa-check text-success'> Diterima</i>`;
      return `<i class='fa fa-times text-danger'> Ditolak</i>`;
    }

    function renderReqKPB(data) {
      if (data == null || typeof data != "object") {
        console.log("Pengiriman::UNKNOWN DATA");
        return;
      }
      var i = 0;

      var renderData = [];
      Object.values(data).reverse().forEach((pengiriman) => {



        var button_reup = `
        <div class="btn-group" opd="group">
          <button id="action" type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='fa fa-pencil'></i></button>
          <div class="dropdown-menu" aria-labelledby="action">
            <a class="reupload dropdown-item" data-parm='dokumen_bp3l_rek' data-id='${pengiriman['id_pengiriman']}'> Rekomendasi BP3L </a>
            <a class="reupload dropdown-item" data-parm='dokumen_bp3l_sertifikat_ig' data-id='${pengiriman['id_pengiriman']}'> Sertifikat IG </a>
            <a class="reupload dropdown-item" data-parm='dokumen_hasil_mutu' data-id='${pengiriman['id_pengiriman']}'> Dok Hasil Mutu </a>
            <a class="reupload dropdown-item" data-parm='dokumen_kpb_rek' data-id='${pengiriman['id_pengiriman']}'> SK TRANSAKSI </a>
   
         </div>
        </div>
      `;

        var rangkuman_pengiriman = `
        <b>Nama</b>: ${pengiriman['nama_pengiriman'] ? pengiriman['nama_pengiriman'] : 'Tidak Ada'}, 
        <b>Status</b>: ${statusPermohonan2(pengiriman['status_proposal'])}, 
        <b>Item</b>: <br>
        ${pengiriman['item'] ? pengiriman['item'] : 'Tidak Ada'}
      `;
        var kpb_rek_prasyarat = "Tidak Ada";
        var kpb_rek_permohonan = pengiriman['dokumen_permohonan'] ? downloadButtonV2("<?= base_url('uploads/dokumen_permohonan/') ?>", pengiriman['dokumen_permohonan'], "Permohonan KPB") : "Tidak Ada";
        // var kpb_rek_permohonan = downloadButtonV2("<?= site_url('PengirimanController/permohonan_bpsmb_mutu/') ?>", "?id_pengiriman=" + pengiriman['id_pengiriman'], "Permohonan");
        var kpb_rek_balasan = downloadButtonV2("<?= base_url('uploads/dokumen_kpb_rek/') ?>", pengiriman['dokumen_kpb_rek'], "Rekomendasi");
        // var kpb_sertifikat_ig_balasan = downloadButtonV2("<?= base_url('uploads/dokumen_kpb_sertifikat_ig/') ?>", pengiriman['dokumen_kpb_sertifikat_ig'], "Sertifikat IG");
        var status = statusPermohonan2(pengiriman['status_kpb_rek']);
        var statusbp3l = statusPermohonan2(pengiriman['status_bp3l_rek']);

        var button = `<a class="btn btn-success btn-sm" href="<?= site_url('PengirimanController/detail') ?>?id_pengiriman=${pengiriman['id_pengiriman']}&tab=dokumen"><i class='fa fa-angle-double-right'></i></a>`;
        renderData.push([pengiriman['nama_perusahaan'], rangkuman_pengiriman, status, statusbp3l, button + button_reup]);

        // renderData.push([pengiriman['nama_perusahaan'], rangkuman_pengiriman, kpb_rek_prasyarat, kpb_rek_permohonan, kpb_rek_balasan, status, statusbp3l, button]);
      });
      req_kpb_datatable.clear().rows.add(renderData).draw('full-hold');
    }



    req_kpb_datatable.on('click', '.reupload', function() {
      // resetUserModal();
      ReuploadModal.form.trigger('reset');
      ReuploadModal.self.modal('show');
      // ReuploadModal.saveEditBtn.show();
      var id = $(this).data('id');
      var parm = $(this).data('parm');
      currentData = dataReqKPB[id];
      console.log(currentData);
      ReuploadModal.id_pengiriman.val(id);
      ReuploadModal.parm.val(parm);
      ReuploadModal.catatan_kpb_rek.val(currentData['catatan_kpb_rek'] ? currentData['catatan_kpb_rek'] : '');
      // ReuploadModal.opd.val(currentData['id_opd']);
    });

    ReuploadModal.form.submit(function(event) {
      event.preventDefault();

      swal(saveConfirmation("Konfirmasi Re-Upload", "Yakin  Re-Upload Dokumen Ini? ", "Ya, Re-Upload!")).then((result) => {
        if (!result.value) {
          return;
        }
        buttonLoading(ReuploadModal.save_btn);
        $.ajax({
          url: "<?= site_url('PengirimanController/re_upload') ?>",
          'type': 'POST',
          data: new FormData(ReuploadModal.form[0]),
          contentType: false,
          processData: false,
          success: function(data) {
            buttonIdle(ReuploadModal.save_btn);
            var json = JSON.parse(data);
            if (json['error']) {
              swal("Simpan Gagal", json['message'], "error");
              return;
            }
            // dataInfo = json['data']
            // renderDokumen(dataInfo);
            ReuploadModal.self.modal('hide');
            swal("Re-Upload Berhasil", "", "success");
          },
          error: function(e) {}
        });
      });
    });


  });
</script>