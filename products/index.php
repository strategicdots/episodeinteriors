<?php $thisPage = "products"; ?>
<?php include_once("../includes/initialize.php"); ?>
<?php include_once("../layout/secondheader.php"); ?>
<!-- MAIN SECTION -->
<div class="inner-main-section main-prdts">
    <div class="container m-mid-bottom-breather">
        <h1 class="uppercase text-center headfont-bold" style=""> product items</h1>
        <div class="text-center">
            <?php echo shareButtons(); ?>
        </div>
        <div class="row m-mid-top-breather">
            <div class="col-md-3 ctgry">
                <?php $categories=ProductCategories::findAll(); ?>
                <div class="mid-container hidden-xs">
                    <p class="lead headfont">category</p>
                    <ul>
                        <?php foreach($categories as $category): ?>
                        <li><a href="category.php?id=<?php echo $category->id; ?>"><?php echo htmlentities($category->name); ?><span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!-- XS -->
                <div class="visible-xs container m-heavy-bottom-breather">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <p class="panel-title lead headfont">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#mainCollapse" class="header"> Category
                                    <span class="glyphicon glyphicon-chevron-down pull-right"></span></a> 
                                </p>
                            </div>
                            <div id="mainCollapse" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="no-list-style no-left-padding">
                                        <?php foreach($categories as $category): ?>
                                        <li><a href="category.php?id=<?php echo $category->id; ?>"><?php echo htmlentities($category->name); ?><span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="items col-md-9">
                <?php $items = ProductItems::SelectRandomRows(12);
                if(!$items): ?>
                <p class="brandtxt-color txt-bold"> No product items to display. </p> 
                <?php else: 
                $n = 0; 
                $row=[];
                for($i = 0; $i <= 50; $i++) {
                    $x = $i*3;
                    $row[] = $x;
                }
                ?>
                <?php foreach($items as $item): 
                $category = ProductCategories::findDetails($item->category_id);
                ?>
                <?php if(in_array($n, $row)) { echo "<div class=\"row\">"; }  $n++;?>

                <div class="col-sm-4">
                    <div class="m-light-bottom-breather m-light-top-breather item">
                        <a href="item.php?id=<?php echo $item->id; ?>"><img src="<?php echo $item->image; ?>" class="img-responsive margin-auto">
                            <p class=""><?php echo $item->name;?></p>
                            <p class="headfont"><?php echo $category->name;?></p>
                        </a>
                    </div>
                </div>
                <?php  if(in_array($n, $row)) { echo "</div>"; } ?>

                <?php endforeach; ?>
                <?php endif;?>
                <!--<div class="col-md-4">
<a href=""><img src="../img/accessories2.jpg" class="img-responsive">
<p class="">accessory 2</p>
<p class="headfont">accessory</p></a>
</div>
<div class="col-md-4">
<a href=""><img src="../img/accessories3.jpg" class="img-responsive">
<p class="">accessory 3</p>
<p class="headfont">accessory</p></a>
</div>
-->
            </div>
        </div>

    </div>
</div>
<?php include_once("../layout/secondfooter.php"); ?>
