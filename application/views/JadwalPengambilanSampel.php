<div class="wrapper wrapper-content animated fadeInRight">


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
                  <th style="width: 10%; text-align:center!important">Tanggal</th>
                  <th style="width: 10%; text-align:center!important">Catatan BPSMB</th>
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
  $('#jadwal_pengambilan_sampel').addClass('active');

  var toolbar = {
    'form': $('#toolbar_form'),
    'tahun': $('#toolbar_form').find('#tahun'),
    'status_kpb_rek': $('#toolbar_form').find('#status_kpb_rek'),
    'newBtn': $('#new_btn'),
  }

  var req_kpb_datatable = $('#req_kpb_datatable').DataTable({
    'columnDefs': [{ targets: [2, 3], className: 'text-center'}],
    deferRender: true,
    "ordering": false,    
  });

  var dataReqKPB = {}

  toolbar.tahun.on('change', (e) => { getAllReqKPB(); });
  toolbar.status_kpb_rek.on('change', (e) => { getAllReqKPB(); });

  $.when(getAllReqKPB()).then((e) =>{
    toolbar.newBtn.prop('disabled', false);
  }).fail((e) => { console.log(e) });
  
  function getAllReqKPB(){
    swal({title: 'Loading Permohonan...', allowOutsideClick: false});
    swal.showLoading();
    return $.ajax({
      url: `<?php echo site_url('PengirimanController/getAll/')?>`, 'type': 'GET',
      data: {sampel : 'sampel'},
      success: function (data){
        swal.close();
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataReqKPB = json['data'];
        renderReqKPB(dataReqKPB);
      },
      error: function(e) {}
    });
  }

  function statusPermohonan2(status){
    if(status == 'DIMULAI')
      return `<i class='fa fa-edit text-warning'> Draft</i>`;
    else if(status == 'MENUNGGU')
      return `<i class='fa fa-hourglass-start text-warning'> Belum Memenuhi Prasyarat</i>`;
    else if(status == 'DIPROSES')
      return `<i class='fa fa-hourglass-start text-primary'> Diproses</i>`;
    else if(status == 'DIPROSES2')
      return `<i class='fa fa-hourglass-start text-primary'> Rekomendasi </i>`;
    else if(status == 'DITERIMA')
      return `<i class='fa fa-check text-success'> Diterima</i>`;
    return `<i class='fa fa-times text-danger'> Ditolak</i>`;
  }

  function renderReqKPB(data){
    if(data == null || typeof data != "object"){
      console.log("Pengiriman::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).reverse().forEach((pengiriman) => {
      var rangkuman_pengiriman = `
        <b>Nama</b>: ${pengiriman['nama_pengiriman'] ? pengiriman['nama_pengiriman'] : 'Tidak Ada'}, 
        <b>Status</b>: ${statusPermohonan2(pengiriman['status_proposal'])}, 
        <b>Item</b>: <br>
        ${pengiriman['item'] ? pengiriman['item'] : 'Tidak Ada'}
      `;
      var button = `<a class="btn btn-success btn-sm" href="<?=site_url('PengirimanController/detail')?>?id_pengiriman=${pengiriman['id_pengiriman']}&tab=dokumen"><i class='fa fa-angle-double-right'></i></a>`;
      renderData.push([pengiriman['nama_perusahaan']+'<br><br> Alamat Gudang: '+pengiriman['lok_gudang_penyimpanan_full']+', '+pengiriman['lok_gudang_penyimpanan_kec']+', '+pengiriman['lok_gudang_penyimpanan_kabkot'], rangkuman_pengiriman, pengiriman['tgl_sampel'], pengiriman['catatan_bpsmb_mutu'], button]);
    });
    req_kpb_datatable.clear().rows.add(renderData).draw('full-hold');
  }
});
</script>