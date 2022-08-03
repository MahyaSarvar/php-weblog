<?php
    include("./includes/header.php");
    if(isset($_GET['post'])) {
        $post_id = $_GET['post'];
        $post = $db->prepare('SELECT * FROM posts WHERE id = :id');
        $post->execute(['id' => $post_id]);
        $post = $post->fetch();
    }
    if(isset($_POST['post_comment'])) {
        if(trim($_POST['name']) != "" || trim($_POST['comment']) != "") {
            $name = $_POST['name'];
            $comment = $_POST['comment'];
            $comment_insert = $db->prepare("INSERT INTO comments (name, comment, post_id) VALUES (:name, :comment, :post_id)");
            $comment_insert->execute(['name' => $name, 'comment' => $comment, 'post_id' => $post_id]);
            header("location:single.php?post=$post_id");
            exit();
        } else {
            echo "fields must not be empty!";
        }
    }
?>

    <section class="py-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 mb-4" >
                        <div class="container">
                            <?php
                                if($post) {
                                    $category_id = $post['category_id'];
                                    $query_post_category = "SELECT * FROM categories WHERE id=$category_id";
                                    $post_category = $db->query($query_post_category)->fetch();
                                    $post_id = $post['id'];
                                    $comments = $db->prepare("SELECT * FROM comments WHERE post_id = :id AND status = '1'"); 
                                    $comments->execute(['id' => $post_id]);
                                    ?>
                                    <div class="row">

                                        <div>
                                            <img src="./img/<?php echo $post['image'] ?>" class="img-fluid rounded" alt="...">
                                        </div>
                                        <div class="p-3">
                                                <div class="d-flex align-items-center">
                                                    <h5><?php echo $post['title'] ?></h5>
                                                    <div class="mx-2"><span class="badge bg-secondary p-2"><?php echo $post_category['title'] ?></span></div>
                                                </div>
                                                <p class="text-justify">
                                                    <?php echo $post['body']?>
                                                </p>
                                                <p>author: <?php echo $post['author'] ?></p>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-12">
                                            <form method="post">
                                                <div class="form-group mt-4">
                                                    <label for="name">name</label>
                                                    <input type="name" name="name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="comment">comment text</label>
                                                    <textarea name="comment" class="form-control" rows="5"></textarea>
                                                </div>
                                                <button type="submit" name="post_comment" class="btn btn-outline-primary mt-2">send</button>
                                            </form>
                                        </div>

                                    </div>
                                    
                                    <div class="row p-md--3 mt-5">
                                        <p>the number of comments: <?php echo $comments->rowCount() ?></p>
                                        <?php
                                            if($comments->rowCount() > 0) {
                                                foreach($comments as $comment) {
                                                    ?>
                                                    <div class="col-12 mb-3">
                                                        <div class="card bg_light">
                                                            <div class="card_body">
                                                                <div class="d-flex align-items-center">
                                                                    <img src="./img/pngwing.com(1).png" class="m-2 rounded-circle" alt="rounded-circle" width="70" height="70">
                                                                    <div class="mr-3">
                                                                        <h5 class="card_title"><?php echo $comment['name'] ?></h5>
                                                                    </div>
                                                                </div>
                                                                <p class="card_text pt-3 pr-3 mx-2">
                                                                    <?php echo $comment['comment'] ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>


                                <?php
                                } else {
                                    ?>
                                    <div class="alert alert-danger">
                                        post not founded.
                                    </div>
                                <?php
                                }
                                ?>

                        </div>



                </div>
                <?php
                    include("./includes/sidebar.php");
                ?>
            </div>
        </div>
    </section>

<?php
    include("./includes/footer.php");
?>