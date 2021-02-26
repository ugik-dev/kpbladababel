<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox">
        <div class="ibox-content">
          <div class="table-responsive">
            <table id="perusahaan_datatable" class="table table-bordered table-hover" style="padding:0px">
              <thead>
                <tr>
                  <th style="width: 24%; text-align:center!important">Nama Perusahaan</th>
                  <th style="width: 24%; text-align:center!important">Lokasi Perusahaan</th>
                  <th style="width: 10%; text-align:center!important">No SKB</th>
                  <th style="width: 16%; text-align:center!important">File SKB</th>
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
  $('#daftar_perusahaan').addClass('active');

  var perusahaan_datatable = $('#perusahaan_datatable').DataTable({
    'columnDefs': [{ targets: [2, 3, 4], className: 'text-center'}],
    deferRender: true,
    "order": [[ 0, "desc" ]]
  });

  var dataPerusahaan = {}

  $.when(getAllPerusahaan()).then((e) =>{
  }).fail((e) => { console.log(e) });
  
  function getAllPerusahaan(){
    swal({title: 'Loading Perusahaan...', allowOutsideClick: false});
    swal.showLoading();
    return $.ajax({
      url: `<?php echo site_url('PerusahaanController/getAll/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        swal.close();
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataPerusahaan = json['data'];
        renderPerusahaan(dataPerusahaan);
      },
      error: function(e) {}
    });
  }

  function renderPerusahaan(data){
    if(data == null || typeof data != "object"){
      console.log("Pengiriman::UNKNOWN DATA");
      return;
    }
    var i = 0;
    
    var renderData = [];
    Object.values(data).reverse().forEach((perusahaan) => {
      var button = `
        <a class="btn btn-success btn-sm" href="<?=site_url('PerusahaanController/detail')?>?id_perusahaan=${perusahaan['id_perusahaan']}"><i class='fa fa-angle-double-right'></i></a>
      `;
      var skb_perusahaan = downloadButton("<?=base_url('uploads/skb_perusahaan/')?>", perusahaan['skb_perusahaan'], false);
      renderData.push([perusahaan['nama_perusahaan'], perusahaan['lokasi_perusahaan'], perusahaan['no_skb_perusahaan'], skb_perusahaan, button]);
    });
    perusahaan_datatable.clear().rows.add(renderData).draw('full-hold');
  }
});
</script>