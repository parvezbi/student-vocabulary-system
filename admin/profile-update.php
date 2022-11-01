<?php 
  include"layouts/header.php";
  include"layouts/sidebar.php";
  include"../inc/db.php";
  if (isset($_POST['update'])) {
    if (empty($_POST['password'])) {
      $userId = $_POST['userId'];
      $name = mysqli_real_escape_string($conn,$_POST['name']);
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $role = $_POST['role'];
      $status = $_POST['status'];
      $updateUserQuery = "UPDATE users SET name = '{$name}', email = '{$email}'WHERE userId = '{$userId}'";
      $updateUQResult = mysqli_query($conn,$updateUserQuery) or die("Update Your Profile Without Password Query Failed - Check update-user.php in Admin");
      header("Location:users.php");
    }else{
      $userId = $_POST['userId'];
      $name = mysqli_real_escape_string($conn,$_POST['name']);
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $password = mysqli_real_escape_string($conn,sha1($_POST['password']));
      $role = $_POST['role'];
      $status = $_POST['status'];
      $updateUserQuery = "UPDATE users SET name = '{$name}', email = '{$email}', password = '{$password}'WHERE userId = '{$userId}'";
      $updateUQResult = mysqli_query($conn,$updateUserQuery) or die('Update Your Profile With Password Query Failed - Check update-user.php in Admin');
      header("Location:users.php");
    }
  }
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row ">
      <div class="col-12 offset-md-3 col-md-6 offset-lg-3 col-lg-6">
        <div class="card card-primary">
          <div class="card-header">
            <h4>Update Your Profile</h4>
          </div>
          <div class="card-body">
          <?php
            $userId = $_GET['edit'];
            $readUserQuery = "SELECT * FROM users WHERE userId = '{$userId}'";
            $readUQResult = mysqli_query($conn,$readUserQuery) or die('Read User For Update Query Failed - Check update-user.php in Admin');
          if ($_SESSION['role']==4) {
            if (mysqli_num_rows($readUQResult)>0) {
              while ($user = mysqli_fetch_assoc($readUQResult)) {
              if ($_SESSION['userId'] != $user['userId'] ) {
                header("Location:words.php");
              }else{?>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                  <div class="form-group">
                    <label for="name">Update Your Name</label>
                    <input id="name" type="text" class="form-control" name="name" autofocus value="<?php echo $user['name']; ?>">
                    <input type="hidden" name="userId" value="<?php echo $user['userId']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="email">Update Your Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password">Update Your Password</label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Set New Password">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg btn-block">
                  </div>
                </form>
              <?php }
              }
            }
          }else{
            if (mysqli_num_rows($readUQResult)>0) {
              while ($user = mysqli_fetch_assoc($readUQResult)) {?>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                  <div class="form-group">
                    <label for="name">Update Your Name</label>
                    <input id="name" type="text" class="form-control" name="name" autofocus value="<?php echo $user['name']; ?>">
                    <input type="hidden" name="userId" value="<?php echo $user['userId']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="email">Update Your Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password">Update Your Password</label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Set New Password">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg btn-block">
                  </div>
                </form>
              <?php }
            }
          }
          ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include"layouts/footer.php"; ?>