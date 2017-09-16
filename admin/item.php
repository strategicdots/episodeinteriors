<?php $thisPage = "admin"; ?>
<?php include_once("../includes/initialize.php"); ?>
<?php if (!$session->isLoggedIn()) { redirect_to("."); } 

include_once("../layout/secondheader.php");
// check the value of the get value sent in
if(!isset($_GET['id']) || $_GET['id'] == "") { 
    redirect_to("dashboard.php");
}

?>
<?php 
$item = ProductItems::findDetails($_GET['id']);
$category = ProductCategories::findDetails($item->category_id);
?>

<?php
echo adminTopHead(); echo adminSidebar(); echo adminMainbarTop(); ?>
<a href="category.php?id=<?php echo $category->id; ?>" class="small-font-size capitalize headfont">&laquo; go back to <?php echo $category->name; ?></a>
<?php echo adminHeadline($item->name); 
echo inline_message();
?>
<?php
echo messageDisplay("item name", ucwords($item->name));
echo messageDisplay("description", ucfirst($item->item_desc));
echo messageDisplay("price", ($item->currency . $item->price));
echo messageDisplay("image", "<img class=\"img-responsive img-rounded\" style=\"height: 220px; margin-bottom: 20px;\" src=\"{$item->image} \">");
?>
<div class="m-heavy-top-breather">
    <a href="edit_item.php?id=<?php echo $item->id; ?>" class="btn capitalize btn-success">Edit <?php echo $item->name; ?></a>
    <a href="delete_item.php?id=<?php echo $item->id; ?>" class="btn capitalize main-btn-color" <?php echo confirmDelete($item->name); ?>>Delete <?php echo $item->name; ?></a></div>
<?php 
echo adminFooter(); 
include_once("../layout/secondfooter.php"); ?>