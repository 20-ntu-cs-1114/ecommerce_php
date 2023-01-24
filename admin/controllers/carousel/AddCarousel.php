<?php 
include_once('../../models/Carousel.php');
$carousel = new AdminCarousel();

if(!$_FILES['pimage']['error']){
    $main_dir = $_SERVER['DOCUMENT_ROOT']."/ecommerce";
    $image_name = $_FILES['carousel_image']['name'];
    $carousel->image = $image_name;
    move_uploaded_file($_FILES['carousel_image']['tmp_name'], $main_dir . "/images/" . $image_name);
}   
if($carousel->addCarousel()){
    header("location: ../../views/AddCarouselForm.php?upload=success");
}
?>
