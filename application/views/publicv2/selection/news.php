<section class="news-setcion" id="news-setcion">
    <div class="container">

        <div class="row mb-none-30">

            <!-- demo-single end -->
            <div class="col-lg-12 col-md-12 justify-content-center">
                <h2 class="invest-subtitle" style="    font-family: Raleway;    font-weight: 700;    font-size: 3.125rem;    text-transform: uppercase;    line-height: 1.4;    background: #880065;    background: linear-gradient(90deg, #880065, #d70021);    color: transparent;    -webkit-background-clip: text;    display: inline-block;    margin-bottom: 0.313rem;">News</h2>
                <div class="col-lg-12 text-center">
                    <div class="invest-text">
                        <!-- <h5 class="news-big-title">How You Can Invest Your</h5> -->
                        <!-- <p class="invest-title-describe">
                            It’s a simple way to start invest.You don’t need a deep wallet
                            to start behoof. Pick an amount you can afford, and build your
                            behoof over time.
                        </p> -->
                    </div>
                </div>
            </div>
            <?php
            $i = 0;
            foreach ($dataContent['news'] as $val) {
                if ($i % 2 == 0) {  ?>
                    <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                        <div class="section-title wow fadeInLeft">
                            <!-- <h4 class="subtitle">KPB Lada Babel Adakan Webinar Internasional dengan Tema “International Marketing Strategy of Muntok White Pepper Through Commodity Physical Market”</h4> -->
                            <h2 class="title"><?= $val['berita_judul'] ?></h2>
                        </div>
                    </div><!-- demo-single end -->
                    <div class="col-lg-6 col-md-6">
                        <div class="demo-single demo-single--height2">
                            <div class="thumb wow fadeInRight">
                                <img src="<?= base_url('assets/img/news/') . $val['berita_image'] ?>" style="max-height:300px" alt="demo-image">
                                <a href="<?= site_url() . 'newsx?id_news=' . $val['berita_id'] ?>" target="_blank" class="view-btn">News View</a>
                            </div>
                            <!-- <h4 class="caption"><a href="Reunir/index-animated-text.html">Home Animated Text</a></h4> -->
                        </div>
                    </div><!-- demo-single end -->
                <?php     } else {      ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="demo-single demo-single--height2  wow fadeInLeft">
                            <div class="thumb">
                                <img src="<?= base_url('assets/img/news/') . $val['berita_image'] ?>" style="max-height:300px" alt="demo-image">
                                <a href="<?= site_url() . 'newsx?id_news=' . $val['berita_id'] ?>" target="_blank" class="view-btn">News View</a>
                            </div>
                            <h4 class="caption"><a href="Reunir/index-video.html" target="_blank">Home Video</a></h4>
                        </div>
                    </div><!-- demo-single end -->
                    <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                        <div class="section-title  wow fadeInRight">
                            <h2 class="title"><?= $val['berita_judul'] ?></h2>
                        </div>
                    </div><!-- demo-single end -->


                <?php     }
                $i++; ?>



            <?php } ?>

        </div>
    </div>
</section>