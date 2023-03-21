<?php
  if(isset($_SESSION['user'])){
    header("refresh:0, url=index.php?page=1");
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/adminlogin.css" rel="stylesheet">
    
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">

  <?php
  if(isset($_POST['login'])){
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    $userControl = $DBConnection->prepare("SELECT * FROM admin_users where username = ? and password = ?");
    $userControl->execute([$inputUsername, $inputPassword]);
    $userControlCount = $userControl->rowCount();

    if($userControlCount > 0){
      $_SESSION['user'] = $inputUsername;
      echo '<div class="alert alert-success">Login Successful! Redirecting...</div>';
      header("refresh:1, url=index.php?page=1");
    }else{
      echo '<div class="alert alert-danger">Username or Password invaled! <br> Please Try Again</div>';
    }
  }

  ?>

  <form method="post" action="">
    <h1 class="h3 mb-4 fw-normal">Admin Login</h1>

    <div class="form-floating mb-2">
      <input type="text" class="form-control" placeholder="username" name="username">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating mb-4">
      <input type="password" class="form-control" placeholder="password" name="password">
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Log In</button>
  </form>
</main>


    
  </body>
</html>
