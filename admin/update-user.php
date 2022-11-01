<?php 
  include"layouts/header.php";
  include"layouts/sidebar.php";
  include"../inc/db.php";
  if ($_SESSION['role']==4) {
  header("Location:words.php");
}
  if (isset($_POST['update'])) {
    if (empty($_POST['password'])) {
      $userId = $_POST['userId'];
      $name = mysqli_real_escape_string($conn,$_POST['name']);
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $role = $_POST['role'];
      $status = $_POST['status'];
      $updateUserQuery = "UPDATE users SET name = '{$name}', email = '{$email}', role = '{$role}', status = '{$status}' WHERE userId = '{$userId}'";
      $updateUQResult = mysqli_query($conn,$updateUserQuery) or die("Update User Without Password Query Failed - Check update-user.php in Admin");
      header("Location:users.php");
    }else{
      $userId = $_POST['userId'];
      $name = mysqli_real_escape_string($conn,$_POST['name']);
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $password = mysqli_real_escape_string($conn,sha1($_POST['password']));
      $role = $_POST['role'];
      $status = $_POST['status'];
      $updateUserQuery = "UPDATE users SET name = '{$name}', email = '{$email}', password = '{$password}', role = '{$role}', status = '{$status}' WHERE userId = '{$userId}'";
      $updateUQResult = mysqli_query($conn,$updateUserQuery) or die('Update User With Password Query Failed - Check update-user.php in Admin');
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
            <h4>Update User</h4>
          </div>
          <div class="card-body">
          <?php
            $userId = $_GET['edit'];
            $readUserQuery = "SELECT * FROM users WHERE userId = '{$userId}'";
            $readUQResult = mysqli_query($conn,$readUserQuery) or die('Read User For Update Query Failed - Check update-user.php in Admin');
            if (mysqli_num_rows($readUQResult)>0) {
              while ($user = mysqli_fetch_assoc($readUQResult)) {?>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                  <div class="form-group">
                    <label for="name">Update User Name</label>
                    <input id="name" type="text" class="form-control" name="name" autofocus value="<?php echo $user['name']; ?>">
                    <input type="hidden" name="userId" value="<?php echo $user['userId']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="email">Update User Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Update User Role</label>
                    <select class="form-control" name="role">
                      <option disabled>Please Select Role</option>
                      <?php
                        if($user['role']==5){?>
                          <option value="5" selected>Admin</option>
                          <option value="4">User</option>
                         <?php }else{?>
                          <option value="5">Admin</option>
                          <option value="4" selected>User</option>
                          <?php }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Update User Status</label>
                    <select class="form-control" name="status">
                      <option disabled>Please Select Status</option>
                      <?php
                        if($user['status']==1){?>
                          <option value="1" selected>Active</option>
                          <option value="0">Pending</option>
                         <?php }else{?>
                          <option value="1">Active</option>
                          <option value="0" selected>Pending</option>
                          <?php }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="password">Update User Password</label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Set New Password">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg btn-block">
                  </div>
                </form>
              <?php }
            }
          ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include"layouts/footer.php"; ?>