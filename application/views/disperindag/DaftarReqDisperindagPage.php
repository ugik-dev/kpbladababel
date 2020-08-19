<div class="wrapper wrapper-content animated fadeInRight">
  <div class="ibox ssection-container">
    <div class="ibox-content">
      <form class="form-inline" id="toolbar_form" onsubmit="return false;">
        <input type="hidden" id="status_disperindag_izin_not" name="status_disperindag_izin_not" value="MENUNGGU">
        <select class="form-control mr-sm-2" name="tahun" id="tahun">
          <option value='2020'>2020</option>
          <option value='2019'>2019</option>
        </select>
        <select class="form-control mr-sm-2" name="status_disperindag_izin" id="status_disperindag_izin">
          <option value=>-- SEMUA STATUS --</option>
          <option value='DIPROSES' selected>Diproses</option>
          <option value='DITERIMA'>Diterima</option>
          <option value='DITOLAK'>Ditolak</option>
        </select>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="ibox">
        <div class="ibox-content">
          <div class="table-responsive">
            <table id="req_disperindag_datatable" class="table table-bordered table-hover" style="padding:0px;font-size:11px">
              <thead>
                <tr>
                  <th style="width: 14%; text-align:center!important">Nama Perusahaan</th>
                  <th style="width: 33%; text-align:center!important">Rangkuman Pengiriman</th>
                  <th style="width: 11%; text-align:center!important">Prasyarat</th>
                  <th style="width: 11%; text-align:center!important">Permohonan</th>
                  <th style="width: 11%; text-align:center!important">Balasan</th>
                  <th style="width: 10%; text-align:center!important">Status Disperindag</th>
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

<script>
$(document).ready(function() {
  $('#daftar_req_disperindag').addClass('active');

  var toolbar = {
    'form': $('#toolbar_form'),
    'tahun': $('#toolbar_form').find('#tahun'),
    'status_disperindag_izin': $('#toolbar_form').find('#status_disperindag_izin'),
    'newBtn': $('#new_btn'),
  }

  var req_disperindag_datatable = $('#req_disperindag_datatable').DataTable({
    'columnDefs': [{ targets: [2, 3, 4, 5, 6], className: 'text-center'}],
    deferRender: true,
    "ordering": false,    
  });

  var dataReqDisperindag = {}

  toolbar.tahun.on('change', (e) => { getAllReqDisperindag(); });
  toolbar.status_disperindag_izin.on('change', (e) => { getAllReqDisperindag(); });

  $.when(getAllReqDisperindag()).then((e) =>{
    toolbar.newBtn.prop('disabled', false);
  }).fail((e) => { console.log(e) });
  
  function getAllReqDisperindag(){
    swal({title: 'Loading Permohonan Disperindag...', allowOutsideClick: false});
    swal.showLoading();
    return $.ajax({
      url: `<?php echo site_url('PengirimanController/getAll/')?>`, 'type': 'GET',
      data: toolbar.form.serialize(),
      success: function (data){
        swal.close();
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataReqDisperindag = json['data'];
        renderReqDisperindag(dataReqDisperindag);
      },
      error: function(e) {}
    });
  }

  function renderReqDisperindag(data){
    if(data == null || typeof data != "object"){
      console.log("Pengiriman::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).reverse().forEach((pengiriman) => {
      var rangkuman_pengiriman = `
        <b>Nama</b>: ${pengiriman['nama_pengiriman'] ? pengiriman['nama_pengiriman'] : 'Tidak Ada'}, 
        <b>Status</b>: ${statusPermohonan(pengiriman['status_proposal'])}, 
        <b>Item</b>: <br>
        ${pengiriman['item'] ? pengiriman['item'] : 'Tidak Ada'}
      `;
      var disperindag_izin_prasyarat = downloadButtonV2("<?=base_url('uploads/dokumen_bpsmb_mutu/')?>", pengiriman['dokumen_bpsmb_mutu'], "Hasil Uji BPSMB");
      var disperindag_izin_permohonan = downloadButtonV2("<?=site_url('PengirimanController/permohonan_disperindag_izin/')?>", "?id_pengiriman=" + pengiriman['id_pengiriman'], "Permohonan");
      var disperindag_izin_balasan = downloadButtonV2("<?=base_url('uploads/dokumen_disperindag_izin/')?>", pengiriman['dokumen_disperindag_izin'], "Izin Disperindag");
      var status = statusPermohonan(pengiriman['status_disperindag_izin']);
      var button = `<a class="btn btn-success btn-sm" href="<?=site_url('PengirimanController/detail')?>?id_pengiriman=${pengiriman['id_pengiriman']}&tab=dokumen"><i class='fa fa-angle-double-right'></i></a>`;
      renderData.push([pengiriman['nama_perusahaan'], rangkuman_pengiriman, disperindag_izin_prasyarat, disperindag_izin_permohonan, disperindag_izin_balasan, status, button]);
    });
    req_disperindag_datatable.clear().rows.add(renderData).draw('full-hold');
  }
});
</script>