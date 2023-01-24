<?php 
include_once('../../models/Carousel.php');
$carousel = new AdminCarousel();
$carousel->deleteCarousel($_GET['id']);
if(isset($_GET['id'])){
    if ($carousel->deleteCarousel($_GET['id'])) {
        header("location: ../../views/Carousels.php");
    }
}
?>