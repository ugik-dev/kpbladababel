<div class="wrapper wrapper-content animated fadeInRight">
  <form class="form-inline m-b-sm" id="product_toolbar" onsubmit="return false;">
    <!-- <select class="form-control mr-sm-2" name="id_role" id="id_role"></select> -->
    <button type="button" class="btn btn-success my-1 mr-sm-2" id="new_btn" disabled="disabled" data-loading-text="Loading..." style="display:none"><i class="fal fa-plus"></i> Tambah Product Baru</button>
  </form>
  
  <div class="row" id="product-list"></div>
</div>

<script>
$(document).ready(function() {
  var id_perusahaan = `<?=$contentData['id_perusahaan']?>`;

  var toolbar = {
    'form': $('#product_toolbar'),
    'id_role': $('#product_toolbar').find('#id_role'),
    'id_opd': $('#product_toolbar').find('#id_opd'),
    'newBtn': $('#product_toolbar').find('#new_btn'),
  }
  // console.log(dataInfo['edit_perusahaan_pr']);
  <?php if( $this->session->userdata()['id_perusahaan'] ==  $contentData['id_perusahaan'] ){
  ?>
  toolbar.newBtn.toggle(true); 
   console.log("true");
    <?php }
  ?>
   // info.edit_info_btn.toggle(FALSE); 
  var product_list = $('#product-list');

  var dataProduct = {}

  $.when(getAllProduct()).then((e) =>{
    toolbar.newBtn.prop('disabled', false);
  }).fail((e) => { console.log(e) });

  function getAllProduct(){
    swal({title: 'Loading product...', allowOutsideClick: false});
    swal.showLoading();
    return $.ajax({
      url: `<?php echo site_url('ProductController/getAll/')?>`, 'type': 'GET',
      data: {id_perusahaan: id_perusahaan},
      success: function (data){
        swal.close();
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataProduct = json['data'];
        renderProduct(dataProduct);
      },
      error: function(e) {}
    });
  }

  function renderProduct(data){
    if(data == null || typeof data != "object"){
      console.log("Product::UNKNOWN DATA");
      return;
    }

    product_list.empty();
    Object.values(data).forEach((product) => {
      product_list.append(`
        <div class="col-sm-3">
          <div class="ibox product-box" style="cursor:pointer" onclick="location.href='<?=site_url('ProductController/detail/?id_product=');?>${product['id_product']}'">
            <div class="ibox-title">
              <h5>${product['nama_product']}</h5>
            </div>
            <div>
              <div class="ibox-content no-padding border-left-right">
                <div class="product-item" style="background-image:url('<?=base_url('uploads/cover_product/')?>${product['cover_product']}')"></div>
              </div>
              <div class="ibox-content profile-content">
                <h4><strong>${product['nama_perusahaan']}</strong></h4>
                <p>${product['deskripsi_product']}</p>
              </div>
            </div>
          </div>
        </div>
      `);
      // console.log(product['edit_perusahaan_pr']);
      // toolbar.newBtn.toggle(!product['edit_perusahaan_pr']);
    });
    console.log(product['edit_perusahaan_pr']);
    // toolbar.newBtn.toggle(!product['edit_perusahaan_pr']);
  }

  toolbar.newBtn.on('click', function(e){
    buttonLoading(toolbar.newBtn);
    $.ajax({
      url: "<?=site_url('ProductController/add')?>", 'type': 'POST',
      data: {id_perusahaan: id_perusahaan},
      success: function (data){
        buttonIdle(toolbar.newBtn);
        var json = JSON.parse(data);
        if(json['error']){
          swal('Tambah Product gagal', json['message'], "error");
          return;
        }
        var product = json['data'];
        $(location).attr('href', `<?=site_url()?>ProductController/detail?id_product=${product['id_product']}`);
      },
      error: function(e) {}
    });
  });
});
</script>