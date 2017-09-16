<?php $thisPage = "admin"; ?>
<?php include_once("../includes/initialize.php"); ?>
<?php if (!$session->isLoggedIn()) { redirect_to("."); } 


// process form data
if(isset($_POST['submit'])) {
    $message = "";
    if($form_validation->has_presence($_POST['name'])) {
        $img = new Images();
        $id = $_POST['id'];
        $img->parentDir = $_POST['name'];
        $img->attach_file($_FILES['upload']);

        if($img->save()) {
            $category = ProductCategories::findDetails($id);
            if($category->name != $_POST['name']) {
                if(basename($category->cover_image) != $_FILES['upload']['name']) {
                    unlink($category->cover_image);
                }
            }
            $category->name = $_POST['name'];
            $category->cover_image = $img->targetPath();
            //  echo $category->id; exit;

            if($category->update()) {
                $session->message("{$category->name} edited successfully.");
                redirect_to("category.php?id={$category->id}");
            } else {
                $message="there is a problem editing {$category->name}";
            }
        } else {
            // Failure
            foreach($img->errors as $error => $msg) {
                $message .= "{$msg} \n";
            }
        }
    } else {
        $message = "Category Name can't be blank";
    }
}
include_once("../layout/secondheader.php");
if(!isset($_GET['id']) || $_GET['id'] == "") { 
    redirect_to("dashboard.php");
}
?>
<?php $category = ProductCategories::findDetails($_GET['id']); ?>
<?php
echo adminTopHead(); echo adminSidebar(); echo adminMainbarTop(); 
echo adminHeadline("Edit " . $category->name); 
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
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <div class="form-group">
                    <label class="txt-bold">Category Name</label> 
                    <input type="text" name="name" value="<?php echo $category->name; ?>" class="form-control capitalize">
                </div>
                <div class="form-group">
                    <label class="txt-bold">Attach Cover Image </label>
                    <input type="file" name="upload">
                </div>
                <input type="submit" name="submit" value="Edit Category" class="btn capitalize m-mid-top-breather main-btn-color mid-font-size">
            </form>
        </div>
    </div>
</div>
<?php 
echo adminFooter(); 
include_once("../layout/secondfooter.php"); ?>