<footer class="p-heavy-top-breather p-heavy-bottom-breather">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 epsd">
                <a href="." class="block m-vlight-bottom-breather"><img src="img/logo.png"></a>
                <?php echo officeAddress(); ?>
            </div>
            <div class="col-sm-3 m-mid-top-breather">
                <?php 
                echo socialLinks();
                echo socialLinksMobile();
                ?>
            </div>
            <div class="col-sm-3 m-mid-top-breather">
                <?php echo displayFooterCategories(); ?>
            </div>
            <div class="col-sm-3 m-mid-top-breather">
                <?php echo footerPages(); ?>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<?php 
if($thisPage == "home") {
    echo "<script type=\"text/javascript\" src=\"js/owl.carousel.min.js\"></script>";
} elseif($thisPage == "gallery") {
    $output = "<script type=\"text/javascript\" src=\"js/lightbox.min.js\"></script>";
    echo $output;
}
?>
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>