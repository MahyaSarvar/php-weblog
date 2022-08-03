<?php
    include("config.php");
    $db = new PDO(DNS, DB_USER, DB_PASS);
    $query = "SELECT * FROM categories";
    $categories = $db->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
    <title>Tech Weblog</title>
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a href="index.php" class="navbar-brand me-5">Tech Weblog</a>
            <button class="navbar-toggler" type="button" data-bs-target="#my-nav" data-bs-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="my-nav">
                <ul class="navbar-nav">
                    <?php
                        if($categories->rowCount() > 0) {
                            foreach($categories as $category) {
                                ?>
                                <li class="nav-item <?php echo (isset($_GET['category']) && $category['id'] == $_GET['category']) ? "active" : ""; ?>">
                                    <a class="nav-link" href="index.php?category=<?php echo $category['id']?>"> <?php echo $category['title']?> </a>
                                </li>
                        <?php
                            }
                        }
                        ?>
                </ul>
            </div>
            <form class="d-flex" action="search.php" method="get">
                <input name="search" class="form-control bg-dark text-light me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </nav>