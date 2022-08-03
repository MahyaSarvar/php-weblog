<?php
    include("./include/header.php");

    if(isset($_GET['id'])) {
        $category_id = $_GET['id'];
        $category = $db->prepare('SELECT * FROM categories WHERE id = :id');
        $category->execute(['id' => $category_id]);
        $category = $category->fetch();
    }

    if(isset($_POST['edit_category'])) {
        if(trim($_POST['title']) != "") {
            $title = $_POST['title'];
                $category_update = $db->prepare("UPDATE categories SET title=:title WHERE id=:id");
                $category_update->execute([':title' => $title, ':id' => $category_id]);
            header("location:category.php");
            exit();
        } else {
            header("location:edit_category.php?id=$category_id&err_msg=please fill the fields.");
            exit();
        }
    }
?>
<div class="container-fluid">
    <div class="row">
        <?php include('./include/sidebar.php') ?>

        <main class="col-md-9 ml-sm-auto col-lg-10 px-4">

            <div class="d-flex justify-content-between mt-5">
                <h3>Edit Category</h3>
            </div>

            <?php
                if(isset($_GET['err_msg'])) {
                    ?>
                    <div class="alert alert-danger">
                        <?php echo $_GET['err_msg'] ?>
                    </div>
            <?php
            }
            ?>

            <form method="post" class="mb-5" enctype="multipart/form-data">
                <div class="form-group mt-2">
                    <label for="category">title : </label>
                    <input type="text" name="title" id="category" class="form-control mt-1" value="<?php echo $category['title'] ?>">
                    <small class="form-text text-muted">Enter the name of category</small>
                </div>
                <button type="submit" name="edit_category" class="btn btn-outline-primary mt-3">Edit</button>
            </form>
        </main>
    </div>
</div>

</body>
</html>