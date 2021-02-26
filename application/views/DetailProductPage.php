<div class="wrapper wrapper-content animated fadeInRight" id="info_container">
  <div class="row justify-content-md-center">
    <div class="col-lg-8 m-b-md" style="background-color: white;">
      <h2 id="nama_product">Product</h2>      
      <div id="cover_product" class="product-item" style="background-image:url('https://dummyimage.com/900x600/a3a3a3/fff.jpg');"></div>
      <h4 id="nama_perusahaan"></h4>
      <div id="deskripsi_product" class="m-b-sm"></div>
      <div id="attachment_product" class="m-b-sm"></div>
      <button class="btn btn-success mr-sm-2 m-b-md" id="edit_info_btn" style="display:none"><i class='fa fa-edit'></i> Edit Product</button>
      <button class="btn btn-danger mr-sm-2 m-b-md" id="delete_btn" style="display:none"><i class='fa fa-times'></i> Hapus Product</button>
    </div>
  </div>
</div>

<div class="modal inmodal" id="informasi_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Informasi Product</h4>
            <span id="info"></span>
        </div>
        <div class="modal-body" id="modal-body">
          <form role="form" id="informasi_form" onsubmit="return false;" type="multipart">
            <input type="hidden" id="id_product" name="id_product">
            <div class="form-group">
              <label for="nama_productx">Nama Product</label> 
              <input type="text" placeholder="Nama Product" class="form-control" id="nama_productx" name="nama_product" required="required">
            </div>
            <div class="form-group">
              <label for="cover_productx">Cover Product</label>
              <p class="no-margins"><span id="cover_productx">-</span></p>
            </div>
            <div class="form-group">
              <label for="deskripsi_productx">Deskripsi Product</label> 
              <textarea type="text" id="deskripsi_productx" class="form-control" name="deskripsi_product" placeholder="Tidak ada" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="attachment_productx">Attachment Product</label>
              <p class="no-margins"><span id="attachment_productx">-</span></p>
            </div>
            <button class="btn btn-success my-1 mr-sm-2" type="submit" id="save" data-loading-text="Loading..."><strong>Simpan</strong></button>
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
  $('#detail_perusahaan').addClass('active');

  var id_product = `<?=$contentData['id_product']?>`;
  var info = {
    'self': $('#info_container'),
    'nama_product': $('#info_container').find('#nama_product'),
    'cover_product': $('#info_container').find('#cover_product'),
    'nama_perusahaan': $('#info_container').find('#nama_perusahaan'),
    'deskripsi_product': $('#info_container').find('#deskripsi_product'),
    'attachment_product': $('#info_container').find('#attachment_product'),
    'edit_info_btn': $('#edit_info_btn'),
    'delete_btn': $('#delete_btn'),
  }

  var informasiModal = {
    self: $('#informasi_modal'),
    form: $('#informasi_form'),
    'id_product': $('#informasi_form').find('#id_product'),
    'nama_product': $('#informasi_form').find('#nama_productx'),
    'cover_product': new FileUploader($('#informasi_form').find('#cover_productx'), "", "cover_product", ".jpg", false),
    'deskripsi_product': $('#informasi_form').find('#deskripsi_productx'),
    'attachment_product': new FileUploader($('#informasi_form').find('#attachment_productx'), "", "attachment_product", ".pdf", false),
    save_btn: $('#informasi_modal').find('#save'),
  }
  
  var dataProduct = {};

  $.when(getProduct()).then((e) =>{
    swal.close();
  }).fail((e) => { console.log(e) });

  function getProduct(){
    return $.ajax({
      url: "<?php echo site_url('ProductController/get')?>",
      data : {'id_product': id_product},
      type: 'GET',
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataProduct = json['data'];
        renderBreadcrumb([[`<?=site_url('PerusahaanController/detail')?>?id_perusahaan=${dataProduct['id_perusahaan']}`, dataProduct['nama_perusahaan']], [null, `${dataProduct['nama_product']}`]]);
        renderProduct();
      },
      error: function(e) {}
    });
  }

  function renderProduct(){
    info.nama_product.html(dataProduct['nama_product']);
    info.nama_perusahaan.html(`<a href="<?=site_url('PerusahaanController/detail')?>?id_perusahaan=${dataProduct['id_perusahaan']}">${dataProduct['nama_perusahaan']}</a>`);
    info.cover_product.attr('style',  `background-image:url('<?=base_url('uploads/cover_product/')?>${dataProduct['cover_product']}')`);
    info.deskripsi_product.html(dataProduct['deskripsi_product'] ? dataProduct['deskripsi_product'] : 'Tidak Ada');
    info.attachment_product.html("Attachment: " + downloadButton("<?=base_url('uploads/attachment_product/')?>", dataProduct['attachment_product']));
    info.edit_info_btn.toggle(!dataProduct['edit_perusahaan_pr']);
    info.delete_btn.toggle(!dataProduct['edit_perusahaan_pr']);
  }
  
  info.edit_info_btn.on('click', function(){
    informasiModal.self.modal('show');
    informasiModal.id_product.val(dataProduct['id_product']);
    informasiModal.nama_product.val(dataProduct['nama_product']);
    informasiModal.cover_product.resetState();
    informasiModal.cover_product.updateCurrentFile(dataProduct['cover_product']);
    informasiModal.deskripsi_product.val(dataProduct['deskripsi_product']);
    informasiModal.attachment_product.resetState();
    informasiModal.attachment_product.updateCurrentFile(dataProduct['attachment_product']);
  });

  informasiModal.form.on('submit', (ev) => {
    ev.preventDefault();
    swal(saveConfirmation("Konfirmasi simpan", "Yakin akan menyimpan perubahan permohonan?", "Ya, Simpan!")).then((result) => {
      if(!result.value){ return; }
      buttonLoading(informasiModal.save_btn);
      $.ajax({
        url: "<?=site_url('ProductController/edit')?>", type: "POST",
        data: new FormData(informasiModal.form[0]),
        contentType: false, processData: false,  
        success: (data) => {
          buttonIdle(informasiModal.save_btn);
          json = JSON.parse(data);
          if(json['error']){
            swal("Ubah Product Gagal", json['message'], "error");
            return;
          } 
          dataProduct = json['data'];
          renderProduct();
          swal("Berhasil disimpan", 'Input Informasi Berhasil', "success");
          informasiModal.self.modal('hide');
        },
        error: () => {
          buttonIdle(informasiModal.save_btn);
        },
      });
    });
  });

  info.delete_btn.on('click', function(){
    swal(deleteConfirmation("Konfirmasi hapus", "Yakin akan menghapus permohonan ini?", "Ya, Hapus!")).then((result) => {
      if(!result.value){ return; }
      $.ajax({
        url: "<?=site_url('ProductController/delete')?>", 'type': 'POST',
        data: {'id_product': id_product},
        success: function (data){
          var json = JSON.parse(data);
          if(json['error']){
            swal("Delete Gagal", json['message'], "error");
            return;
          }
          $(location).attr('href', `<?=site_url('PerusahaanController/detail')?>?id_perusahaan=${dataProduct['id_perusahaan']}&tab=product`);
        },
        error: function(e) {}
      });
    });
  });

});
</script>