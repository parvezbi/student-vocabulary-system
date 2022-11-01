<?php 
  include"inc/db.php";
  if (isset($_POST['save'])) {
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,sha1($_POST['password']));
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $alreadExist = "SELECT email FROM users WHERE email = '{email}'";
    $resultCheck = mysqli_query($conn, $alreadExist) or die("Register Query Failed - Check register.php");
    if (mysqli_num_rows($resultCheck)>0) {
      echo "<p style='color:red;text-align:center;'>This user is already exist, Create a new one.</p>";
    }else{
      $createNewUser = "INSERT INTO users (name,email,password,role,status) VALUES ('{$name}','{$email}','{$password}','{$role}','{$status}')";
      $createNUResult = mysqli_query($conn,$createNewUser) or die("Datebase Connection Failed 2");
      if ($createNUResult == true) {
        header("Location:login.php");
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Student Register</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="admin/assets/css/app.min.css">
  <link rel="stylesheet" href="admin/assets/bundles/jquery-selectric/selectric.css">
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
        <div class="row" style="margin: 80px 0;">
          <div class="offset-md-3 col-md-6">
            <div class="logoWrapper">
              <h1 style="font-size:25px;color: #6777ef;text-align: center;margin-bottom: 15px;">Saifurs - Student Vocabulary</h1>
            </div>
          </div>
          <div class="offset-md-4 col-md-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Register</h4>
              </div>
              <div class="card-body">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control" name="name" autofocus>
                    <input type="hidden" name="role" value="4">
                    <input type="hidden" name="status" value="1">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="save" value="Register" class="btn btn-primary btn-lg btn-block">
                  </div>
                </form>
              </div>
              <div class="mb-4 text-muted text-center">
                Already Registered? <a href="login.php">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="admin/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="admin/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="admin/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="admin/assets/js/page/auth-register.js"></script>
  <!-- Template JS File -->
  <script src="admin/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="admin/assets/js/custom.js"></script>
</body>

</html>