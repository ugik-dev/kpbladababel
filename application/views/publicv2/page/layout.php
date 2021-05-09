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
                    <!--end blog single-->
                    <!--start post comment wrap-->
                    <!-- <div class="post-comment-wrap">
                        <h3>Comments (3)</h3>
                        <div class="comment-single">
                            <div class="avatar">
                                <img src="img/table-img2.png" class="img-fluid" alt="">
                            </div>
                            <div class="comnt-text">
                                <div class="reply-icon">
                                    <a href="#">Reply <i class="icofont-reply-all"></i></a>
                                </div>
                                <div class="comnt-info">
                                    <h5>Angel Smith</h5>
                                    <p>November 20, 2018 at 8:31 pm</p>
                                </div>
                                <p>Maecenas at turpis ut lacus posuere dapibus. Fusce et sollicitudin libero, id vehicula sem. Morbi pharetra nisl eget neque commodo facilisis. Nunc malesuada dolor vitae feugiat fermentum.</p>
                            </div>
                        </div>
                        <div class="comment-single reply">
                            <div class="avatar">
                                <img src="img/table-img5.png" class="img-fluid" alt="">
                            </div>
                            <div class="comnt-text">
                                <div class="reply-icon">
                                    <a href="#">Reply <i class="icofont-reply-all"></i></a>
                                </div>
                                <div class="comnt-info">
                                    <h5>Stanley Mills</h5>
                                    <p>November 20, 2018 at 8:31 pm</p>
                                </div>
                                <p>Maecenas at turpis ut lacus posuere dapibus. Fusce et sollicitudin libero, id vehicula sem. Morbi pharetra nisl eget neque commodo facilisis. Nunc malesuada dolor vitae.</p>
                            </div>
                        </div>
                        <div class="comment-single">
                            <div class="avatar">
                                <img src="img/table-img1.png" class="img-fluid" alt="">
                            </div>
                            <div class="comnt-text">
                                <div class="reply-icon">
                                    <a href="#">Reply <i class="icofont-reply-all"></i></a>
                                </div>
                                <div class="comnt-info">
                                    <h5>Seth Palmer</h5>
                                    <p>November 20, 2018 at 8:31 pm</p>
                                </div>
                                <p>Maecenas at turpis ut lacus posuere dapibus. Fusce et sollicitudin libero, id vehicula sem. Morbi pharetra nisl eget neque commodo facilisis. Nunc malesuada dolor vitae feugiat fermentum.</p>
                            </div>
                        </div>
                        <div class="comment-form">
                            <h3>FeedBack</h3>
                            <form action="#" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email Address *">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="10" placeholder="Your Message"></textarea>
                                </div>
                                <button type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div> -->
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
                <!--end blog sidebar-->
            </div>
        </div>
    </div>
</section>
<!-- blog section end -->