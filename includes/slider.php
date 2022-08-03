<?php
    $query_slider = "SELECT * FROM posts_slider";
    $posts_slider = $db->query($query_slider);
    ?>
<section>
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="true">
    
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
                <div class="carousel-inner bg-dark" style="height: 550px">
                    <?php
                        if($posts_slider->rowCount() > 0) {
                            foreach ($posts_slider as $post_slider) {
                                $id_post = $post_slider['post_id'];
                                $query_posts = "SELECT * FROM posts WHERE id=$id_post";
                                $post = $db->query($query_posts)->fetch();
                    ?>
                        <div class="carousel-item <?php echo ($post_slider['active']) ? "active" : ""; ?>" style="height: 550px">
                            <img src="./img/<?php echo $post['image'] ?>" class="d-block w-100 h-100" alt="first-slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?php echo $post['title'] ?></h5>
                                <p><?php echo substr($post['body'], 0 , 200) . "..." ?></p>
                                <a href="single.php?post=<?php echo $post['id'] ?>" class="btn btn-danger px-4">click</a>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
        </div>
</section>

