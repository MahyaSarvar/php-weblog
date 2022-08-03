<?php
    include("./include/header.php");

    if(isset($_POST['add_category'])) {
        if(trim($_POST['title']) != "") {
            $title = $_POST['title'];
            $category_insert = $db->prepare("INSERT INTO categories (title) VALUES (:title)");
            $category_insert->execute([':title' => $title]);
            header("location:category.php");
            exit();
        } else {
            header("location:new_category.php?err_msg=please fill the fields.");
            exit();
        }
    }
?>

<div class="container-fluid">
<div class="row">
    <?php include('./include/sidebar.php') ?>

    <main class="col-md-9 ml-sm-auto col-lg-10 px-4">

        <div class="d-flex justify-content-between mt-5">
            <h3>new post</h3>
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
                <input type="text" name="title" id="category" class="form-control mt-1">
                <small class="form-text text-muted">Enter the name of category</small>
            </div>
            <button type="submit" name="add_category" class="btn btn-outline-primary mt-3">create</button>
        </form>
    </main>
</div>
</div>

</body>
</html>