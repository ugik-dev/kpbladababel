<div class="wrapper wrapper-content animated fadeInRight">
  <div class="ibox ssection-container">
    <div class="ibox-content">
      <form class="form-inline" id="toolbar_form" onsubmit="return false;">
        <select class="form-control mr-sm-2" name="tahun" id="tahun">
          <option value='2020'>2020</option>
          <option value='2019'>2019</option>
        </select>
        <select class="form-control mr-sm-2" name="status" id="status">
          <option value=>-- SEMUA STATUS --</option>
          <option value='Diproses' selected>Diproses</option>
          <option value='Diterima'>Diterima</option>
          <option value='Ditolak'>Ditolak</option>
        </select>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="ibox">
        <div class="ibox-content">
          <div class="table-responsive">
            <table id="req_karantina_datatable" class="table table-bordered table-hover" style="padding:0px">
              <thead>
                <tr>
                  <th style="width: 24%; text-align:center!important">Nama Perusahaan</th>
                  <th style="width: 24%; text-align:center!important">Keterangan Pengiriman</th>
                  <th style="width: 16%; text-align:center!important">Rangkuman Pengiriman</th>
                  <th style="width: 16%; text-align:center!important">Dokumen Permohonan</th>
                  <th style="width: 10%; text-align:center!important">Status</th>
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
  $('#daftar_req_karantina').addClass('active');

  var toolbar = {
    'form': $('#toolbar_form'),
    'tahun': $('#toolbar_form').find('#tahun'),
    'status': $('#toolbar_form').find('#status'),
    'newBtn': $('#new_btn'),
  }

  var req_karantina_datatable = $('#req_karantina_datatable').DataTable({
    'columnDefs': [{ targets: [2, 3, 4, 5], className: 'text-center'}],
    deferRender: true,
    "order": [[ 0, "desc" ]]
  });

  var dataReqKarantina = {}

  toolbar.tahun.on('change', (e) => { getAllReqKarantina(); });
  toolbar.status.on('change', (e) => { getAllReqKarantina(); });

  $.when(getAllReqKarantina()).then((e) =>{
    toolbar.newBtn.prop('disabled', false);
  }).fail((e) => { console.log(e) });
  
  function getAllReqKarantina(){
    swal({title: 'Loading Permohonan Karantina...', allowOutsideClick: false});
    swal.showLoading();
    return $.ajax({
      url: `<?php echo site_url('ReqKarantinaController/getAll/')?>`, 'type': 'GET',
      data: toolbar.form.serialize(),
      success: function (data){
        swal.close();
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataReqKarantina = json['data'];
        renderReqKarantina(dataReqKarantina);
      },
      error: function(e) {}
    });
  }

  function renderReqKarantina(data){
    if(data == null || typeof data != "object"){
      console.log("Pengiriman::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).reverse().forEach((req_karantina) => {
      var button = `
        <a class="btn btn-success btn-sm" href="<?=site_url('ReqKarantinaController/detail')?>?id_req_karantina=${req_karantina['id_req_karantina']}"><i class='fa fa-angle-double-right'></i></a>
      `;
      var rangkuman_pengiriman = downloadButton("<?=site_url('PengirimanController/info_word/?id_pengiriman=')?>", req_karantina['id_pengiriman'], false);
      var dokumen_permohonan = downloadButton("<?=base_url('uploads/dokumen_req_karantina/')?>", req_karantina['dokumen_req_karantina'], false);
      var tanggal_balasan = req_karantina['tanggal_balasan'] ? req_karantina['tanggal_balasan'] : '-';
      var status = statusPermohonan(req_karantina['status']);
      renderData.push([req_karantina['nama_perusahaan'], req_karantina['nama_pengiriman'], rangkuman_pengiriman, dokumen_permohonan, status, button]);
    });
    req_karantina_datatable.clear().rows.add(renderData).draw('full-hold');
  }
});
</script>