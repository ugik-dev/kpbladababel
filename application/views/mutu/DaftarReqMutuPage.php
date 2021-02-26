<div class="wrapper wrapper-content animated fadeInRight">
  <div class="ibox ssection-container">
    <div class="ibox-content">
      <form class="form-inline" id="toolbar_form" onsubmit="return false;">
        <input type="hidden" id="status_bpsmb_mutu_not" name="status_bpsmb_mutu_not" value="MENUNGGU">
        <select class="form-control mr-sm-2" name="tahun" id="tahun">
            <option value='2021'>2021</option>
          <option value='2020'>2020</option>
          <option value='2019'>2019</option>
        </select>
        <select class="form-control mr-sm-2" name="status_bpsmb_mutu" id="status_bpsmb_mutu">
          <option value='' selected>-- SEMUA STATUS --</option>
          <option value='DIPROSES' >Diproses</option>
          <option value='DIPROSES2' >Menunggu Hasil Mutu</option>
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
            <table id="req_mutu_datatable" class="table table-bordered table-hover" style="padding:0px;font-size:11px">
              <thead>
                <tr>
                  <th style="width: 14%; text-align:center!important">Nama Perusahaan</th>
                  <th style="width: 33%; text-align:center!important">Rangkuman Pengiriman</th>
                  <th style="width: 11%; text-align:center!important">Prasyarat</th>
                  <th style="width: 11%; text-align:center!important">Permohonan</th>
                  <th style="width: 11%; text-align:center!important">Balasan</th>
                  <th style="width: 10%; text-align:center!important">Status Mutu</th>
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
  $('#daftar_req_mutu').addClass('active');

  var toolbar = {
    'form': $('#toolbar_form'),
    'tahun': $('#toolbar_form').find('#tahun'),
    'status_bpsmb_mutu': $('#toolbar_form').find('#status_bpsmb_mutu'),
    'newBtn': $('#new_btn'),
  }

  var req_mutu_datatable = $('#req_mutu_datatable').DataTable({
    'columnDefs': [{ targets: [2, 3, 4, 5, 6], className: 'text-center'}],
    deferRender: true,
    "ordering": false,    
  });

  var dataReqMutu = {}

  toolbar.tahun.on('change', (e) => { getAllReqMutu(); });
  toolbar.status_bpsmb_mutu.on('change', (e) => { getAllReqMutu(); });

  $.when(getAllReqMutu()).then((e) =>{
    toolbar.newBtn.prop('disabled', false);
  }).fail((e) => { console.log(e) });
  
  function getAllReqMutu(){
    swal({title: 'Loading Permohonan Mutu...', allowOutsideClick: false});
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
        dataReqMutu = json['data'];
        renderReqMutu(dataReqMutu);
      },
      error: function(e) {}
    });
  }

  function renderReqMutu(data){
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
      var bpsmb_mutu_prasyarat = downloadButtonV2("<?=base_url('uploads/dokumen_bp3l_rek/')?>", pengiriman['dokumen_bp3l_rek'], "Rekomendasi BP3L");
      var bpsmb_mutu_permohonan = downloadButtonV2("<?=base_url('uploads/dokumen_bpsmb_mutu/')?>", pengiriman['dokumen_bpsmb_mutu'], "Download");
      var bpsmb_mutu_balasan = downloadButtonV2("<?=base_url('uploads/dokumen_hasil_mutu/')?>", pengiriman['dokumen_hasil_mutu'], "Hasil Uji");
      var status = statusPermohonan(pengiriman['status_bpsmb_mutu']);
      var button = `<a class="btn btn-success btn-sm" href="<?=site_url('PengirimanController/detail')?>?id_pengiriman=${pengiriman['id_pengiriman']}&tab=dokumen"><i class='fa fa-angle-double-right'></i></a>`;
      renderData.push([pengiriman['nama_perusahaan'], rangkuman_pengiriman, bpsmb_mutu_prasyarat, bpsmb_mutu_permohonan, bpsmb_mutu_balasan, status, button]);
    });
    req_mutu_datatable.clear().rows.add(renderData).draw('full-hold');
  }
});
</script>