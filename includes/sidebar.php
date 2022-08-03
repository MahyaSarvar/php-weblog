<?php
        $query = "SELECT * FROM categories";
        $categories = $db->query($query);
?>
<div class="col-md-4 mb-3 mt-2" >

<div class="card bg-light mb-3">
    <div class="card-body">
        <h5 class="card-title">search in weblog</h5>
        <form action="search.php" method="get">
            <div class="input-group mb-3">
                <div class="input-group-prepend order-2">
                    <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
                </div>
                <input name="search" type="text" class="form-control" placeholder="search here">
            </div>
        </form>
    </div>
</div>

<div class="list-group mb-3">
    <a href="#" class="list-group-item list-group-item-action active">categories</a>      
    <?php
        if($categories->rowCount() > 0) {
            foreach($categories as $category) {
                ?>
                <a href="index.php?category=<?php echo $category['id'] ?>" class="list-group-item list-group-item-action">
                    <?php echo $category['title'] ?>
                </a>
    <?php
        }
    }
    ?>
</div>

<div class="card bg-light mb-3">
    <div class="card-body">
        <?php
            if(isset($_POST['subscribe'])) {
                if(trim($_POST['name']) != "" || trim($_POST['email']) != "") {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $subscribe_insert = $db->prepare("INSERT INTO subscribers (name, email) VALUES (:name, :email)");
                    $subscribe_insert->execute(['name' => $name, 'email' => $email]);
                } else {
                    echo "please inter values in fields!";
                }
            }
            ?>
        <form method="post">
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
            </div>
            <button type="submit" name="subscribe" class="btn btn-outline-primary mt-3 w-100">send</button>
        </form>
    </div>
</div>

<div class="card p-3">
    <div class="card-body">
        <h3>About Us</h3>
        <p class="text-justify">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, sunt?
        </p>
    </div>
</div>
</div>