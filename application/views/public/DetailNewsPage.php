<section id="info_container" class="gray-section p-w-xl">
	<div class="row justify-content-md-center">
		<div class="col-lg-8 m-b-md m-t-xl" style="background-color: white;">
			<h1 style="text-align:center ; font-weight: bold;" id="nama_news">News</h1>      
			<div id="cover_news"></div>
		

			<div id="berita_isi" class="m-b-sm"></div>
			<div id="berita_tanggal" class="m-b-sm"></div>
		</div>
	</div>
</section>
<script>

$(document).ready(function () {

	var id_berita = `<?=$contentData['id_berita']?>`;
 
	var info = {
    'self': $('#info_container'),
    'nama_news': $('#info_container').find('#nama_news'),
    'cover_news': $('#info_container').find('#cover_news'),
    'berita_isi': $('#info_container').find('#berita_isi'),
    'berita_tanggal': $('#info_container').find('#berita_tanggal'),
	}
	console.log(info);
	$('#navbar-item').html(`
			<li><a class="nav-link page-scroll" href="<?=site_url('news')?>">News</a></li>
		
	`)
	initNavbar(0);

  var dataNews = {}

  $.when(getNews()).then((e) =>{
    swal.close();
  }).fail((e) => { console.log(e) });

  function getNews(){
    return $.ajax({
      url: "<?php echo site_url('NewsController/get')?>",
      data : {'id_berita': id_berita},
      type: 'GET',
      success: function (data){
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataNews = json['data'];
        console.log(dataNews);
        renderNews();
      },
      error: function(e) {}
    });
  }

  function renderNews(){
    info.nama_news.html(dataNews['berita_judul']);
    // info.berita_judul.html(`<a href="<?=site_url('PerusahaanController/detail')?>?id_perusahaan=${dataNews['id_perusahaan']}">${dataNews['berita_judul']}</a>`);
    info.cover_news.html(`
    <img width="100%" src="<?php echo base_url().'assets/img/news/';?>${dataNews['berita_image']}">
    <div style="background-image:url('<?=base_url('assets/img/news/')?>${dataNews['berita_image']}')"></div>
            
             
    `);
    info.berita_isi.html(dataNews['berita_isi'] ? dataNews['berita_isi'] : ' ');
    info.berita_tanggal.html(" Post at " +dataNews['berita_tanggal']);
  }
});
</script>

</body>
</html>
