<?php $thisPage = "admin"; 
?>
<?php include_once("../includes/initialize.php"); ?>
<?php if ($session->isLoggedIn()) { redirect_to("dashboard.php"); } 

include_once("../layout/secondheader.php"); ?>
<?php if(isset($_SESSION['post'])) { $post = ($_SESSION['post']); } ?>

<div class="sm-container dashboard inner-main-section admin">
    <h2 class="text-center txt-bold">Please Login</h2>
    <form action="../control/login.php" method="post" class="sm-container m-light-top-breather">
        <?php echo inline_message(); ?>
        <div class="form-group">
            <input type="text" name="email" class="form-control" value="<?php if(isset($post['email'])) { echo htmlentities($post['email']); }  else { echo ""; } ?>" placeholder="Email">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <input type="submit" name="submit" value="SUBMIT" class="btn main-btn-color form-control">
    </form>
</div>

<?php 
echo adminFooter(); 
include_once("../layout/secondfooter.php"); ?>