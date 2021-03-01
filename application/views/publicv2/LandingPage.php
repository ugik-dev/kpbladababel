<!-- <div class="preloader" id="preloader"></div> -->

<?php


if (!empty($_COOKIE['lang_set']) && $_COOKIE['lang_set'] == 'en') {

    $this->load->view('publicv2/selection/banner');
    $this->load->view('publicv2/selection/calculate');
    $this->load->view('publicv2/selection/about');
    $this->load->view('publicv2/selection/news');
    // $this->load->view('publicv2/selection/tabmutu');
    $this->load->view('publicv2/selection/choose');
    $this->load->view('publicv2/selection/invest');
    $this->load->view('publicv2/selection/ourbignes');
    $this->load->view('publicv2/selection/affiliate');
    $this->load->view('publicv2/selection/referral');
    // $this->load->view('publicv2/selection/deposit');
    // $this->load->view('publicv2/selection/transaction');
    // $this->load->view('publicv2/selection/download');
    $this->load->view('publicv2/selection/testimonial');
    $this->load->view('publicv2/selection/question');
    $this->load->view('publicv2/selection/signup');
    $this->load->view('publicv2/selection/contact');
  
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