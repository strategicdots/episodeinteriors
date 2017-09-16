<?php $thisPage = "products"; ?>
<?php 
include_once("../includes/initialize.php");
if(!isset($_GET['id']) || empty($_GET['id'])) {
    redirect_to(".");
}
$category = ProductCategories::findDetails($_GET['id']);

?>
<?php include_once("../layout/secondheader.php"); ?>
<!-- MAIN SECTION -->
<div class="inner-main-section main-prdts">
    <div class="container inner-jumbo">
        <div class="top-desc text-center">
            <h1 class="headfont-bold uppercase m-mid-top-breather m-light-bottom-breather" style=""><?php echo $category->name; ?></h1>
            <?php echo shareButtons(); ?>
        </div>
    </div>
    <div class="container">
        <!-- breadcrumbs -->
        <div class="brdcrmb">
            <div class="brdcrmb-wrap">
                <a href="../" class="brdcrmb-anchor">home</a><span class="arrow-img"></span><a href="." class="brdcrmb-anchor">products</a><span class="arrow-img"></span><?php echo $category->name; ?>
            </div>
        </div>
        <!-- items -->
        <div class="items m-light-top-breather">
            <?php 
            $items = ProductItems::findAllUnderParent($category->id, "category_id");

            // pagination
            $pagination = new Pagination();
            $pagination->totalCount = count($items);
            /*echo $pagination->currentPage; exit;*/            
            
            if(!$items): ?>
            <p class="brandtxt-color txt-bold"> No items under this category. </p> 
            <?php else: 
            // making sure we have <div class="row"> at the right places
            $n = 0; 
            $row=[];
            for($i = 0; $i <= 50; $i+=4) {
                $row[] = $i;
            }
            ?>
            <?php foreach($items as $item):  ?>
            <?php if(in_array($n, $row)) { echo "<div class=\"row\">"; }  $n++;?>
            <div class="col-sm-3">
                <div class="m-light-bottom-breather m-light-top-breather item">
                    <a href="item.php?id=<?php echo $item->id; ?>"><img src="<?php echo $item->image; ?>" class="img-responsive  margin-auto">
                        <p class=""><?php echo $item->name;?></p>
                        <p class="headfont m-mid-bottom-margin"><?php echo $category->name; ?></p>
                    </a>
                </div>
            </div>
            <?php  if(in_array($n, $row)) { echo "</div>"; } ?>

            <?php endforeach; ?>
            <?php endif;?>
        </div>
    </div>

</div>

</div>
<?php include_once("../layout/secondfooter.php"); ?>
