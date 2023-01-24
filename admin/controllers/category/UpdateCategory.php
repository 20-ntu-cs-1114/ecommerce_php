<?php
include_once('../../models/Category.php');
$category = new AdminCategory();
$category->name = $_POST['cname'];
$id = $_POST['cid'];
$category->updateCategory(1);
if($_FILES['cimage']['error']){
    $oldImage = $_POST['oldImage'];
    $category->image = $oldImage;
}else{
    $main_dir = $_SERVER['DOCUMENT_ROOT']."/ecommerce";
    $image_name = $_FILES['cimage']['name'];
    $category->image = $image_name;
    move_uploaded_file($_FILES['cimage']['tmp_name'], $main_dir . "/images/" . $image_name);
}
if($category->updateCategory($id)){
    header("location: ../../views/UpdateCategoryForm.php?update=success&id=$id");
}

?>