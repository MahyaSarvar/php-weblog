<?php
    include("./include/header.php");
    $query_posts = "SELECT * FROM posts ORDER BY id DESC";
    $posts = $db->query($query_posts);

    if(isset($_GET['action']) && isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = $db->prepare('DELETE FROM posts WHERE id = :id');
        $query->execute(['id' => $id]);
        header("location:post.php");
        exit();
    }
?>
<div class="container-fluid">
    <div class="row">

        <?php include("./include/sidebar.php"); ?>

        <main class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-3">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                <h3 class="mt-5">Recent Posts</h3>
                <a href="new_post.php" class="btn btn-outline-primary mt-5">new post</a>
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-striped table-sm border">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>title</th>
                            <th>author</th>
                            <th>seting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($posts->rowCount() > 0) {
                                foreach($posts as $post) {
                                    ?>
                                    <tr>
                                        <td><?php echo $post['id'] ?></td>
                                        <td><?php echo substr($post['title'], 0, 70) . "..." ?></td>
                                        <td><?php echo $post['author'] ?></td>
                                        <td>
                                            <a href="edit_post.php?id=<?php echo $post['id'] ?>" class="btn btn-outline-primary">Edit</a>
                                            <a href="post.php?entity=post&action=delete&id=<?php echo $post['id'] ?>" class="btn btn-outline-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                } else {
                                    ?>
                                    <div class="alert alert-danger">
                                        no posts showed up!
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