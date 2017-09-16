<?php $thisPage = "products"; ?>
<?php 
include_once("../includes/initialize.php");
if(!isset($_GET['id']) || empty($_GET['id'])) {
    redirect_to(".");
}

$item = ProductItems::findDetails($_GET['id']);
$category = ProductCategories::findDetails($item->category_id);
$message = "";
$post = $_POST;
$errorMgs = [];
$sent = 0;

if(isset($_POST['submit'])) {
    $raw_form_fields     = [
        'name'              => $_POST['name'], 
        'email'             => $_POST['email'],
        'phone'             => $_POST['phone'],
        'message'           => $_POST['msg']
    ];

    foreach ($raw_form_fields as $field => $value) {
        if(!$form_validation->has_presence($value)) {
            $errorMgs[$field] = ucwords(str_replace("_", " ", $field)) . " can't be blank";
        } 
    }
    // check if price is integer
    if(!$form_validation->is_digits(trim($_POST['phone']))) {
        $errorMgs['price'] = "Phone is not in numbers only";
    }

    if(empty($errorMgs)) {
        // validations passed
        $custMsg = new CustomerMessages();
        $custMsg->customerName = trim($_POST['name']); 
        $custMsg->email     = trim($_POST['email']);
        $custMsg->content   = trim($_POST['msg']);
        $custMsg->productItem = $item->id;
        $custMsg->timeSent    = mySQLDateTime(time());
        $custMsg->phoneNumber = trim($_POST['phone']);

        if($custMsg->create()) {
            $sent = 1;
            $message = "<p class=\"brandtxt-color text-center m-mid-top-breather\">Thanks, We'll get back to you.</p>";
        } else {
            $message="message can't be sent";
        }
    }
}
?>
<?php include_once("../layout/secondheader.php"); ?>
<!-- MAIN SECTION -->
<div class="inner-main-section main-prdts">
    <div class="container m-heavy-bottom-breather products">
        <!-- breadcrumbs -->
        <div class="brdcrmb m-vlight-top-breather">
            <div class="brdcrmb-wrap">
                <a href="../" class="brdcrmb-anchor">home</a><span class="arrow-img"></span><a href="." class="brdcrmb-anchor">products</a><span class="arrow-img"></span><a href="category.php?id=<?php echo $category->id; ?>" class="brdcrmb-anchor"><?php echo $category->name; ?></a><span class="arrow-img"></span><?php echo $item->name; ?>
            </div>
        </div>
        <!-- main items section -->
        <div class="row p-vlight-top-breather">
            <div class="col-sm-8">
                <img src="<?php echo $item->image; ?>" class="img-responsive margin-auto img-rounded" id="main-image">
            </div>
            <div class="col-sm-4">
                <div class="desc-top">
                    <h1 class="capitalize no-top-margin item-name"><?php echo $item->name; ?></h1>
                    <p class="sectxt-color small-font-size"><?php echo $item->item_desc; ?></p>
                </div>
                <div class="desc-bttm m-mid-top-breather">
                    <p class="capitalize">List Price: <span class="brandtxt-color txt-bold" style="padding-left:5em; letter-spacing: 1px;">price on request</span></p>
                    <?php
                    if(!empty($errorMgs)) {
                        $msg = "<ul class\"brandtxt-color\">";
                        foreach ($errorMgs as $error) {
                            $msg .= "<li>" . $error . "</li>";
                        }
                        echo $msg;
                    }
                    echo $message;
                    ?>
                    <?php if($sent != 1) : ?>
                    <form method="post" action="#" class="m-light-top-breather">
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" placeholder="Name" value="<?php if(isset($post['name'])) {echo $post['name']; } ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="phone" type="tel" placeholder="Phone" value="<?php if(isset($post['phone'])) {echo $post['phone']; } ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="email" type="email" placeholder="Email" value="<?php if(isset($post['email'])) {echo $post['email']; } ?>">
                        </div>
                        <div class="form-group">
                            <textarea name="msg" class="form-control heavy-line-height" rows="3" value="">Hello, I'm interested in buying this piece, could you please provide me with more information?</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="CONTACT US" class="form-control btn main-btn-color">
                        </div>
                    </form>
                    <?php elseif($sent == 0):?>
                    <?php echo $message; ?>
                    <?php endif; ?>
                    <div class="text-center m-light-top-breather"><?php echo shareButtons(); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("../layout/secondfooter.php"); ?>
