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
           <h2 class="headfont capitalize brandtxt-color">Subscription confirmed.</h2>
            <p class="heavy-line-height heavy-font-size">Thanks for subscribing to our newsletter</p>
            <p class="heavy-line-height heavy-font-size">Please For any questions or suggestions, contact us on <a href="mailto:info@episodeinteriors.com">info@episodeinteriors.com</a></p>
        </div>
    </div>
</div>
<?php include_once("../layout/secondfooter.php"); ?>
