<?php $seperator = "../"; ?>
<footer class="m-heavy-top-breather p-heavy-top-breather p-heavy-bottom-breather">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 epsd">
                <a href="../" class="block m-vlight-bottom-breather"><img src="../img/logo.png"></a>
                <?php echo officeAddress(); ?>
            </div>
            <div class="col-sm-3 m-mid-top-breather">
                <?php 
                echo socialLinks();
                echo socialLinksMobile();
                ?>            </div>
            <div class="col-sm-3 m-mid-top-breather">

                <?php echo displayFooterCategories($seperator); ?>
            </div>
            <div class="col-sm-3 m-mid-top-breather">
                <?php echo footerPages($seperator); ?>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<?php 
if($thisPage == "home") {
    echo "<script type=\"text/javascript\" src=\"js/owl.carousel.min.js\"></script>";
} elseif($thisPage == "gallery") {
    // $output = "<script type=\"text/javascript\" src=\"../js/lightbox.min.js\"></script>";
    $output = "<script type=\"text/javascript\" src=\"../js/prettyPhoto.js\"></script> \n";
    
    $output .= " <script type=\"text/javascript\" charset=\"utf-8\">
               $(document).ready(function(){
                 $(\"a[rel^='prettyPhoto']\").prettyPhoto();
               });
             </script>";
    
    echo $output;
}
?>
</body>
</html>