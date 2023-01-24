<?php
if(isset($_COOKIE['user_role']) && $_COOKIE['user_role']!=='admin'){
    include_once('Header.php');
    if (isset($_GET['upload']) && $_GET['upload'] == 'success') { ?>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Congratulation </strong>Image is added successfully.
    </div>
    <?php } ?>
    <div class="container pt-5">
        <form action="../controllers/carousel/AddCarousel.php" method="POST" enctype="multipart/form-data">
            
            <div class="custom-file">
                <input type="file" class="custom-file-input" required name="carousel_image" id="carousel_image">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Add</button>
        </form>
    </div>
<?php } else{
    header("location: ../../views/PageNotFound.php");  
}