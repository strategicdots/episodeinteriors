<?php $thisPage = "admin"; ?>
<?php include_once("../includes/initialize.php"); ?>
<?php if (!$session->isLoggedIn()) { redirect_to("."); } 

include_once("../layout/secondheader.php");
// check the value of the get value sent in
if(!isset($_GET['id']) || $_GET['id'] == "") { 
    redirect_to("dashboard.php");
}

?>
<?php $category = ProductCategories::findDetails($_GET['id']);
$item = new ProductItems;
$items = ProductItems::findAllUnderParent($category->id, $database->escapeValue("category_id"));

$itemName = "";
if(!empty($items)) { 
    foreach($items as $item) {
        $itemName .= "<a class=\"capitalize\" href=\"item.php?id=";
        $itemName .= $item->id;
        $itemName .="\">";
        $itemName .= $item->name;
        $itemName .= "</a> \n";
    }
} else {
    $itemName .= "<p>No items under '{$category->name}'.</p>";
}
$itemName .= "<a class=\"inline-block m-light-top-breather capitalize brandtxt-color\" href=\"create_item.php?parent_id={$category->id}\">+ Create a new item</a>";
?>

<?php
echo adminTopHead(); echo adminSidebar(); echo adminMainbarTop(); 
echo adminHeadline($category->name); 
echo inline_message();
?>
<?php
echo messageDisplay("category name", ucwords($category->name));
echo messageDisplay("cover image", "<img class=\"img-responsive img-rounded\" style=\"height: 220px; margin-bottom: 20px;\" src=" . $category->cover_image . ">");
echo messageDisplay("items under {$category->name}", nl2br($itemName));
?>
<div class="m-heavy-top-breather">
    <a href="edit_category.php?id=<?php echo $category->id; ?>" class="btn capitalize btn-success">Edit <?php echo $category->name; ?></a>
    <a href="delete_category.php?id=<?php echo $category->id; ?>" class="btn capitalize main-btn-color" <?php echo confirmDelete($category->name); ?>>Delete <?php echo $category->name; ?></a></div>
<?php 
echo adminFooter(); 
include_once("../layout/secondfooter.php"); ?>