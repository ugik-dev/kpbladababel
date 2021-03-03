<!-- <div class="preloader" id="preloader"></div> -->

<?php


if (!empty($_COOKIE['lang_set']) && $_COOKIE['lang_set'] == 'en') {

    $this->load->view('publicv2/selection/eng/banner');
    $this->load->view('publicv2/selection/eng/calculate');
    $this->load->view('publicv2/selection/eng/about');
    $this->load->view('publicv2/selection/eng/news');
    // $this->load->view('publicv2/selection/eng/tabmutu');
    $this->load->view('publicv2/selection/eng/choose');
    $this->load->view('publicv2/selection/eng/invest');
    $this->load->view('publicv2/selection/eng/ourbignes');
    $this->load->view('publicv2/selection/eng/affiliate');
    $this->load->view('publicv2/selection/eng/referral');
    // $this->load->view('publicv2/selection/eng/deposit');
    // $this->load->view('publicv2/selection/eng/transaction');
    // $this->load->view('publicv2/selection/eng/download');
    $this->load->view('publicv2/selection/eng/testimonial');
    $this->load->view('publicv2/selection/eng/question');
    $this->load->view('publicv2/selection/eng/signup');
    $this->load->view('publicv2/selection/eng/contact');
} else {

    $this->load->view('publicv2/selection/indo/banner');
    $this->load->view('publicv2/selection/indo/calculate');
    $this->load->view('publicv2/selection/indo/about');
    $this->load->view('publicv2/selection/indo/news');
    // $this->load->view('publicv2/selection/indo/tabmutu');
    $this->load->view('publicv2/selection/indo/choose');
    $this->load->view('publicv2/selection/indo/invest');
    $this->load->view('publicv2/selection/indo/ourbignes');
    $this->load->view('publicv2/selection/indo/affiliate');
    $this->load->view('publicv2/selection/indo/referral');
    // $this->load->view('publicv2/selection/indo/deposit');
    // $this->load->view('publicv2/selection/indo/transaction');
    // $this->load->view('publicv2/selection/indo/download');
    $this->load->view('publicv2/selection/testimonial');
    $this->load->view('publicv2/selection/indo/question');
    $this->load->view('publicv2/selection/indo/signup');
    $this->load->view('publicv2/selection/indo/contact');
}
?>


<!-- <script>
    $(document).ready(function() {
        var lang = <?php if (!empty($_COOKIE['lang_set']) && $_COOKIE['lang_set'] == 'en') {
                        echo "'en'";
                    } else {
                        echo "'in'";
                    } ?>;
        var product_list = $('#product-list');
        var news_list = $('#news-list');
        var current_date = $('#current_date');
        //	<li><a class="nav-link page-scroll" href="#partners">Partners</a></li>

        current_date.html(new Date().toLocaleDateString());
        var dataProduct = {}
        var dataNews = {}

        initNavbar(200);
        $.when(getLatestHargaMWP(), getStandarMutu(), getAllProduct(), getAllNews()).then((e) => {}).fail((e) => {
            console.log(e)
        });

        var HargaMWPTable = $('#HargaMWPTable').DataTable({
            'columnDefs': [{
                targets: [0, 1, 2],
                className: 'text-center'
            }],
            deferRender: true,
            "ordering": false,
            "dom": "t"
        });

        var HargaMWPTable2 = $('#HargaMWPTable2').DataTable({
            'columnDefs': [{
                targets: [0, 1, 2, 3],
                className: 'text-center'
            }],
            deferRender: true,
            "ordering": false,
            "dom": "t"
        });


        var StandarMutuTable = $('#StandarMutuTable').DataTable({
            'columnDefs': [{
                targets: [0, 1, 2],
                className: 'text-center'
            }],
            deferRender: true,
            "ordering": false,
            "dom": "t"
        });

        function getLatestHargaMWP() {
            swal({
                title: 'Loading harga_mwp...',
                allowOutsideClick: false
            });
            swal.showLoading();
            return $.ajax({
                url: `<?php echo site_url('HargaMWPController/getLatest3/') ?>`,
                'type': 'GET',
                data: {},
                success: function(data) {
                    swal.close();
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataHargaMWP = json['data'];
                    renderHargaMWP2(dataHargaMWP);
                },
                error: function(e) {}
            });
        }

        function getLatestHargaMWP2() {
            swal({
                title: 'Loading harga_mwp...',
                allowOutsideClick: false
            });
            swal.showLoading();
            return $.ajax({
                url: `<?php echo site_url('HargaMWPController/getLatest3/') ?>`,
                'type': 'GET',
                data: {},
                success: function(data) {
                    swal.close();
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataHargaMWP2 = json['data'];
                    renderHargaMWP2(dataHargaMWP2);
                },
                error: function(e) {}
            });
        }

        function getStandarMutu() {
            swal({
                title: 'Loading standar_mutu...',
                allowOutsideClick: false
            });
            swal.showLoading();
            return $.ajax({
                url: `<?php echo site_url('HargaMWPController/getStandarMutu/') ?>`,
                'type': 'GET',
                data: {},
                success: function(data) {
                    swal.close();
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataStandarMutu = json['data'];
                    renderStandarMutu(dataStandarMutu);
                },
                error: function(e) {}
            });
        }


        function renderHargaMWP(data) {
            if (data == null || typeof data != "object") {
                console.log("HargaMWP::UNKNOWN DATA");
                return;
            }
            var i = 0;

            var renderData = [];

            renderData.push(["MWP1", "Rp " + dataHargaMWP['harga_mwp1_petani'] + ' || USD ' + dataHargaMWP['d_harga_mwp1_petani'], "Rp " + dataHargaMWP['harga_mwp1_fob'] + ' || USD ' + dataHargaMWP['d_harga_mwp1_fob']]);
            renderData.push(["MWP2", "Rp " + dataHargaMWP['harga_mwp2_petani'] + ' || USD ' + dataHargaMWP['d_harga_mwp2_petani'], "Rp" + dataHargaMWP['harga_mwp2_fob'] + ' || USD ' + dataHargaMWP['d_harga_mwp2_fob']]);
            renderData.push(["ASTA", "Rp " + dataHargaMWP['harga_asta_petani'] + ' || USD ' + dataHargaMWP['d_harga_asta_petani'], "Rp" + dataHargaMWP['harga_asta_fob'] + ' || USD ' + dataHargaMWP['d_harga_asta_fob']]);
            renderData.push(["ESA", "Rp " + dataHargaMWP['harga_esa_petani'] + ' || USD ' + dataHargaMWP['d_harga_esa_petani'], "Rp" + dataHargaMWP['harga_esa_fob'] + ' || USD ' + dataHargaMWP['d_harga_esa_fob']]);
            renderData.push(["IPC", "Rp " + dataHargaMWP['harga_ipc_petani'] + ' || USD ' + dataHargaMWP['d_harga_ipc_petani'], "Rp" + dataHargaMWP['harga_ipc_fob'] + ' || USD ' + dataHargaMWP['d_harga_ipc_fob']]);
            renderData.push(["SNI1", "Rp " + dataHargaMWP['harga_sni1_petani'] + ' || USD ' + dataHargaMWP['d_harga_sni1_petani'], "Rp" + dataHargaMWP['harga_sni1_fob'] + ' || USD ' + dataHargaMWP['d_harga_sni1_fob']]);
            renderData.push(["ISO", "Rp " + dataHargaMWP['harga_iso_petani'] + ' || USD ' + dataHargaMWP['d_harga_iso_petani'], "Rp" + dataHargaMWP['harga_iso_fob'] + ' || USD ' + dataHargaMWP['d_harga_iso_fob']]);
            HargaMWPTable.clear().rows.add(renderData).draw('full-hold');
        }

        function renderHargaMWP2(data) {
            if (data == null || typeof data != "object") {
                console.log("HargaMWP::UNKNOWN DATA");
                return;
            }
            var i = 0;
            // d = data
            var renderData = [];
            Object.values(data).forEach((d) => {
                renderData.push([d['tanggal_berlaku'],
                    'Rp ' + d['harga_mq_petani'],
                    'Rp ' + d['harga_sni1_petani'],
                    'Rp ' + d['harga_sni2_petani']
                ])
            });
            HargaMWPTable2.clear().rows.add(renderData).draw('full-hold');
        }


        function renderStandarMutu(data) {
            if (data == null || typeof data != "object") {
                console.log("HargaMWP::UNKNOWN DATA");
                return;
            }
            var i = 0;

            var renderData = [];
            renderData.push(["Cemaran Serangga (By count Maks)", data['1']['cemaran_serangga'], data['2']['cemaran_serangga'], data['3']['cemaran_serangga'], data['4']['cemaran_serangga'], data['5']['cemaran_serangga'], data['6']['cemaran_serangga'], data['7']['cemaran_serangga'], data['8']['cemaran_serangga']]);
            renderData.push(["Kerapatan (g/1)", data['1']['kerapatan'], data['2']['kerapatan'], data['3']['kerapatan'], data['4']['kerapatan'], data['5']['kerapatan'], data['6']['kerapatan'], data['7']['kerapatan'], data['8']['kerapatan']]);
            renderData.push(["Kadar Air (%)", data['1']['kadar_air'], data['2']['kadar_air'], data['3']['kadar_air'], data['4']['kadar_air'], data['5']['kadar_air'], data['6']['kadar_air'], data['7']['kadar_air'], data['8']['kadar_air']]);
            renderData.push(["Kadar Biji Enteng (%)", data['1']['kadar_biji_enteng'], data['2']['kadar_biji_enteng'], data['3']['kadar_biji_enteng'], data['4']['kadar_biji_enteng'], data['5']['kadar_biji_enteng'], data['6']['kadar_biji_enteng'], data['7']['kadar_biji_enteng'], data['8']['kadar_biji_enteng']]);
            renderData.push(["Kadar Benda Asing (%)", data['1']['kadar_benda_asing'], data['2']['kadar_benda_asing'], data['3']['kadar_benda_asing'], data['4']['kadar_benda_asing'], data['5']['kadar_benda_asing'], data['6']['kadar_benda_asing'], data['7']['kadar_benda_asing'], data['8']['kadar_benda_asing']]);
            renderData.push(["Kadar Cemaran Kapang (%)", data['1']['kadar_cemaran'], data['2']['kadar_cemaran'], data['3']['kadar_cemaran'], data['4']['kadar_cemaran'], data['5']['kadar_cemaran'], data['6']['kadar_cemaran'], data['7']['kadar_cemaran'], data['8']['kadar_cemaran']]);
            renderData.push(["Kadar Lada berwarna putih kehitaman (%)", data['1']['kadar_hitam_putih'], data['2']['kadar_hitam_putih'], data['3']['kadar_hitam_putih'], data['4']['kadar_hitam_putih'], data['5']['kadar_hitam_putih'], data['6']['kadar_hitam_putih'], data['7']['kadar_hitam_putih'], data['8']['kadar_hitam_putih']]);
            renderData.push(["E Colli (MPN/g)", data['1']['e_colli'], data['2']['e_colli'], data['3']['e_colli'], data['4']['e_colli'], data['5']['e_colli'], data['6']['e_colli'], data['7']['e_colli'], data['8']['e_colli']]);
            renderData.push(["Salmonella (Detection/25g)", data['1']['salmonella'], data['2']['salmonella'], data['3']['salmonella'], data['4']['salmonella'], data['5']['salmonella'], data['6']['salmonella'], data['7']['salmonella'], data['8']['salmonella']]);
            renderData.push(["Kadar Piperin (%)", data['1']['kadar_piperin'], data['2']['kadar_piperin'], data['3']['kadar_piperin'], data['4']['kadar_piperin'], data['5']['kadar_piperin'], data['6']['kadar_piperin'], data['7']['kadar_piperin'], data['8']['kadar_piperin']]);
            renderData.push(["Kadar Minyak Atsiri (%)", data['1']['kadar_minyak'], data['2']['kadar_minyak'], data['3']['kadar_minyak'], data['4']['kadar_minyak'], data['5']['kadar_minyak'], data['6']['kadar_minyak'], data['7']['kadar_minyak'], data['8']['kadar_minyak']]);

            // Object.values(data).forEach((d) => {
            //   renderData.push([d['nama_mutu'], d['cemaran_serangga'], d['kerapatan'], 
            //   d['kadar_air'], d['kadar_biji_enteng'], d['kadar_benda_asing'], 
            //   d['kadar_cemaran'], d['kadar_hitam_putih'], d['e_colli'], 
            //   d['salmonella'], d['kadar_piperin'], d['kadar_minyak'] ]);

            // });

            StandarMutuTable.clear().rows.add(renderData).draw('full-hold');
        }

        function getAllNews() {
            swal({
                title: 'Loading product...',
                allowOutsideClick: false
            });
            swal.showLoading();
            return $.ajax({
                url: `<?php echo site_url('NewsController/getAll/') ?>`,
                'type': 'GET',
                data: {
                    featured: true
                },
                success: function(data) {
                    swal.close();
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataNews = json['data'];
                    renderNews(dataNews);
                },
                error: function(e) {}
            });
        }

        function renderNews(data) {
            if (data == null || typeof data != "object") {
                console.log("Product::UNKNOWN DATA");
                return;
            }
            var i = 0;
            news_list.empty();
             // console.log(data);
            Object.values(data).forEach((news) => {
                if (i < 2) {
                    var panjang = news['berita_isi'];
                    // var p = panjang.substring(0, 1200);
                    var index_p = panjang.lastIndexOf("</p>", 1200);
                    p = panjang.substring(0, index_p);
                    news_list.append(`
        <div class="col-sm-12">
          <div class="ibox product-box">
          <div class="card">
            <div class="card-header" style="cursor:pointer" onclick="location.href='<?= site_url('newsx?id_news='); ?>${news['berita_id']}'">
              <h5>${news['berita_judul']}</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3 ibox-content">
                  <img src="<?= base_url('assets/img/news/') ?>${news['berita_image']}" class="img-fluid img-thumbnail" alt="...">
                </div>
                <div class="col-sm-9 ibox-content">
                  <p class="card-text">
                    ${p}
                  </p>
                </div>
              </div>
            </div>
          </div>
          </div>
          </div>
        
      `);
                    i++;
                }
            });
        }


        function getAllProduct() {
            swal({
                title: 'Loading product...',
                allowOutsideClick: false
            });
            swal.showLoading();
            return $.ajax({
                url: `<?php echo site_url('ProductController/getAll/') ?>`,
                'type': 'GET',
                data: {
                    featured: true
                },
                success: function(data) {
                    swal.close();
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataProduct = json['data'];
                    renderProduct(dataProduct);
                },
                error: function(e) {}
            });
        }

        function renderProduct(data) {
            if (data == null || typeof data != "object") {
                console.log("Product::UNKNOWN DATA");
                return;
            }
            product_list.empty();
            Object.values(data).forEach((product) => {
                product_list.append(`
                    <div class="col-sm-3">
                    <div class="ibox product-box" style="cursor:pointer" onclick="location.href='<?= site_url('product?id_product='); ?>${product['id_product']}'">
                        <div class="ibox-title">
                        <h5>${product['nama_product']}</h5>
                        </div>
                        <div>
                        <div class="ibox-content no-padding border-left-right">
                            <div class="product-item" style="background-image:url('<?= base_url('uploads/cover_product/') ?>${product['cover_product']}')"></div>
                        </div>
                        <div class="ibox-content profile-content">
                            <h4><strong>${product['nama_perusahaan']}</strong></h4>
                            <p>${product['deskripsi_product']}</p>
                        </div>
                        </div>
                    </div>
                    </div>
                `);
            });
        }


    });
</script> -->