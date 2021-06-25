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
                harga_mwp['tanggal_berlaku'] + '</td><td>' + formatRupiah(harga_mwp['harga_mq_petani'], 'Rp. ') + '</td><td>' + formatRupiah(harga_mwp['harga_sni2_petani'], 'Rp. ') + '</td><td>' + formatRupiah(harga_mwp['harga_sni1_petani'], 'Rp. ') + '</td></tr>')

        })


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
                    // href="<?= site_url() . 'newsx?id_news=' ?>${news['berita_id']}" 
                    news_list.append(`
                     <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center" onclick='location.href="<?= site_url() . 'newsx?id_news=' ?>${news['berita_id']}"'>
                        <div class="section-title wow fadeInLeft" style="display: block !important" >
                             <h2 href="<?= site_url() . 'newsx?id_news=' ?>${news['berita_id']}" target="_blank"  class="title">${news['berita_judul']}</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="demo-single demo-single--height2">
                            <div class="thumb wow fadeInRight">
                                <img src="<?= base_url('assets/img/news/') ?>${news['berita_image']}" style="max-height:15rem" alt="demo-image">
                                <a href="<?= site_url() . 'newsx?id_news=' ?>${news['berita_id']}" target="_blank" class="view-btn">News View</a>
                            </div>
                            <h4 class="caption"></h4>
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
                         </div>
                    </div><!-- demo-single end -->
                    <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-center"  onclick='location.href="<?= site_url() . 'newsx?id_news=' ?>${news['berita_id']}"'>
                        <div class="section-title  wow fadeInRight"  style="display: block !important">
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