<?php $thisPage = "admin"; ?>
<?php include_once("../includes/initialize.php"); ?>
<?php if (!$session->isLoggedIn()) { redirect_to("."); } 

// process form data
$message = "";
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

    if(!isset($_FILES['upload']))  {
        $errorMgs['upload'] = "No image was uploaded";
    }

    if(empty($errorMgs)) {
        // validations passed
        $parent_id = trim($_POST['parent_id']); 
        $name      = trim($_POST['name']); 
        $desc      = trim($_POST['desc']);
        $price     = trim($_POST['price']);
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


        $parent = ProductCategories::findDetails($parent_id);
        $img = new Images();
        $imgPath = pathinfo($parent->cover_image);
        $img->parentDir = $imgPath['dirname']; // get parent directory to store image
        $img->attach_file($_FILES['upload']);

        if($img->save()) {
            $item = new ProductItems();
            $item->name         = $name;
            $item->category_id  = $parent_id;
            $item->price        = $price;
            $item->item_desc    = $desc;
            $item->currency     = $currency;
            $item->image    = $img->targetPath();

            if($item->create()) {
                $session->message("'" . ucwords(htmlentities($item->name)) ."' created successfully.");
                redirect_to("item.php?id={$item->id}");
            } else {
                $message="there is a problem creating {$item->name}";
            }
        } else {
            // problem uploading image
            foreach($img->errors as $error => $msg) {
                $message .= "{$msg} \n";
            }
        } 
    }
}
include_once("../layout/secondheader.php");

if(!isset($_GET['parent_id']) || $_GET['parent_id'] == "") {
    redirect_to("dashboard.php");  
}
$category = ProductCategories::findDetails($_GET['parent_id']);
?>
<?php
echo adminTopHead(); echo adminSidebar(); echo adminMainbarTop(); 
echo adminHeadline("Create a new item under '" . $category->name ."'"); 
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
// display submit messages
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
                    <input type="text" name="name" value="<?php if(isset($name)) {echo $name;} ?>" class="form-control capitalize">
                </div>
                <div class="form-group">
                    <label class="txt-bold">Item Description</label> 
                    <textarea type="text" name="desc" value="<?php if(isset($desc)) {echo $desc;} ?>" class="form-control" rows="7"></textarea>
                </div>
                <div class="form-group">
                    <label class="txt-bold">Price</label>
                    <select name="currency">
                        <option value="naira">&#x20A6;</option>
                        <option value="dollar">&#36;</option>
                        <option value="euro">&#8364;</option>
                        <option value="pounds">&#163;</option>
                    </select> 
                    <input type="text" name="price" value="<?php if(isset($price)) {echo $price;} ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label class="txt-bold">Attach Image </label>
                    <input type="file" name="upload">
                </div>
                <input type="submit" name="submit" value="create item" class="btn capitalize m-mid-top-breather main-btn-color mid-font-size">
            </form>
        </div>
    </div>
</div>
<?php 
echo adminFooter(); 
include_once("../layout/secondfooter.php"); ?>