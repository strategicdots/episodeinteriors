<?php 
include_once("../includes/initialize.php");  
if (!$session->isLoggedIn()) { redirect_to("."); } 

$msgs = new CustomerMessages();
$readMsgs = $msgs->findAllRead();
if(!empty($readMsgs)) {
    $msgs->deleteAllReadMessages(); 
    $session->message("All read messages deleted");
    redirect_to("messages.php");
} else {
    $session->message("There are NO messages to be deleted");
    redirect_to("messages.php");
}