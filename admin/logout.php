<?php require_once('../includes/initialize.php'); ?>
<?php if(!$session->isLoggedIn()) { redirect_to("."); }

$session->logout();
$session->message("You've been successfully logged out");
redirect_to('.');

?>
<?php if(isset($database)) { $database->close_connection(); } ?>