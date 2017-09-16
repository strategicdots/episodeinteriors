<?php $thisPage = "subscribe"; ?>
<?php include_once("../includes/initialize.php"); ?>
<?php
   /* $ref_url = $_SERVER['HTTP_REFERER'];
    $refData = parse_url($ref_url);
    if ( strpos($refData['path'],'list-manage.com') === false ) 
    {
      redirect_to("../");
    }
    else
    {
      //Other
    }
*/
?>

<?php include_once("../layout/secondheader.php"); ?>
<div class="inner-main-section services">
    <!-- main section -->
    <h1 class="uppercase text-center m-light-top-breather headfont-bold">Episode Interiors Newsletter</h1>
    <img src="../img/jumbo_bg2.jpg" class="img-center m-mid-top-breather img-responsive">
    <hr class="mid-container  m-mid-top-breather">
    <div class="container m-mid-top-breather m-mid-bottom-breather">
        <div class="text-center mid-container sectn-bx">
           <h2 class="headfont capitalize brandtxt-color">You are almost ready.</h2>
            <p class="heavy-line-height heavy-font-size">An email has been sent to your mail to confirm your subscription.</p>
            <p class="heavy-line-height heavy-font-size">Please <span class="brandtxt-color uppercase">click on the link</span> provided in this email to confirm your subscription. Thanks</p>
        </div>
    </div>
</div>
<?php include_once("../layout/secondfooter.php"); ?>
