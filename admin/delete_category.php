<?php $thisPage = "admin"; ?>
<?php include_once("../includes/initialize.php"); ?>
<?php if (!$session->isLoggedIn()) { redirect_to("."); } 

// check the value of the get value sent in
if(!isset($_GET['id']) || $_GET['id'] == "") { 
    redirect_to("dashboard.php");
}
?>
<?php $category = ProductCategories::findDetails($_GET['id']);
$item = new ProductItems;
$items = ProductItems::findAllUnderParent($category->id, $database->escapeValue("category_id"));
if(!empty($items)) { 
    $session->message("You cannot delete '" . ucwords($category->name) . "' except all its items are deleted.");
    redirect_to("category.php?id={$category->id}");
} else {
    $name = $category->name;
    $path = pathinfo($category->cover_image);
    // delete cover image and directory
    unlink($category->cover_image);
    rmdir($path['dirname']);
    if($category->delete()) {
        $session->message("'" . ucwords($name) ."' deleted successfully.");
        redirect_to("dashboard.php");
    } else {
        $session->message("Unable to delete {$name}.");
        redirect_to("dashboard.php");
    }
}