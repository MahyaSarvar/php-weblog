<?php
    session_start();
    include("./include/config.php");
    $db = new PDO(DNS, DB_USER, DB_PASS);
    $query = "SELECT * FROM categories";
    $categories = $db->query($query);

    if(isset($_POST['login'])) {
        if(trim($_POST['email']) != "" || trim($_POST['password']) != "") {
            
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user_select = $db->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
            $user_select->execute(['email' => $email, 'password' => $password]);

            if($user_select->rowCount() == 1) {
                $_SESSION['email'] = $email;
                header("location:index.php");
                exit();
            }
        } else {
            header("location:signin.php?err_msg=please fill the fields.");
            exit();
        }
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
    <title>Tech Weblog-Login</title>
</head>
<body>
    <section class="vh-100 bg-blue">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong radius">

            <div class="card-body p-5">

                <?php
                    if(isset($_GET['err_msg'])) {
                        ?>
                        <div class="alert alert-danger">
                            <?php echo $_GET['err_msg'] ?>
                        </div>
                <?php
                }
                ?>

                <h3 class="mb-4 text-center">Sign in</h3>

                <form method="post">

                    <div class="form-outline mb-4">
                        <label class="form-label" for="typeEmailX-2">Email</label>
                        <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="typePasswordX-2">Password</label>
                        <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" />
                    </div>

                    <div class="form-check d-flex justify-content-start mb-4">
                        <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                        <label class="form-check-label" for="form1Example3"> Remember password </label>
                    </div>

                    <button class="btn btn-primary btn-lg btn-block w-100" type="submit" name="login">Login</button>

                </form>

            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</body>
</html>