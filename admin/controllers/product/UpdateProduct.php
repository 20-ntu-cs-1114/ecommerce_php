<?php
include_once('../../models/Product.php');
$product = new AdminProduct();
$product->name = $_POST['pname'];
$product->description = $_POST['pdesc'];
$product->price = $_POST['pprice'];
$product->quantity = $_POST['pquantity'];
$product->category_id = $_POST['cid'];
$product_id = $_POST['pid'];

if($_FILES['pimage']['error']){
    $oldImage = $_POST['oldImage'];
    $product->image = $oldImage;
}else{
    $main_dir = $_SERVER['DOCUMENT_ROOT']."/ecommerce";
    $image_name = $_FILES['pimage']['name'];
    $product->image = $image_name;
    move_uploaded_file($_FILES['pimage']['tmp_name'], $main_dir . "/images/" . $image_name);
}
if($product->updateProduct($product_id)){
    header("location: ../../views/UpdateProductForm.php?update=success&id=$product_id");
}

?>