<?php include_once("initialize.php");

class Mailer extends PHPMailer {

    function __construct() {
        $this->host();
        $this->port();
        $this->SMTPAuth();
        $this->isSMTP();
        $this->username();
        $this->password();
        $this->fromName();
        $this->from();
        $this->isHTML();
        $this->charset();
        $this->wordWrap();
        $this->smtpOptions();
    }

    public function host() {
        global $mail;
        $mail->Host = "smtp.ipage.com";
        return $mail->Host;

    }

    public function port() {
        global $mail;
        $mail->Port = 587;
        return $mail->Port;

    }

    public function SMTPAuth() {
        global $mail;
        $mail->SMTPAuth = true;
        return $mail->SMTPAuth;

    }

    public function isSMTP() {
        global $mail;
        return $mail->isSMTP();        
    }

    public function username() {
        global $mail;
        $mail->Username = "testing@strategicdots.org";
        return $mail->Username;
    }

    public function password() {
        global $mail;
        $mail->Password = "T#706vK7Xn";
        return $mail->Password;
    }

    public function fromName() {
        global $mail;
        $mail->FromName = "eFuelPay";
        return $mail->FromName;
    }

    public function from() {
        global $mail;
        $mail->From = "admin@efuelpay.com";
        return $mail->From;
    }

    /*public function isHTML() {
        global $mail;
        return $mail->IsHTML(true);
    }*/

    public function charset() {
        global $mail;
        $mail->CharSet = "text/html; charset=UTF-8;";
        return $mail->CharSet;
    }

    public function wordWrap() {
        global $mail;
        $mail->WordWrap = 80;
        return $mail->WordWrap;
    }

    public function smtpOptions() {
        global $mail;

        $mail->SMTPOptions = [
            'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ]
        ];

        return $mail->SMTPOptions;
    }
}

$mailer = new Mailer();


