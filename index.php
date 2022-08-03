<?php
    include("./includes/header.php");
    include("./includes/slider.php");

    if(isset($_GET['category'])) {
        $keyword = $_GET['category'];
        $posts = $db->prepare('SELECT * FROM posts WHERE category_id LIKE :keyword');
        $posts->execute(['keyword' => "%$keyword%"]);
        
    } else {
        $query_posts = "SELECT * FROM posts";
        $posts = $db->query($query_posts);
    }
    
?>

    <section class="py-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 mb-4" >
                    <div class="row">

                        <?php
                        if($posts->rowCount() > 0){
                            foreach($posts as $post) {
                                $category_id = $post['category_id'];
                                $query_post_category = "SELECT * FROM categories WHERE id=$category_id";
                                $post_category = $db->query($query_post_category)->fetch();
                        ?>

                                <div class="col-sm-6 mt-2">

                                    <div class="card h-100">
                                        <img src="./img/<?php echo $post['image'] ?>" class="card-img-top" alt="..." height="300">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="card-title"><?php echo $post['title'] ?></h5>
                                                <div><span class="badge bg-secondary p-2"><?php echo $post_category['title'] ?></span></div>
                                            </div>
                                            <p class="card-text text-justify">
                                            <?php echo substr($post['body'], 0, 300) . "..." ?> 
                                            </p>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between text-muted">
                                            <a href="single.php?post=<?php echo $post['id'] ?>" class="btn btn-outline-primary stretched-link">click me</a>
                                            <p>author: <?php echo $post['author'] ?></p>
                                        </div>
                                    </div>

                                    
                                </div>

                            <?php
                                }
                            } else {
                            ?>

                                <div class="col">
                                    <div class="alert alert-danger">
                                        post not founded
                                    </div>
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