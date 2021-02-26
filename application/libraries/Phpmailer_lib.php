<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'path/to/PHPMailer/src/Exception.php';
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';

class PHPMailer_lib
{
    public function __construct(){
        log_message('Debug', 'Phpmailer is loaded.');
    }

    public function load(){
        require_once APPPATH.'third_party/PHPMailer/Exception.php';
        require_once APPPATH.'third_party/PHPMailer/PHPMailer.php';
        require_once APPPATH.'third_party/PHPMailer/SMTP.php'; 

        $mail = new PHPMailer;
        return $mail;
    }
}