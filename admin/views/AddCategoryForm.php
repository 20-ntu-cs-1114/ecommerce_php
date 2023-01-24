<?php
include_once('Header.php');
if(isset($_COOKIE['user_role']) && $_COOKIE['user_role']=='admin'){   

if (isset($_GET['upload']) && $_GET['upload'] == 'success') { ?>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Congratulation </strong>
        <?phpCategory ?> is added successfully.
    </div>
    <?php } ?>
    <div class="container mt-5">
        <div class="row d-flex align-content-center justify-content-center">
            <div class="add-productt ">
                <form action="../controllers/Category/AddCategory.php" method="POST" enctype="multipart/form-data">
                    <h2 class="text-center">Add Category</h2>
                    <div class="form-group">
                        <input type="text" class="form-control" id="cname" placeholder="Category Name" name="cname">
                    </div>
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" id="cimage" name="cimage">
                    <label class="custom-file-label" for="cimage">Select Category Image</label>
                </div><br><br>
                <button type="submit" class="btn btn-primary">Add Cateogry</button>
            </form>
        </div>
    </div>
    
</div>

<?php } else{
     header("location: ../../views/PageNotFound.php");
}