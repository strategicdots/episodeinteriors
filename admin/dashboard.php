<?php $thisPage = "admin"; ?>
<?php include_once("../includes/initialize.php"); ?>
<?php if (!$session->isLoggedIn()) { redirect_to("."); } 

include_once("../layout/secondheader.php"); ?>
<?php
$admin = Admin::findDetails($session->id);
echo adminTopHead(); echo adminSidebar(); echo adminMainbarTop();  
echo adminHeadline("welcome {$admin->name()}"); 
echo inline_message();
?>





<?php
echo adminFooter(); 
include_once("../layout/secondfooter.php"); ?>