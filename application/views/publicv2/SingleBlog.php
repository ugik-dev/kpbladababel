<!-- blog section begin -->

<section id="page-cont" class="">
    <div class="page-breadcrumb">
        <div class="container">
            <div class="breadcrumb-cont text-center">
                <h2><?= $contentData['berita_judul'] ?></h2>
                <ul>
                    <li><a href="<?= base_url() ?>"><i class="icofont-home"></i> Home</a></li>
                    <!-- <li><small>></small></li> -->
                    <!-- <li>Blog Single</li> -->
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
                            <a href="blog-single.html"><img src="<?= base_url('assets/img/news/') . $contentData['berita_image'] ?>" class="img-fluid" alt=""></a>
                        </div>
                        <div class="post-cont">
                            <h3><a href="blog-single.html"><?= $contentData['berita_judul'] ?></a></h3>
                            <!-- <p> -->
                            <?= $contentData['berita_isi'] ?>
                            <!-- </p> -->
                            <div class="date-btn-area">
                                <a href="#">
                                    <i class="icofont-eye"></i>
                                    <span class="total-count"><?= $contentData['total_show'] ?></span>
                                </a>
                                <div class="post-social-share">
                                    <ul>
                                        <li><span>SHARE:</span></li>
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=https://kpbladababel.co.id/index.php/newsx?id_news=<?= $contentData['berita_id'] ?>&t=TITLE"><i class="icofont-facebook"></i></a></li>
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
                    <div class="post-comment-wrap">
                        <h3>Comments (<?php
                                        $count = 0;
                                        foreach ($contentData['comentar'] as $key => $value) {
                                            if ($value['st_show'] == '1') {
                                                $count++;
                                            }
                                        }
                                        echo $count;
                                        ?>)</h3>
                        <!--start comment single-->
                        <!--start comment single-->
                        <?php foreach ($contentData['comentar'] as $comentar) {

                            if (!empty($this->session->userdata()['nama_role']) && $this->session->userdata()['nama_role'] == 'admin') {
                                if ($comentar['st_show'] == 1) {
                        ?>
                                    <div class="comment-single">
                                        <div class="comnt-text">
                                            <?php
                                            echo '<div class="reply-icon">
                                            <a href="' . site_url('NewsController/hide_comentar?id=') . $comentar['id_komentar'] . '&id_news=' . $contentData['berita_id'] . '"> Hide <i class="icofont-eye"></i></a>
                                            </div>'; ?>
                                            <div class="comnt-info">
                                                <h5><?= $comentar['name'] ?></h5>
                                                <p><?= $comentar['date'] ?></p>
                                            </div>
                                            <p>
                                                <?= nl2br($comentar['komentar'], false) ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="comment-single" style="opacity: 0.9; background-color: #c4c2c2">
                                        <div class="comnt-text">
                                            <?php
                                            echo '<div class="reply-icon">
                                            <a href="' . site_url('NewsController/unhide_comentar?id=') . $comentar['id_komentar'] . '&id_news=' . $contentData['berita_id'] . '"> Un-Hide <i class="icofont-eye-blocked"></i></a>
                                            </div>'; ?>
                                            <div class="comnt-info">
                                                <h5><?= $comentar['name'] ?></h5>
                                                <p><?= $comentar['date'] ?></p>
                                            </div>
                                            <p>
                                                <?= nl2br($comentar['komentar'], false) ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                            <?php
                                // if (!empty($this->session->userdata()['nama_role'])) {


                                // }
                            } else {

                            ?>
                                <div class="comment-single">
                                    <div class="comnt-text">
                                        <div class="comnt-info">
                                            <h5><?= $comentar['name'] ?></h5>
                                            <p><?= $comentar['date'] ?></p>
                                        </div>
                                        <p>
                                            <?= nl2br($comentar['komentar'], false) ?>
                                        </p>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                        <!--end comment single-->
                        <!--start comment form-->
                        <div class="comment-form">
                            <h3>FeedBack</h3>
                            <form action="<?= base_url() ?>index.php/comentar" method="post">
                                <div class="form-group">
                                    <input type="hidden" name="id_news" value="<?= $contentData['berita_id'] ?>">
                                    <input type=" text" class="form-control" placeholder="Name" value="<?php if (!empty($this->session->flashdata('name'))) echo $this->session->flashdata('name'); ?>" name="name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email Address *" value="<?php if (!empty($this->session->flashdata('email'))) echo $this->session->flashdata('email'); ?>" name="email">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="10" placeholder="Your Message" name="komentar"><?php if (!empty($this->session->flashdata('komentar'))) echo $this->session->flashdata('komentar'); ?></textarea>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-3">
                                        <?= $contentData['captcha'] ?>
                                    </div>
                                    <div class=" form-group col-lg-6">
                                        <input type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php if (!empty($this->session->flashdata('msg'))) echo $this->session->flashdata('msg'); ?>
                                </div>
                                <button type="submit">SUBMIT</button>
                            </form>
                        </div>
                        <!--end comment form-->
                    </div>
                    <!--end post comment wrap-->
                </div>
                <!--start blog sidebar-->
                <div class="col-md-4">
                    <div class="blog-sidebar">
                        <?php $this->load->view('publicv2/widget/search');
                        // $this->load->view('publicv2/widget/categori');
                        // $this->load->view('publicv2/widget/archives');
                        $this->load->view('publicv2/widget/tags'); ?>
                    </div>
                </div>
                <!--end blog sidebar-->
            </div>
        </div>
    </div>
</section>
<!-- blog section end -->