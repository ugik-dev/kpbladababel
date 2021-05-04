<!-- transaction section begin -->
<section class="transaction-section">
    <!-- <div class="right-img">
        <img class="right-ellipse1" src="<?= base_url('assets/assets_v2/') ?>img/transaction-bg-ellipse-01.png" alt="#" />
        <img class="right-shape1" src="<?= base_url('assets/assets_v2/') ?>img/transaction-bg-shape-01.png" alt="#" />
        <img class="right-shape2" src="<?= base_url('assets/assets_v2/') ?>img/transaction-bg-shape-01.png" alt="#" />
        <img class="right-ellipse2" src="<?= base_url('assets/assets_v2/') ?>img/transaction-bg-ellipse-02.png" alt="#" />
    </div>
    <div class="left-img">
        <img class="left-ellipse1" src="<?= base_url('assets/assets_v2/') ?>img/transaction-bg-ellipse-03.png" alt="#" />
        <img class="left-ellipse2" src="<?= base_url('assets/assets_v2/') ?>img/transaction-bg-ellipse-03.png" alt="#" />
        <img class="left-ellipse3" src="<?= base_url('assets/assets_v2/') ?>img/transaction-bg-ellipse-03.png" alt="#" />
        <img class="left-shape1" src="<?= base_url('assets/assets_v2/') ?>img/transaction-bg-shape-01.png" alt="#" />
        <img class="left-shape2" src="<?= base_url('assets/assets_v2/') ?>img/transaction-bg-shape-01.png" alt="#" />
        <img class="left-shape3" src="<?= base_url('assets/assets_v2/') ?>img/transaction-bg-shape-01.png" alt="#" />
        <img class="left-shape4" src="<?= base_url('assets/assets_v2/') ?>img/transaction-bg-shape-01.png" alt="#" />
    </div> -->
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="transaction-text text-center">
                    <h5 class="transaction-title">Statistik Harga</h5>
                    <h2 class="transaction-subtitle">Statistik Terakhir</h2>
                    <p class="transaction-title-describe">
                        Analisa pergerakan harga Lada Mu setiap harinya. </p>
                </div>
            </div>
        </div>
        <!-- <div class="row d-flex justify-content-center">
            <div class="col-lg-7 col-md-11">
                <ul class="nav nav-pills mb-3 justify-content-center transaction-bnt-outline" id="transaction-pills-tab" role="tablist">
                    <li class="nav-item transaction-nav-item">
                        <a class="nav-link transaction-nav-link active" id="transaction-pills-deposits-tab" data-toggle="pill" href="#pills-deposits" role="tab" aria-controls="pills-deposits" aria-selected="true">
                            <span class="d-flex align-items-center"><i class="ren-deposits d-flex align-items-center"></i>LAST<br />DEPOSITS</span>
                        </a>
                    </li>
                    <li class="nav-item transaction-nav-item">
                        <a class="nav-link transaction-nav-link" id="transaction-pills-withdrawal-tab" data-toggle="pill" href="#pills-withdrawals" role="tab" aria-controls="pills-withdrawal" aria-selected="false">
                            <span class="d-flex align-items-center"><i class="ren-investo d-flex align-items-center"></i>TOP<br />WITHDRAWALS</span>
                        </a>
                    </li>
                    <li class="nav-item transaction-nav-item">
                        <a class="nav-link transaction-nav-link" id="transaction-pills-investing-tab" data-toggle="pill" href="#pills-invest" role="tab" aria-controls="pills-invest" aria-selected="false">
                            <span class="d-flex align-items-center"><i class="ren-people3 d-flex align-items-center"></i>LAST<br />INVESTORS</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div> -->

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-responsive transaction-table">
                    <thead>
                        <tr>
                            <th style="width : 30%">Tanggal</th>
                            <th style="width : 30%">Mixed Quality</th>
                            <th style="width : 300px">SNI 1</th>
                            <th style="width : 300px">SNI 2</th>
                        </tr>
                    </thead>
                    <tbody id="HargaMWPTable">
                    </tbody>
                </table>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-lg-12 text-center">
                <div class="part-cart">
                    <a href="#">Browse More</a>
                </div>
            </div>
        </div> -->
    </div>
</section>
<!-- transaction section end -->