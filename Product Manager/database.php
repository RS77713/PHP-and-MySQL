<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '','database') or die (mysqli_error($mysqli));

$id = '';
$img = '';
$sku = '';
$name = '';
$old_price = '';
$price = '';
$product_category = '';

if (isset($_POST['save'])){
  $id = $_POST['id'];
  $img = $_POST['img'];
  $sku = $_POST['sku'];
  $name = $_POST['name'];
  $old_price = $_POST['old_price'];
  $price = $_POST['price'];
  $product_category = $_POST['product'];

  $mysqli->query("INSERT INTO tbl_products (id, img, sku, name, old_price, price, product)Values('$id','$img', '$sku', '$name', '$old_price', '$price', '$product_category')") or die($mysqli->error);
    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
}

if (isset($_POST['delete'])){
   $chkarr = $_POST['checkbox'];
   foreach ($chkarr as $id) {
     $mysqli->query("DELETE FROM tbl_products WHERE ID=$id") or die($mysqli->error());
   }


   $_SESSION['message'] = "Record has been deleted!";
   $_SESSION['msg_type'] = "danger";

   header("location: index.php");
 }





 //if (isset($_POST['save'])) {
  //  $product= $_POST['product'];
  //  $mysqli-> prepare("")

?>
