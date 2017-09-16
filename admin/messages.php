<?php $thisPage = "admin"; ?>
<?php include_once("../includes/initialize.php"); ?>
<?php if (!$session->isLoggedIn()) { redirect_to("."); } 

include_once("../layout/secondheader.php"); ?>
<?php
$admin = Admin::findDetails($session->id);
$custMsgs = new CustomerMessages();
echo adminTopHead(); echo adminSidebar(); echo adminMainbarTop();  
?>

<?php echo adminHeadline("customer messages");
echo inline_message();
if($custMsgs->countAllUnread()) {
    $_SESSION['unread_count'] = $custMsgs->countAllUnread();
    $unreadCount  = " <span style=\"color: #ff0000\">&#40;";
    $unreadCount .= $custMsgs->countAllUnread();
    $unreadCount .= "&#41;</span>";
} else {
    $unreadCount = "";
}
?>
<ul class="no-list-style capitalize no-left-padding">
    <li><a href="inbox.php?status=0">Unread messages <?php echo $unreadCount; ?></a></li>
    <li><a href="inbox.php?status=1">read messages </a></li>
    <li><a href="delete_messages.php">clear all real messages </a></li>
</ul>

<?php 
echo adminFooter(); 
include_once("../layout/secondfooter.php"); ?>