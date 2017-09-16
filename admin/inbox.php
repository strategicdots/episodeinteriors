<?php $thisPage = "admin"; ?>
<?php include_once("../includes/initialize.php"); ?>
<?php if (!$session->isLoggedIn()) { redirect_to("."); } 

include_once("../layout/secondheader.php"); ?>
<?php
$admin = Admin::findDetails($session->id);
$custMsgs = new CustomerMessages();
echo adminTopHead(); echo adminSidebar(); echo adminMainbarTop();  
?>
<style>
    ul.read-msg li {
        background-color: #f4f4f4;
        margin-bottom: 10px;
    }
    ul.read-msg li:nth-of-type(odd) {
        background-color: #d4d4d4;
    }
    ul.read-msg li a {
        padding: 10px;
        padding-left: 10px;
        padding-left: 15px;
        width: 100%;
        display: inline-block;
    }
    ul.read-msg li a:hover {
        text-decoration: none;
    }
    ul.read-msg li a .sn {
        padding-right: 20px;
    }
    ul.read-msg li a .content, 
    ul.read-msg li a .phone,
    ul.read-msg li a .email,
    ul.read-msg li a .time {
        display: inline-block;
    }
    ul.read-msg li a .content, 
    ul.read-msg li a .email{
        width: 30%;
    }
    ul.read-msg li a .phone, 
    ul.read-msg li a .time {
        width: 15%;
    }
</style>
<?php if(isset($_GET['status']) && $_GET['status'] != ""): ?>
<!-- Unread Messages -->
<?php if($_GET['status'] == 0) :
echo adminHeadline("unread messages");
echo inline_message();
$unreadMsgs = $custMsgs->findAllUnread();
if($unreadMsgs): 
$sn = 0;
?>
<ul class="headfont read-msg no-list-style no-left-padding">
    <?php foreach($unreadMsgs as $msg):
    $time = mailTimeFormat($msg->timeSent);
    $sn++; ?>
    <li class="">
        <a href="?msg=<?php echo $msg->id; ?>">
            <span class="sn"><?php echo $sn; ?></span>
            <span class="time"><?php echo $time; ?></span>
            <span class="email"><?php echo htmlentities($msg->email); ?></span>
            <span class="phone"><?php echo htmlentities($msg->phoneNumber);?></span>
            <span class="content"><?php echo htmlentities(substr($msg->content, 0, 20)) . "...";?></span>
        </a>
    </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<!-- Read Messages -->
<?php elseif($_GET['status'] == 1) : ?>
<?php echo adminHeadline("read messages"); 
echo inline_message();
$readMsgs = $custMsgs->findAllRead();
if($readMsgs): 
$sn = 0;
?>
<ul class="headfont no-list-style no-left-padding">
    <?php foreach($readMsgs as $msg): 
    $sn++; ?>
    <li>
        <a href="?msg=<?php echo $msg->id; ?>">
            <span class=""><?php echo $sn; ?></span>
            <span class=""><?php echo htmlentities($msg->email); ?></span>
            <span class=""><?php echo htmlentities($msg->phoneNumber);?></span>
            <span class=""><?php echo htmlentities(substr($msg->content, 0, 30)) . "...";?></span>
        </a>
    </li>
    <?php endforeach; ?>
</ul>
<?php endif; endif; ?>

<!-- message contents -->
<?php elseif(isset($_GET['msg']) && $_GET['msg'] != ""): 
$msgID = $_GET['msg']; 
$msg = CustomerMessages::findDetails($msgID);
echo adminHeadline("message from " . htmlentities($msg->customerName) . " sent on " . mailTimeFormat($msg->timeSent)); 
?>
<div class="m-mid-top-breather">
    <?php 
    echo messageDisplay("Name", $msg->customerName); 
    echo messageDisplay("customer email", $msg->email); 
    echo messageDisplay("customer phone no.", $msg->phoneNumber); 
    echo messageDisplay("Product requested ID", $msg->productItem); 
    echo messageDisplay("Message", $msg->content);
    ?>
</div>
<?php $msg->markMessageRead($msg->id); ?>
<div class="m-heavy-top-breather">
    <a href="messages.php?status=0">&laquo; Return to Inbox</a>
</div>

<?php endif; ?>

<?php 
echo adminFooter(); 
include_once("../layout/secondfooter.php"); ?>