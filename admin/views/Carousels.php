<?php
include_once('Header.php');
if(isset($_COOKIE['user_role']) && $_COOKIE['user_role']=='admin'){?>
?>
<div class="row pt-3">
    <a href="AddCarouselForm.php" class="btn btn-success offset-10">Add Image</a>
</div>
<div class="table-responsive p-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once('../models/Carousel.php');
            $db = new AdminCarousel();
            $carousels = $db->getCarousels()->fetchAll(PDO::FETCH_ASSOC);
            foreach ($carousels as $carousel) { ?>
                <tr>
                    <th scope="row"><?php echo $carousel['id']?></th>
                    <td><img src="../../images/<?php echo $carousel['image']?>" alt="" style="width:75px"></td>
                    <td><a href="../controllers/carousel/DeleteCarousel.php?id=<?php echo $carousel['id']?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php }else{
     header("location: ../../views/PageNotFound.php");
}?>