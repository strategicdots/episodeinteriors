<?php $thisPage = "home"; ?>
<?php 
include_once("includes/initialize.php"); 
$categories = ProductCategories::findAll();
?>
<?php include_once("layout/firstheader.php"); ?>

<!-- JUMBOTRON -->
<div class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <div class="item active">
        </div>
        <div class="item">
        </div>
        <div class="item">
        </div>
        <div class="item">
        </div>
        <div class="item">
        </div>
        <div class="item">
        </div>
    </div>
</div>
<div class="home-jumbo margin-auto">
    <div class="container">
        <h1>Episode Interiors</h1>
        <div class="text-center sm-container m-light-top-breather">
            <p class="lead">Episode Interiors is a one stop store for exotic furniture pieces and breathtaking interior design themes.</p>
            <a href="products/" class="btn main-btn-color">check product items</a>
            <a href="gallery/" class="btn sec-btn">check our gallery</a>
        </div>
    </div>
</div>
<!-- SIGNUP FORM -->
<div class="signup p-mid-top-breather p-mid-bottom-breather" id="signup">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p class="" style="margin-top: 10px;">Sign up for our newsletter to get the best of interior decoration</p>
            </div>
            <div class="col-sm-6">
                <form class="form-inline" method="post" action="//strategicdots.us14.list-manage.com/subscribe/post?u=512cdde05864668bf643d9b96&amp;id=ebd16c7740" name="mc-embedded-subscribe-form">
                    <div class="form-group text">
                        <input type="email" name="EMAIL" placeholder="Enter your email" required> 
                    </div>
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_512cdde05864668bf643d9b96_ebd16c7740" tabindex="-1" value=""></div>
                    <input class="btn main-btn-color" type="submit" value="Submit" name="subscribe">
                    <div class="form-group">
                        <img class="remove-btn block  text-center" src="img/close-icon.png">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- FORM MODAL -->
<div class="modal fade" id="formModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title uppercase text-center"> Subscribe to Our Newsletter</h2>
            </div>
            <div class="modal-body">
                <img src="img/jumbo_bg.jpg" class="img-responsive m-light-bottom-breather">
                <div class="mid-container p-light-top-breather">
                    <p class="heavy-font-size headfont capitalize text-center">signup today to receive our home furnishing picks and news</p>
                    <form class="" method="post" action="//strategicdots.us14.list-manage.com/subscribe/post?u=512cdde05864668bf643d9b96&amp;id=ebd16c7740" name="mc-embedded-subscribe-form">
                        <div class="form-group">
                            <input type="email" class="form-control" name="EMAIL" placeholder="Enter your email" required> 
                        </div>
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_512cdde05864668bf643d9b96_ebd16c7740" tabindex="-1" value=""></div>
                        <div class="form-group">
                            <input class="btn main-btn-color form-control" type="submit" value="Submit" name="subscribe">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- IMAGE PREVIEW MODAL -->
<div id="imgModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <img class="showimage img-responsive" src="" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn main-btn-color" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- MAIN SECTION -->
<div class="main-section">
    <!-- SERVICES STRIPE -->
    <div class="p-mid-top-breather serv-stripe sec-bg text-center p-mid-bottom-breather">
        <div class="container  ">
            <h2 class="uppercase">Create the perfect <span class="brandtxt-color headfont-bold">interiors for your space</span> </h2>
            <div class="row m-mid-bottom-breather">
                <div class="col-sm-4">
                    <img src="img/search-icon.png" alt="Episode Interiors Design Search" class="p-light-breather">
                    <h3>Search for design inspirations</h3>
                    <p>With thousands of templates to choose from, we provide quality design inspirations to make your home a delight.</p>
                </div>
                <div class="col-sm-4">
                    <img src="img/ornament-icon.png" alt="Episode Interiors Design Products" class="p-light-breather">
                    <h3>Find products for your home</h3>
                    <p>Design and decorate your home or office space with items from our extensive collection of product items</p>
                </div>
                <div class="col-sm-4">
                    <img src="img/portfolio-icon.png" alt="Episode Interiors Portolio" class="p-light-breather">
                    <h3>Check our portfolio</h3>
                    <p>Having overseen projects in MM1 Airport and faraway in Miami, we boast of a large and varied indigenous and multinational clientele base. </p>
                </div>
            </div>
            <a href="gallery/" class="btn btn-lg heavy-font-size p-vlight-breather main-btn-color">Go to Gallery</a>
        </div>
    </div>
    <!-- ABOUT EPISODE INTERIORS -->
    <div class="p-heavy-top-breather abt-us p-heavy-bottom-breather">
        <div  class="container">
            <div class="row m-mid-top-breather">
                <div class="col-sm-6 heavy-line-height">
                    <h2 class="uppercase no-top-margin">Welcome to <span class="headfont-bold brandtxt-color">Episode Interiors</span></h2>
                    <p class="m-mid-top-breather lead">Episode Interiors is an industry-leading interior design and decoration company.</p>
                    <p>We serve home owners, companies, facility managers and other clients in need of creative and quality design projects be it the kitchen, office, garden or anywhere design inspiration is desired.</p>
                    <p class="hidden-sm">With a constant enthusiasm and a passionate drive, we continually expand our creative design innovation and skillset, which has made us carve a significant niche in interior design and decoration space.</p>
                    <p class="hidden-sm">At Episode Interiors, we are passionate about providing our clients the best designs the industry has to offer. Therefore whether all you need is a complete office redesign or just the perfect wall covering for your kitchen, Episode Interiors is here to help.</p>
                </div>
                <div class="col-sm-6 hidden-xs">
                    <img class="img-responsive" src="img/sd-img.png" alt="Episode Interiors">
                </div>
            </div>
        </div>
    </div>
    <!-- PROJECTS -->
    <div class="p-heavy-top-breather projs p-heavy-bottom-breather">
        <div class="container">
            <h2 class="uppercase text-center">some of <span class="brandtxt-color headfont-bold">our projects</span></h2>
            <div class="row m-heavy-top-breather hidden-sm">
                <div class="col-sm-4">
                    <img src="img/mm1.jpg" alt="Episode Interiors Project" class="img-responsive" data-toggle="modal" data-target="#imgModal">
                    <p class="img-desc">MM1 Airport lounge, lagos</p>
                </div>
                <div class="col-sm-4">
                    <img src="img/total-home.jpg" alt="Episode Interiors Project" class="img-responsive" data-toggle="modal" data-target="#imgModal">
                    <p class="img-desc">Living Room Project in Osbonne Estate, Ikoyi</p>
                </div>
                <div class="col-sm-4">
                    <img src="img/miami.jpg"  alt="Episode Interiors Project" class="img-responsive" data-toggle="modal" data-target="#imgModal">
                    <p class="img-desc">Bedroom Project, Miami USA</p>
                </div>
            </div>
            <div class="row m-heavy-top-breather hidden-sm">
                <div class="col-sm-4">
                    <img src="img/avenue-estate.jpg"  alt="Episode Interiors Project" class="img-responsive" data-toggle="modal" data-target="#imgModal">
                    <p class="img-desc">2nd avenue estate, ikoyi, lagos</p>
                </div>
                <div class="col-sm-4">
                    <img src="img/milverton-rd.jpg"  alt="Episode Interiors Project" class="img-responsive" data-toggle="modal" data-target="#imgModal">
                    <p class="img-desc">Show Flat Project, Bedroom Area,Milverton Rd, Ikoyi</p>
                </div>
                <div class="col-sm-4">
                    <img src="img/milverton-rd2.jpg" alt="Episode Interiors Project" class="img-responsive" data-toggle="modal" data-target="#imgModal">
                    <p class="img-desc">Showflat Project, Dining Area, Milverton Rd, Ikoyi</p>
                </div>
            </div>

            <!-- still coming here -->
            <div class="row m-heavy-top-breather visible-sm">
                <div class="col-sm-6">
                    <img src="img/mm1.jpg" alt="Episode Interiors Project" class="img-responsive" data-toggle="modal" data-target="#imgModal">
                    <p class="img-desc">MM1 Airport lounge, lagos</p>
                </div>
                <div class="col-sm-6">
                    <img src="img/total-home.jpg" alt="Episode Interiors Project" class="img-responsive" data-toggle="modal" data-target="#imgModal">
                    <p class="img-desc">total home, parkview estate, Lagos</p>
                </div>
            </div>
            <div class="row m-heavy-top-breather visible-sm">
                <div class="col-sm-6">
                    <img src="img/miami.jpg"  alt="Episode Interiors Project" class="img-responsive" data-toggle="modal" data-target="#imgModal">
                    <p class="img-desc">miami project, USA</p>
                </div>
                <div class="col-sm-6">
                    <img src="img/avenue-estate.jpg"  alt="Episode Interiors Project" class="img-responsive" data-toggle="modal" data-target="#imgModal">
                    <p class="img-desc">2nd avenue estate, ikoyi, lagos</p>
                </div>
            </div>
            <div class="row m-heavy-top-breather visible-sm"><div class="col-sm-6">
                <img src="img/milverton-rd.jpg"  alt="Episode Interiors Project" class="img-responsive" data-toggle="modal" data-target="#imgModal">
                <p class="img-desc">luxury flat, milverton road, ikoyi, lagos</p>
                </div>
                <div class="col-sm-6">
                    <img src="img/milverton-rd2.jpg" alt="Episode Interiors Project" class="img-responsive" data-toggle="modal" data-target="#imgModal">
                    <p class="img-desc">luxury flat, milverton road, ikoyi, lagos</p>
                </div>
            </div>

        </div>
    </div>
    <!-- PRODUCTS -->
    <div class="p-heavy-top-breather rel-pos sec-bg hm-prdts p-heavy-bottom-breather">
        <div class="container">
            <h2 class="uppercase text-center">order our range of <span class="brandtxt-color headfont-bold">interior decor products</span></h2>
            <div id="owl-demo" class="owl-carousel owl-theme"> 
                <?php foreach ($categories as $category): ?>
                <div class="item">
                    <div class="img-bx">
                        <img src="<?php echo  homepageProductImgPath($category->cover_image);?>" alt="Episode Interiors <?php echo $category->name;?>" class="img-responsive">
                    </div>
                    <div class="item-bx text-center">
                        <h2><?php echo $category->name;?></h2>
                        <a href="products/category.php?id=<?php echo $category->id; ?>" class="btn">shop now</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="customNavigation">
                <a class="btn prev hidden-xs"><span class="glyphicon glyphicon-chevron-left"></span> </a>
                <a class="btn next hidden-xs"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
    </div>
</div>
<?php include_once("layout/firstfooter.php"); ?>
