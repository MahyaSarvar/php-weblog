<?php
    include("./include/header.php");

    if(isset($_GET['id'])) {
        $post_id = $_GET['id'];
        $post = $db->prepare('SELECT * FROM posts WHERE id = :id');
        $post->execute(['id' => $post_id]);
        $post = $post->fetch();

        $query_categories = "SELECT * FROM categories";
        $categories = $db->query($query_categories);
    }
    if(isset($_POST['edit_post'])) {
        if(trim($_POST['title']) != "" && trim($_POST['author']) != "" && trim($_POST['category_id']) != "" && trim($_POST['body']) != "") {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $category_id = $_POST['category_id'];
            $body = $_POST['body'];

            if(trim($_FILES['image']['name']) != "") {
                $name_image = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];
                if(move_uploaded_file($tmp_name, "../img/$name_image")) {
                    echo "Upload Success";
                } else {
                    echo "Upload Error";
                }
                $post_update = $db->prepare("UPDATE posts SET title=:title, author=:author, category_id=:category_id, body=:body, image=:image WHERE id=:id");
                $post_update->execute([':title' => $title, ':author' => $author, ':category_id' => $category_id, ':body' => $body, 'image' => $name_image, ':id' => $post_id]);
            } else{
                $post_update = $db->prepare("UPDATE posts SET title=:title, author=:author, category_id=:category_id, body=:body WHERE id=:id");
                $post_update->execute([':title' => $title, ':author' => $author, ':category_id' => $category_id, ':body' => $body, ':id' => $post_id]);
            }
            header("location:post.php");
            exit();
        } else {
            header("location:edit_post.php?id=$post_id&err_msg=please fill the fields.");
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
                    <label for="title">title : </label>
                    <input type="text" name="title" id="title" class="form-control mt-1" value="<?php echo $post['title'] ?>">
                    <small class="form-text text-muted">Enter the name of post</small>
                </div>
                <div class="form-group mt-3">
                    <label for="author">author : </label>
                    <input type="text" name="author" id="author" class="form-control mt-1" value="<?php echo $post['author'] ?>">
                    <small class="form-text text-muted">Enter the name of author</small>
                </div>
                <div class="form-group mt-3">
                    <label for="category_id">category : </label>
                    <select type="text" name="category_id" id="category_id" class="form-control mt-1">
                        <?php 
                            if($categories->rowCount() > 0) {
                                foreach($categories as $category) {
                                    ?>
                                    <option value="<?php echo $category['id'] ?>" <?php echo ($category['id'] == $post['category_id']) ? "selected" : "" ?>><?php echo $category['title'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                    </select>
                </div>
                <div class="form-group mt-3">
                <label for="body">caption : </label>
                    <textarea type="file" name="body" id="body" class="form-control mt-1" rows="15">
                        <?php echo $post['body'] ?>
                    </textarea>
                    <small class="form-text text-muted">Enter the caption of your post</small>
                </div>
                <img src="../img/<?php echo $post['image'] ?>" class="img-fluid mt-4 rounded" alt="post image">
                <div class="form-group mt-3">
                <label for="image">image : </label>
                    <input type="file" name="image" id="image" class="form-control mt-1">
                    <small class="form-text text-muted">Enter the image of your post</small>
                </div>
                <button type="submit" name="edit_post" class="btn btn-outline-primary mt-3">Edit</button>
            </form>
        </main>
    </div>
</div>

</body>
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>


<script>
        ClassicEditor
                .create( document.querySelector( '#body' ) )
                .then( body => {
                        console.log( body );
                } )
                .catch( error => {
                        console.error( error );
                } );
</script>
</html>