<section class="banner-section">
    <div class="overlay ripple-container" style="background-image: url(<?= base_url('assets/img/bg-lada7.jpg') ?>)">
        <div class="container">
            <div class="total-slide">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <div class="banner-text">
                            <!-- <h1 class="font-light">Take Your</h1> -->
                            <h1 class="font-bold">KPB LADA BABEL</h1>
                            <h1 class="font-regular">to the next level</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3 class="banner-bottom-text">
                            Kami membantu mendistribusikan ekspor lada ke seluruh dunia.

                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="get-start">
                            <a href="<?= site_url('create_account') ?>">BERGABUNG DENGAN KAMI</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="statics-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-6 text-center">
                        <div class="single-statics no-border">
                            <div class="icon-box">
                                <i class="ren-reguser"></i>
                            </div>
                            <div class="text-box">
                                <span style="font-size:2rem; color:white ; font-weight:bold ">Rp. </span>
                                <span class="d-none counter" id="banner_mq_none"></span>
                                <span class="counter" id="banner_mq"> <?= $dataContent['pricing_last']['harga_mq_petani'] ?></span>
                                <h4>Mixed Quality</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 text-center">
                        <div class="single-statics">
                            <div class="icon-box">
                                <i class="ren-withdraw"></i>
                            </div>
                            <div class="text-box">
                                <span style="font-size:2rem; color:white ; font-weight:bold ">Rp. </span>

                                <span class="counter" id="banner_sni1"> <?= $dataContent['pricing_last']['harga_sni1_petani'] ?></span>
                                <h4>SNI 1</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 text-center">
                        <div class="single-statics">
                            <div class="icon-box">
                                <i class="ren-people"></i>
                            </div>
                            <div class="text-box">
                                <span style="font-size:2rem; color:white ; font-weight:bold ">Rp. </span>
                                <span class="counter" id="banner_sni2"> <?= $dataContent['pricing_last']['harga_sni2_petani'] ?></span>
                                <h4>SNI 2</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>