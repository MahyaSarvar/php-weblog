<?php
    include("./include/header.php");
    $query_categories = "SELECT * FROM categories ORDER BY id DESC";
    $categories = $db->query($query_categories);

    if(isset($_GET['action']) && isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = $db->prepare('DELETE FROM categories WHERE id = :id');
        $query->execute(['id' => $id]);
        header("location:category.php");
        exit();
    }
?>
<div class="container-fluid">
    <div class="row">

        <?php include("./include/sidebar.php"); ?>

        <main class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-3">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                <h3 class="mt-5">Categories</h3>
                <a href="new_category.php" class="btn btn-outline-primary mt-5">new category</a>
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-striped table-sm border">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>title</th>
                            <th>seting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($categories->rowCount() > 0) {
                                foreach($categories as $category) {
                                    ?>
                                    <tr>
                                        <td><?php echo $category['id'] ?></td>
                                        <td><?php echo $category['title'] ?></td>
                                        <td>
                                            <a href="edit_category.php?id=<?php echo $category['id'] ?>" class="btn btn-outline-primary">Edit</a>
                                            <a href="category.php?action=delete&id=<?php echo $category['id'] ?>" class="btn btn-outline-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                } else {
                                    ?>
                                    <div class="alert alert-danger">
                                        no categories showed up!
                                    </div>
                                    <?php
                                    }
                                    ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>