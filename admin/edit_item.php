<?php $thisPage = "admin"; ?>
<?php include_once("../includes/initialize.php"); ?>
<?php if (!$session->isLoggedIn()) { redirect_to("."); } 


// process form data
if(isset($_POST['submit'])) {
    $errorMgs = [];
    $message = "";

    $raw_form_fields     = [
        'parent_id'      => $_POST['parent_id'], 
        'name'           => $_POST['name'], 
        'description'    => $_POST['desc'],
        'currency'       => $_POST['currency'],
        'price'          => $_POST['price']
    ];

    foreach ($raw_form_fields as $field => $value) {
        if(!$form_validation->has_presence($value)) {
            $errorMgs[$field] = ucwords(str_replace("_", " ", $field)) . " can't be blank";
        } 
    }
    // check if price is integer
    if(!$form_validation->is_digits(trim($_POST['price']))) {
        $errorMgs['price'] = "Price is not an integer";
    }

    if(empty($errorMgs)) {
        // validations passed
        $parent_id = trim($_POST['parent_id']); 
        $name      = trim($_POST['name']); 
        $desc      = trim($_POST['desc']);
        $price     = trim($_POST['price']);
        $image     = trim($_POST['prev_upload']);
        $currency  = trim($_POST['currency']);
        switch($currency) {
            case "naira" :
                $currency = "&#x20A6;";
                break;
            case "dollar" :
                $currency = "&#36;";
                break;
            case "euro" :
                $currency = "&#8364;";
                break;
            case "pounds" :
                $currency = "&#163;";
                break;
        }

        /* check if the same info in the db are passed */
        $item = ProductItems::findDetails($_GET['id']);
        $dbData         = [
            $item->name,
            $item->item_desc,
            $item->price,
            $item->image,
            $item->currency
        ];
        $passedData     = [
            $name, $desc, $price, $image, $currency
        ];

        if($dbData == $passedData) {
            redirect_to("item.php?id={$item->id}");            
        }

        $img        = new Images();
        if(!$img->attach_file($_FILES['new_upload'])) {
            $image = trim($_POST['prev_upload']);
        } else { 
            $imgPath    = pathinfo($image); // get directory
            $img->parentDir = $imgPath['dirname'];
            $img->attach_file($_FILES['new_upload']);

            if(!$img->save()) {
                // problem uploading image
                foreach($img->errors as $error => $msg) {
                    $message .= "{$msg} \n";
                }
            } else {
                unlink($image); // unlink old image
                $image = $img->targetPath();
            }
        } /* end of attached new image */
        $item->name         = $name;
        $item->price        = $price;
        $item->item_desc    = $desc;
        $item->image        = $image;
        $item->currency     = $currency;

        if($item->update()) {
            $session->message("'" . ucwords($item->name) ."' edited successfully.");
            redirect_to("item.php?id={$item->id}");
        } else {
            $message="there is a problem editing {$item->name}";
        }
    } 

}

include_once("../layout/secondheader.php");
if(!isset($_GET['id']) || $_GET['id'] == "") { 
    redirect_to("dashboard.php");
}
?>
<?php 
$item = ProductItems::findDetails($_GET['id']);
$category = ProductCategories::findDetails($item->category_id);


?>
<?php // echo $item->image; exit;
echo adminTopHead(); echo adminSidebar(); echo adminMainbarTop(); 
echo adminHeadline("Edit " . $item->name . " ({$category->name})"); 
echo inline_message();
// display error array
if(isset($errorMgs)) {
    $msg = "<ul class=\"no-list-style brandtxt-color no-left-margin\">";
    foreach($errorMgs as $error) {
        $msg .= "<li>" . $error . "</li>";
    }
    $msg .= "</ul>";
    echo $msg;
}
// display submit error messages
if(isset($message)) {
    echo "<p style=\"color: red\">{$message}</p>";  
}
?>
<div class="m-mid-top-breather">
    <div class="row">
        <div class="col-sm-9">
            <form method="post" action="#" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo maxFileSize(); ?>">
                <input type="hidden" name="parent_id" value="<?php echo $category->id; ?>">
                <div class="form-group">
                    <label class="txt-bold">Category</label> 
                    <input class="form-control capitalize" type="text" name="category" value="<?php echo $category->name; ?>" readonly>
                </div>
                <div class="form-group">
                    <label class="txt-bold">Item Name</label> 
                    <input type="text" name="name" value="<?php echo $item->name; ?>" class="form-control capitalize">
                </div>
                <div class="form-group">
                    <label class="txt-bold">Item Description</label> 
                    <textarea type="text" name="desc" class="form-control" rows="7"><?php echo $item->item_desc; ?></textarea>
                </div>
                <div class="form-group">
                    <label class="txt-bold">Price</label>
                    <select name="currency">
                        <option value="naira" <?php if($item->currency == "&#x20A6;") {echo "selected=\"selected\""; } ?>>&#x20A6;</option>
                        <option value="dollar" <?php if($item->currency == "&#36;") {echo "selected=\"selected\""; } ?>>&#36;</option>
                        <option value="euro" <?php if($item->currency == "&#8364;") {echo "selected=\"selected\""; } ?>>&#8364;</option>
                        <option value="pounds" <?php if($item->currency == "&#163;") {echo "selected=\"selected\""; } ?>>&#163;</option>
                    </select>  
                    <input type="text" name="price" value="<?php echo $item->price; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <img src="<?php echo $item->image; ?>" class="img-responsive" style="height: 220px;">
                    <input type="hidden" name="prev_upload" value="<?php echo $item->image; ?>">
                    <label class="txt-bold">Change Image </label>
                    <input type="file" name="new_upload">
                </div>
                <input type="submit" name="submit" value="update item" class="btn capitalize m-mid-top-breather main-btn-color mid-font-size">
            </form>
        </div>
    </div>
</div>
<?php 
echo adminFooter(); 
include_once("../layout/secondfooter.php"); ?>