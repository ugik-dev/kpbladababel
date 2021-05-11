<!-- blog section begin -->

<section id="page-cont" class="">
    <div class="page-breadcrumb">
        <div class="container">
            <div class="breadcrumb-cont text-center">
                <h2><?= strtoupper($title) ?></h2>
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
                    <!--start blog single-->
                    <div class="blog-single">
                        <div class="post-media">
                        </div>
                        <div class="post-cont">
                            <h3><a href="blog-single.html">
                                    <?= $title ?>
                                </a></h3>
                            <?php $this->load->view('publicv2/page/' . $page) ?>
                            <div class="date-btn-area">
                                <div class="post-social-share">
                                    <ul>
                                        <li><span>SHARE:</span></li>
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=https://kpbladababel.com/index.php/about&t=About+KPB+LADA+BABEL"><i class="icofont-facebook"></i></a></li>
                                        <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                        <li><a href="#"><i class="icofont-google-plus"></i></a></li>
                                        <li><a href="#"><i class="icofont-pinterest"></i></a></li>
                                        <li><a href="#"><i class="icofont-vimeo"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-sidebar">
                        <?php $this->load->view('publicv2/widget/search');
                        //  $this->load->view('publicv2/widget/categori') 
                        //  $this->load->view('publicv2/widget/archives') 
                        $this->load->view('publicv2/widget/tags'); ?>

                        <!--end widget single-->
                        <!--start widget single-->
                        <!--end widget single-->
                        <!--start widget single-->
                        <!--end widget single-->
                    </div>
                </div>
                <!--end blog sidebar-->
            </div>
        </div>
    </div>
</section>
<!-- blog section end -->