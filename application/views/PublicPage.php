<?php
// $this->load->view('public/HeaderFragment');
// $this->load->view('public/LandingPage');
// $this->load->view('public/FooterFragment');


$this->load->view('publicv2/HeaderFragment');
$this->load->view('publicv2/Navbar');
$this->load->view($content);
$this->load->view('publicv2/FooterFragment');
