<?php
    session_start();
    include("config.php");
    $db = new PDO(DNS, DB_USER, DB_PASS);
    $query = "SELECT * FROM categories";
    $categories = $db->query($query);

    if(!isset($_SESSION['email'])) {
        header("location:signin.php?err_msg=first you should login to the system.");
        exit();
    }
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
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a href="index.php" class="navbar-brand col-sm-3 col-md-2 px-5">Tech Weblog</a>
        <ul class="navbar-nav bg-primary">
            <li class="nav-item text-nowrap">
                <a href="logout.php" class="nav-link text-light px-5">Exit</a>
            </li>
        </ul>
    </nav>
    