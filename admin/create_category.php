<?php $thisPage = "admin"; ?>
<?php include_once("../includes/initialize.php"); ?>
<?php if (!$session->isLoggedIn()) { redirect_to("."); } 


// process form data
if(isset($_POST['submit'])) {
    $message = "";
    if($form_validation->has_presence($_POST['name'])) {
        $img = new Images();
        $img->parentDir = $_POST['name'];
        $img->attach_file($_FILES['upload']);

        if($img->save()) {
            $category = new ProductCategories();
            $category->name = $_POST['name'];
            $category->cover_image = $img->targetPath();

            if($category->create()) {
                $session->message("'" . ucwords($category->name) ."' created successfully.");
                redirect_to("category.php?id={$category->id}");
            } else {
                $message="there is a problem creating {$category->name}";
            }
        } else {
            // Failure
            foreach($img->errors as $error => $msg) {
                $message .= "{$msg} \n";
            }
        }
    } else {
        $message = "'Category Name' can't be blank";
    }
}
include_once("../layout/secondheader.php");
?>
<?php 
if(isset($_GET['id']) && $_GET['id'] != "") {
    $category = ProductCategories::findDetails($_GET['id']); 
}
?>
<?php
echo adminTopHead(); echo adminSidebar(); echo adminMainbarTop(); 
echo adminHeadline("Create a new category"); 
echo inline_message();
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
                <div class="form-group">
                    <label class="txt-bold">Category Name</label> 
                    <input type="text" name="name" value="" class="form-control capitalize">
                </div>
                <div class="form-group">
                    <label class="txt-bold">Attach Cover Image </label>
                    <input type="file" name="upload">
                </div>
                <input type="submit" name="submit" value="create a Category" class="btn capitalize m-mid-top-breather main-btn-color mid-font-size">
            </form>
        </div>
    </div>
</div>
<?php 
echo adminFooter(); 
include_once("../layout/secondfooter.php"); ?>