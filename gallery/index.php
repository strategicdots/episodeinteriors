<?php $thisPage = "gallery"; ?>
<?php include_once("../includes/initialize.php"); ?>
<?php include_once("../layout/secondheader.php"); ?>
<div class="inner-main-section gallery">
    <!-- main section -->
    <div class="text-center">
        <h1 class="uppercase m-light-top-breather headfont-bold m-light-bottom-breather">gallery</h1>
        <?php echo shareButtons(); ?>
    </div>
    <div class="mid-container">
        <?php 
        $galdir = "../img/gal/";
        $desc = [
            "Bedroom Project, Miami USA", 
            "Dining Room Project, 2nd Avenue Estate, Ikoyi",
            "Kitchen Project, Osbonne Estate Ikoyi",
            "Living Room Project, 2nd Avenue Estate, Ikoyi",
            "Living Room Project in Osbonne Estate, Ikoyi",
            "Living Room Project in Parkview Estate, Ikoyi",
            "Living Room Project in Parkview Estate, Ikoyi",
            "MM1 Airport Lounge.",
            "MM1 Airport Lounge",
            "MM1 Airport Restaurant",
            "Show Flat Project, Bedroom Area,Milverton Rd, Ikoyi",
            "Showflat Project, Dining Area, Milverton Rd, Ikoyi"
        ];
        $list = scandir($galdir);
        // removing . and .. to get the real files
        unset($list[0]); unset($list[1]);
        // reindexing $list;
        $list2 = array_values($list);
        $n = 0; 
        $row=[];
        for($i = 0; $i <= 20; $i++) {
            $x = $i*4;
            $row[] = $x;
        }
        ?>
        <?php foreach($list2 as $i => $img): 
        $fullpath = $galdir . $img;?>
        <?php if(in_array($n, $row)) { echo "<div class=\"row\">"; }  $n++;?>
        <div class="col-sm-3 img-bx">
            <div class="m-light-bottom-breather m-light-top-breather item">
                <a href="<?php echo $fullpath; ?>" rel="prettyPhoto[gallery]" title="<?php echo $desc[$i] ?>">
                    <img src="<?php echo $fullpath; ?>" class="img-responsive margin-auto">
                </a>
            </div>
        </div>
        <?php  if(in_array($n, $row)) { echo "</div>"; } ?>
        <?php endforeach; ?>
    </div>

    <!-- other projects -->
    <h2 class="uppercase m-heavy-top-breather p-mid-top-breather text-center headfont-bold">Some Curtain &amp; drapes projects</h2>
    <div class="mid-container m-heavy-top-breather m-mid-bottom-breather">
        <div class="row m-mid-top-breather">
            <div class="col-sm-4 img-bx">
                <a href="../img/curtaindrapes-1.jpg" rel="prettyPhoto[gallery2]">
                    <img src="../img/curtaindrapes-1.jpg" class="img-responsive">
                </a>
            </div>
            <div class="col-sm-4 img-bx">
                <a href="../img/curtaindrapes-2.jpg" rel="prettyPhoto[gallery2]">
                    <img src="../img/curtaindrapes-2.jpg" class="img-responsive">
                </a>
            </div>
            <div class="col-sm-4 img-bx">
                <a href="../img/curtaindrapes-3.jpg" rel="prettyPhoto[gallery2]">
                    <img src="../img/curtaindrapes-3.jpg" class="img-responsive">
                </a>
            </div>
        </div>
        <div class="row m-heavy-top-breather">
            <div class="col-sm-4 img-bx">
                <a href="../img/curtaindrapes-4.jpg" rel="prettyPhoto[gallery2]">
                    <img src="../img/curtaindrapes-4.jpg" class="img-responsive">
                </a>
            </div>
            <div class="col-sm-4 img-bx">
                <a href="../img/curtaindrapes-5.jpg" rel="prettyPhoto[gallery2]">
                    <img src="../img/curtaindrapes-5.jpg" class="img-responsive">
                </a>
            </div>
            <div class="col-sm-4 img-bx">
                <a href="../img/curtaindrapes-6.jpg" rel="prettyPhoto[gallery2]">
                    <img src="../img/curtaindrapes-6.jpg" class="img-responsive">
                </a>
            </div>
        </div>
        <div class="row m-mid-top-breather">
            <div class="col-sm-4 img-bx">
                <a href="../img/curtaindrapes-7.jpg" rel="prettyPhoto[gallery2]">
                    <img src="../img/curtaindrapes-7.jpg" class="img-responsive">
                </a>
            </div>
            <div class="col-sm-4 img-bx">
                <a href="../img/curtaindrapes-8.jpg" rel="prettyPhoto[gallery2]">
                    <img src="../img/curtaindrapes-8.jpg" class="img-responsive">
                </a>
            </div>
            <div class="col-sm-4 img-bx">
                <a href="../img/curtaindrapes-9.jpg" rel="prettyPhoto[gallery2]">
                    <img src="../img/curtaindrapes-9.jpg" class="img-responsive">
                </a>
            </div>

        </div>
    </div>
</div>
<?php include_once("../layout/secondfooter.php"); ?>
