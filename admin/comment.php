<?php
    include("./include/header.php");
    $query_comments = "SELECT * FROM comments ORDER BY id DESC";
    $comments = $db->query($query_comments);

    if(isset($_GET['action']) && isset($_GET['id'])) {
        $action  = $_GET['action'];
        $id = $_GET['id'];

        if($action == "delete") {
            $query = $db->prepare("DELETE FROM comments WHERE id = :id");
            $query->execute(['id' => $id]);
            header("location:comment.php");
            exit();
        } else {
            $query = $db->prepare("UPDATE comments SET status='1' WHERE id = :id");
            $query->execute(['id' => $id]);
            header("location:comment.php");
            exit();
        }
    }
?>
<div class="container-fluid">
    <div class="row">

        <?php include("./include/sidebar.php"); ?>

        <main class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-3">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                <h3 class="mt-5">Comments</h3>
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-striped table-sm border">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>title</th>
                            <th>comment</th>
                            <th>seting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($comments->rowCount() > 0) {
                                foreach($comments as $comment) {
                                    ?>
                                    <tr>
                                        <td><?php echo $comment['id'] ?></td>
                                        <td><?php echo $comment['name']?></td>
                                        <td><?php echo $comment['comment'] ?></td>
                                        <td>
                                            <?php
                                                if($comment['status']) {
                                                    ?>
                                                    <a href="#" class="btn btn-outline-success">Confirm</a>
                                                <?php
                                                } else {
                                                    ?>
                                                    <a href="comment.php?action=approve&id=<?php echo $comment['id'] ?>" class="btn btn-outline-primary">waiting for confirmation</a>
                                                <?php    
                                                }
                                                ?>
                                                <a href="comment.php?action=delete&id=<?php echo $comment['id'] ?>" class="btn btn-outline-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                } else {
                                    ?>
                                    <div class="alert alert-danger">
                                        no comments showed up!
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