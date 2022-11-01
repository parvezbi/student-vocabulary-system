<?php 
  include"inc/db.php";
  session_start();
  if (isset($_SESSION['email'])) {
     header("Location:admin/words.php");
  }
  if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, sha1($_POST['password']));
    $loginQuery = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'";
    $loginQResult = mysqli_query($conn,$loginQuery) or die("Login Query Failed - Check login.php");

    if (mysqli_num_rows($loginQResult)>0) {
      while ($user = mysqli_fetch_assoc($loginQResult)) {
        if ($user['status']=='1') {
          session_start();
          $_SESSION['userId'] = $user['userId'];
          $_SESSION['name'] = $user['name'];
          $_SESSION['email'] = $user['email'];
          $_SESSION['role'] = $user['role'];
          $_SESSION['status'] = $user['status'];
          header("Location:admin/index.php");
        }else{
          echo '<div class="alert alert-danger">Your Account is pending!</div>';
        }
      }
    }else{
      echo '<div class="alert alert-danger">Username and Password not Matched!</div>';
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Student Login</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="admin/assets/css/app.min.css">
  <link rel="stylesheet" href="admin/assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="admin/assets/css/style.css">
  <link rel="stylesheet" href="admin/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="admin/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='admin/assets/img/logo.png' />
</head>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row" style="margin: 120px 0;">
          <div class="offset-md-3 col-md-6">
            <div class="logoWrapper">
              <h1 style="font-size:25px;color: #6777ef;text-align: center;margin-bottom: 15px;">Saifurs - Student Vocabulary</h1>
            </div>
          </div>
          <div class="offset-md-4 col-md-4"> 
            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form action="" method="POST">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" required autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label >Password</label>
                    <input type="password" class="form-control" name="password" required>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" name="login" value="Login">
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="register.php">Create One</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="admin/assets/js/app.min.js"></script>
  <script src="admin/assets/js/scripts.js"></script>
  <script src="admin/assets/js/custom.js"></script>
</body>
</html>