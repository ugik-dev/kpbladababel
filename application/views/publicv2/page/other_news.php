<!-- blog section begin -->

<section id="page-cont" class="">
    <div class="page-breadcrumb">
        <div class="container">
            <div class="breadcrumb-cont text-center">
                <h2>Berita</h2>
                <ul>
                    <li><a href="<?= base_url() ?>"><i class="icofont-home"></i> Home</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="blog-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php
                    foreach ($dataContent['collect'] as $berita) {
                    ?>
                        <!--start blog single-->
                        <div class="blog-single">
                            <div class="post-media">
                                <a href="<?= site_url() . 'newsx?id_news=' . $berita['berita_id'] ?>"><img src="<?= base_url() . 'assets/img/news/' . $berita['berita_image'] ?>" class="img-fluid" alt=""></a>
                            </div>
                            <div class="post-cont">
                                <h3><a href="<?= site_url() . 'newsx?id_news=' . $berita['berita_id'] ?>"><?= $berita['berita_judul'] ?></a></h3>
                                <p><?= strip_tags($berita['berita_isi']) ?> .. </p>
                                <div class="date-btn-area">
                                    <h6><a href="<?= site_url() . 'newsx?id_news=' . $berita['berita_id'] ?>"><i class="icofont-calendar"></i> <?= $berita['berita_tanggal'] ?></a><a href="#"></h6>
                                    <a class="more-btn" href="<?= site_url() . 'newsx?id_news=' . $berita['berita_id'] ?>">Read More</a>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>

                <div class="col-md-4">
                    <div class="blog-sidebar">
                        <?php $this->load->view('publicv2/widget/search') ?>
                        <?php $this->load->view('publicv2/widget/categori') ?>
                        <?php $this->load->view('publicv2/widget/archives') ?>
                        <?php $this->load->view('publicv2/widget/tags') ?>

                        <!--end widget single-->
                        <!--start widget single-->
                        <!--end widget single-->
                        <!--start widget single-->
                        <!--end widget single-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-pagination text-center">
                        <div class="pagination-border"></div>
                        <ul>
                            <?php
                            if (!empty($dataContent['key'])) {
                                $url_s = site_url('search?key=') . $dataContent['key'] . '&page=';
                            } else {
                                $url_s = site_url('search?page=');
                            }
                            if ($dataContent['select_pager'] > 1) {
                            ?>
                                <li><a href="<?= $url_s . ($dataContent['select_pager'] - 1) ?>"><i class="icofont-simple-left"></i></a></li>
                            <?php } ?>
                            <?php
                            $dataContent['count_pagger'] = $dataContent['count_pagger'] % 4;
                            for ($i = 1; $i <= $dataContent['count_pagger']; $i++) {
                            ?>
                                <li><a class="<?php if ($dataContent['select_pager'] == $i) echo 'active' ?>" href="<?= $url_s . $i ?>"><?= $i ?></a></li>
                            <?php
                            }
                            ?>
                            <?php if ($dataContent['select_pager'] < $dataContent['count_pagger']) {
                            ?>
                                <li><a href="<?= $url_s . ($dataContent['select_pager'] + 1) ?>"><i class="icofont-simple-right"></i></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog section end -->