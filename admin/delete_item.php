<?php $thisPage = "admin"; ?>
<?php include_once("../includes/initialize.php"); ?>
<?php if (!$session->isLoggedIn()) { redirect_to("."); }
    
// check the value of the get value sent in
if(!isset($_GET['id']) || $_GET['id'] == "") { 
    redirect_to("dashboard.php");
}
?>
<?php $item = ProductItems::findDetails($_GET['id']);
$name = $item->name;
$parent_id = $item->category_id;
if(isset($item->image)) {
    unlink($item->image);
}
if($item->delete()) {
    $session->message("'" . ucwords($name) ."' deleted successfully.");
    redirect_to("category.php?id={$parent_id}");
} else {
    $session->message("Unable to delete {$name}.");
    redirect_to("category.php?id={$parent_id}");
}
