<section id="info_container" class="gray-section p-w-xl">
	<div class="row justify-content-md-center">
		<div class="col-lg-8 m-b-md m-t-xl" style="background-color: white;">
			<h2 id="nama_product">Product</h2>      
			<div id="cover_product" class="product-item" style="background-image:url('https://dummyimage.com/900x600/a3a3a3/fff.jpg');"></div>
			<h4 id="nama_perusahaan"></h4>
			<div id="deskripsi_product" class="m-b-sm"></div>
			<div id="attachment_product" class="m-b-sm"></div>
		</div>
	</div>
</section>
<script>

$(document).ready(function () {

	var id_product = `<?=$contentData['id_product']?>`;
	var info = {
    'self': $('#info_container'),
    'nama_product': $('#info_container').find('#nama_product'),
    'cover_product': $('#info_container').find('#cover_product'),
    'nama_perusahaan': $('#info_container').find('#nama_perusahaan'),
    'deskripsi_product': $('#info_container').find('#deskripsi_product'),
    'attachment_product': $('#info_container').find('#attachment_product'),
	}
	console.log(info);
	$('#navbar-item').html(`
			<li><a class="nav-link page-scroll" href="<?=site_url('products')?>">Products</a></li>
			<li><a class="nav-link page-scroll" href="#page-top"><?=$title?></a></li>
	`)
	initNavbar(0);

  var dataProduct = {}

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
  }
});
</script>

</body>
</html>
