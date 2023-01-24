<?php 
include_once('Header.php');
if (isset($_COOKIE['user_role']) && $_COOKIE['user_role'] == 'admin') {

    include_once('../models/Category.php');
    $db = new AdminCategory();
    $categories = $db->getCategories()->fetchAll(pdo::FETCH_ASSOC);
    ?>
<div class="row pt-3">
    <a href="AddCategoryForm.php" class="btn btn-success offset-10">Add Category</a>
</div>
    <div class="table-responsive p-3">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">No of Products</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) { ?>

                <tr>
                    <th scope="row"><?php echo $category['id'] ?></th>
                    <td><img src="../../images/<?php echo $category['category_image'] ?>" alt="" style="width:75px"></td>
                    <td><?php echo $category['category_name'] ?></td>
                    <td><?php echo $category['no_of_products'] ?></td>
                    <td><a href="UpdateCategoryForm.php?id=<?php echo $category['id'] ?>" class="btn btn-primary">Update</a></td>
                    <td><a href="../controllers/category/DeleteCategory.php?id=<?php echo $category['id'] ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php } else{
     header("location: ../../views/PageNotFound.php");
}