<!-- <div class="preloader" id="preloader"></div> -->

<?php


if (!empty($_COOKIE['lang_set']) && $_COOKIE['lang_set'] == 'en') {

    $this->load->view('publicv2/selection/eng/banner');
    // $this->load->view('publicv2/selection/eng/calculate');
    $this->load->view('publicv2/selection/eng/transaction');
    $this->load->view('publicv2/selection/eng/download');
    $this->load->view('publicv2/selection/eng/about');
    $this->load->view('publicv2/selection/eng/news');
    // $this->load->view('publicv2/selection/eng/tabmutu');
    $this->load->view('publicv2/selection/eng/choose');
    $this->load->view('publicv2/selection/eng/invest');
    $this->load->view('publicv2/selection/eng/ourbignes');
    $this->load->view('publicv2/selection/eng/affiliate');
    $this->load->view('publicv2/selection/eng/referral');
    // $this->load->view('publicv2/selection/eng/deposit');
    $this->load->view('publicv2/selection/eng/testimonial');
    $this->load->view('publicv2/selection/eng/question');
    $this->load->view('publicv2/selection/eng/signup');
    $this->load->view('publicv2/selection/eng/contact');
} else {

    $this->load->view('publicv2/selection/indo/banner');
    $this->load->view('publicv2/selection/indo/about');
    // $this->load->view('publicv2/selection/indo/calculate');
    $this->load->view('publicv2/selection/indo/news');
    $this->load->view('publicv2/selection/indo/download');
    $this->load->view('publicv2/selection/indo/transaction'); //HARGA LADA
    // $this->load->view('publicv2/selection/indo/tabmutu');
    $this->load->view('publicv2/selection/indo/choose');
    $this->load->view('publicv2/selection/indo/invest');
    $this->load->view('publicv2/selection/indo/ourbignes');
    $this->load->view('publicv2/selection/indo/affiliate');
    $this->load->view('publicv2/selection/indo/referral');
    // $this->load->view('publicv2/selection/indo/deposit');
    $this->load->view('publicv2/selection/indo/testimonial');
    $this->load->view('publicv2/selection/indo/question');
    $this->load->view('publicv2/selection/indo/signup');
    $this->load->view('publicv2/selection/indo/contact');
}
?>

<script>
    function formatRupiah(angka, prefix) {
        var number_string = angka.toString();
        // split = [];
        // split[0] = number_string.slice(0, -2);
        // split[1] = number_string.slice(-2);

        sisa = number_string.length % 3;
        (rupiah = number_string.substr(0, sisa)),
        (ribuan = number_string.substr(sisa).match(/\d{3}/gi));

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        // rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }

    var HargaMWPTable = $('#HargaMWPTable');

    getTabelHarga();

    function getTabelHarga() {
        return $.ajax({
            url: `<?php echo site_url('HargaMWPController/getLatestPrice/') ?>`,
            'type': 'GET',
            data: {
                limit: 10
            },
            success: function(data) {
                // swal.close();
                var json = JSON.parse(data);
                if (json['error']) {
                    return;
                }
                data = json['data'];
                renderTabelPrice(data);
            },
            error: function(e) {}
        });
    }

    function renderTabelPrice(data) {
        if (data == null || typeof data != "object") {
            console.log("HargaMWP::UNKNOWN DATA");
            return;
        }
        var i = 0;

        var renderData = [];
        Object.values(data).forEach((harga_mwp) => {
            HargaMWPTable.append('<tr> <td>' +
                harga_mwp['tanggal_berlaku'] + '</td><td>' + formatRupiah(harga_mwp['harga_mq_petani'], 'Rp. ') + '</td><td>' + formatRupiah(harga_mwp['harga_sni1_petani'], 'Rp. ') + '</td><td>' + formatRupiah(harga_mwp['harga_sni2_petani'], 'Rp. ') + '</td></tr>')

        })

        // HargaMWPTable.clear().rows.add(renderData).draw('full-hold');

    }
</script>
<script>
    $(document).ready(function() {



        var month = new Array();
        month[0] = "Jan";
        month[1] = "Feb";
        month[2] = "Mar";
        month[3] = "Apr";
        month[4] = "May";
        month[5] = "Jun";
        month[6] = "Jul";
        month[7] = "Ags";
        month[8] = "Sep";
        month[9] = "Oct";
        month[10] = "Nov";
        month[11] = "Dec";

        getLatestHargaMWP();

        function getLatestHargaMWP() {
            return $.ajax({
                url: `<?php echo site_url('HargaMWPController/getLatestPrice/') ?>`,
                'type': 'GET',
                data: {
                    limit: 5
                },
                success: function(data) {
                    // swal.close();
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataHargaMWP = json['data'];
                    renderChart(dataHargaMWP);
                },
                error: function(e) {}
            });
        }



        function renderChart(data) {
            i = 0;
            lab = [];
            mq = [];
            sni1 = [];
            sni2 = [];
            Object.values(data).forEach((dx) => {
                var d = new Date(dx['tanggal_berlaku']);
                var n = month[d.getMonth()];
                var day = d.getDay();
                var y = d.getFullYear().toString().substr(-2)

                lab[i] = day + ' ' + n + ' ' + y,
                    mq[i] = dx['harga_mq_petani']
                sni1[i] = dx['harga_sni1_petani']
                sni2[i] = dx['harga_sni2_petani']
                if (i == 0) {
                    document.getElementById("banner_sni1").innerHTML = dx['harga_sni1_petani'];
                    document.getElementById("banner_sni2").innerHTML = dx['harga_sni2_petani'];
                    document.getElementById("banner_mq").innerHTML = dx['harga_mq_petani'];
                    document.getElementById("banner_mq_none").innerHTML = dx['harga_mq_petani'];
                }
                i++
            });
            // console.log(mq)

            var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            var config = {
                type: 'line',
                data: {
                    labels: lab,
                    datasets: [{
                        label: 'MQ',
                        backgroundColor: window.chartColors.red,
                        borderColor: window.chartColors.red,
                        data: mq,
                        fill: false,
                    }, {
                        label: 'SNI 2',
                        fill: false,
                        backgroundColor: window.chartColors.blue,
                        borderColor: window.chartColors.blue,
                        data: sni2,
                    }, {
                        label: 'SNI 1',
                        fill: false,
                        backgroundColor: window.chartColors.green,
                        borderColor: window.chartColors.green,
                        data: sni1,
                    }]
                },
                options: {
                    responsive: true,

                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: false,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Rupiah'
                            }
                        }]
                    }
                }
            };

            var ctx = document.getElementById('canvas').getContext('2d');
            window.myLine = new Chart(ctx, config);
            // };

            // callmainme();

        }




        // function getStandarMutu() {
        //     swal({
        //         title: 'Loading standar_mutu...',
        //         allowOutsideClick: false
        //     });
        //     swal.showLoading();
        //     return $.ajax({
        //         url: `<?php echo site_url('HargaMWPController/getStandarMutu/') ?>`,
        //         'type': 'GET',
        //         data: {},
        //         success: function(data) {
        //             swal.close();
        //             var json = JSON.parse(data);
        //             if (json['error']) {
        //                 return;
        //             }
        //             dataStandarMutu = json['data'];
        //             renderStandarMutu(dataStandarMutu);
        //         },
        //         error: function(e) {}
        //     });
        // }


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
        getAllNews();

        function getAllNews() {
            return $.ajax({
                url: `<?php echo site_url('NewsController/getAll/') ?>`,
                'type': 'GET',
                data: {
                    // featured: true
                    'last': '1',
                },
                success: function(data) {
                    // swal.close();
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
            news_list = $('#news_canvas')
            news_list.empty();
            // console.log(data);
            Object.values(data).forEach((news) => {
                if (i % 2 == 0) {
                    news_list.append(`
                    <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                        <div class="section-title wow fadeInLeft">
                            <!-- <h4 class="subtitle">KPB Lada Babel Adakan Webinar Internasional dengan Tema “International Marketing Strategy of Muntok White Pepper Through Commodity Physical Market”</h4> -->
                            <h2 class="title">${news['berita_judul']}</h2>
                        </div>
                    </div><!-- demo-single end -->
                    <div class="col-lg-6 col-md-6">
                        <div class="demo-single demo-single--height2">
                            <div class="thumb wow fadeInRight">
                                <img src="<?= base_url('assets/img/news/') ?>${news['berita_image']}" style="max-height:15rem" alt="demo-image">
                                <a href="<?= site_url() . 'newsx?id_news=' ?>${news['berita_id']}" target="_blank" class="view-btn">News View</a>
                            </div>
                            <!-- <h4 class="caption"><a href="Reunir/index-animated-text.html">Home Animated Text</a></h4> -->
                        </div>
                    </div>  
                    `);
                } else {
                    news_list.append(`
                    <div class="col-lg-6 col-md-6">
                        <div class="demo-single demo-single--height2  wow fadeInLeft">
                            <div class="thumb">
                            <img src="<?= base_url('assets/img/news/') ?>${news['berita_image']}" style="max-height:15rem" alt="demo-image">
                                <a href="<?= site_url() . 'newsx?id_news=' ?>${news['berita_id']}" target="_blank" class="view-btn">News View</a>
                            </div>
                            <!-- <h4 class="caption"><a href="Reunir/index-video.html" target="_blank">Home Video</a></h4> -->
                        </div>
                    </div><!-- demo-single end -->
                    <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                        <div class="section-title  wow fadeInRight">
                            <h2 class="title">${news['berita_judul']}</h2>
                        </div>
                    </div><!-- demo-single end -->
                    `);
                }

                i++;
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
</script>