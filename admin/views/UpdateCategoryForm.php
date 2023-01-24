<?php
include_once('Header.php');
if (isset($_COOKIE['user_role']) && $_COOKIE['user_role'] == 'admin') {
    include_once('../models/Category.php');
    $db = new AdminCategory();
    if (isset($_GET['id'])) {
        $category = $db->searchCategory($_GET['id'])->fetch(PDO::FETCH_ASSOC);
    } else {
        header("location: Categories.php");
    }

    if (isset($_GET['update']) && $_GET['update'] == 'success') { ?>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Congratulation: </strong>Updated successfully.
    </div>
<?php } ?>

<div class="container mt-5">
    <div class="row d-flex align-content-center justify-content-center">
        <div class="add-productt ">
            <form action="../controllers/category/UpdateCategory.php" method="POST" enctype="multipart/form-data">
                <h2 class="text-center">Update Category</h2>
                <input type="text" name="cid" value="<?php echo $category['id'] ?>" hidden id="cid">
                <div class="form-group">
                    <input type="text" class="form-control" id="cname" placeholder="Category Name" name="cname"
                        value="<?php echo $category['category_name'] ?>">
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="cimage" name="cimage">
                    <label class="custom-file-label" for="cimage">Select Category Image</label>
                    <input type="hidden" name="oldImage" value="<?php echo $category['category_image'] ?>">
                </div><br><br>
                <button type="submit" class="btn btn-primary">Update Cateogry</button>
            </form>
        </div>
    </div>

</div>
<?php } else{
     header("location: ../../views/PageNotFound.php");
}