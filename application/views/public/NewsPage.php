<section id="newss" class="gray-section p-w-xl">
	<div class="row">
		<div class="col-lg-12 text-center">
			<div class="navy-line"></div>
			<h1>News</h1>
			<!-- <p>Some of the newss from our customers</p> -->
		</div>
		<div class="col-lg-12" id="news-list"></div>
	</div>
</section>
<script>

$(document).ready(function () {

	var news_list = $('#news-list');
	$('#navbar-item').html(`
		<li><a class="nav-link page-scroll" href="#page-top">News</a></li>
	`)
    
	initNavbar(0);

  var dataNews = {}

  $.when(getAllNews()).then((e) =>{
  }).fail((e) => { console.log(e) });

  function getAllNews(){
    swal({title: 'Loading news...', allowOutsideClick: false});
    swal.showLoading();
    return $.ajax({
      url: `<?php echo site_url('NewsController/getAll/')?>`, 'type': 'GET',
      data: {},
      success: function (data){
        swal.close();
        var json = JSON.parse(data);
        if(json['error']){
          return;
        }
        dataNews = json['data'];
        renderNews(dataNews);
      },
      error: function(e) {}
    });
  }

  function renderNews(data){
    if(data == null || typeof data != "object"){
      console.log("News::UNKNOWN DATA");
      return;
    }

    news_list.empty();
    Object.values(data).forEach((news) => {
      var panjang = news['berita_isi'];
      // var p = panjang.substring(0, 1200);
      var index_p = panjang.lastIndexOf("</p>",1200);
      p = panjang.substring(0, index_p);
           
      news_list.append(`
      <div class="col-sm-12">
          <div class="ibox product-box" style="cursor:pointer" onclick="location.href='<?=site_url('newsx?id_news=');?>${news['berita_id']}'">
            <div class="ibox-title text-center">
              <h5>${news['berita_judul'] }</h5>
            </div>
            <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-5 ibox-content">
              <div class="product-item" style="background-image:url('<?=base_url('assets/img/news/')?>${news['berita_image']}')"></div>
              </div>
              <div class="col-sm-7 ibox-content">
                ${p}
              </div>
              </div>
            </div>
          </div>
        </div>
      `);
    });
  }
});
</script>

</body>
</html>
