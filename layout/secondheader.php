<?php $seperator = "../"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo pageTitle($thisPage); ?> </title>
        <meta name="viewport" content="width=device-width">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="description" content="<?php // echo metaDesc(); ?>">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/master.css">
        <?php 
        if($thisPage == "home") {
            echo "<link rel=\"stylesheet\" href=\"../css/owl.carousel.css\">";
        } elseif($thisPage == "gallery") {
            // echo "<link rel=\"stylesheet\" href=\"../css/lightbox.min.css\">";
            echo "<link rel=\"stylesheet\" href=\"../css/prettyPhoto.css\">";
        }
        ?> 
        <link rel="stylesheet" href="../fonts/fonts.css">        
    </head>
    <body class="">
        <!-- NAVBAR  -->
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="../" class="logo block"><img src="../img/logo.png" alt="Episode Interiors"></a>
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li> <a href="../" <?php if($thisPage == "home") {
    echo currentPage(); } ?>> home </a> </li>
                        <li> <a href="../about-us/" <?php if($thisPage == "about-us") {
    echo currentPage(); } ?>> about</a> </li>
                        <li> <a href="../gallery" <?php if ($thisPage == "gallery") {
    echo currentPage(); } ?>> gallery </a> </li>
                        <li> <a href="../products/" <?php if($thisPage == "products") {
    echo currentPage(); } ?>> products </a> </li>
                        <!--<li class="dropdown">
<a href="../services/" <?php if($thisPage == "services") { echo currentPage(); } ?> class="dropdown-toggle" data-toggle="dropdown">Services <b class="caret"></b></a>
<ul class="dropdown-menu">
<li>
<a href="../services/consultancy/">consultancy</a>
</li>
<li>
<a href="../services/3d-design/">3d designs and space planning</a>
</li>
<li>
<a href="../services/curtain-and-fabrics/">curtain accessories &amp; fabrics</a>
</li>
<li>
<a href="../services/trimmings-and-accessories/">poles, trimmings &amp; accessories</a>
</li>
<li>
<a href="../services/lighting/">lighting</a>
</li>
<li>
<a href="../services/floor-wall-covering/">floor / wall coverings</a>
</li>
<li>
<a href="../services/home-accents/">home accents</a>
</li>
<li>
<a href="../services/furnishing/">furnishing</a>
</li>
</ul>
</li>-->
                        <li> <a href="../services/" <?php if($thisPage == "services") {
    echo currentPage(); } ?>> services </a> </li>
                        <li> <a href="" <?php if($thisPage == "blog") {
    echo currentPage(); } ?>> blog </a> </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- SUBSCRIBE FORM MODAL -->
        <?php echo subscribeForm($seperator); ?>