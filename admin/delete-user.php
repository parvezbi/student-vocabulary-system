<?php 
  include"layouts/header.php";
  include"layouts/sidebar.php";
  include"../inc/db.php";
  if ($_SESSION['role']==4) {
  header("Location:words.php");
}
  if (isset($_POST['delete'])) {
    $userId = $_POST['userId'];
    $deleteUserQuery = "DELETE FROM users WHERE userId = '{$userId}'";
    $deleteUQResult = mysqli_query($conn,$deleteUserQuery) or die('Delete User Query Failed - Check delete-user.php in Admin');
    header("Location:users.php");
  }
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row ">
      <div class="col-12 offset-md-3 col-md-6 offset-lg-3 col-lg-6">
        <div class="card card-primary">
          <div class="card-header">
            <h4>Confirm Delete User</h4>
          </div>
          <div class="card-body">
          <?php
            $userId = $_GET['delete'];
            $readUserQuery = "SELECT * FROM users WHERE userId = '{$userId}'";
            $readUQResult = mysqli_query($conn,$readUserQuery) or die('Read User For Delete Query Failed - Check delete-user.php in Admin');
            if (mysqli_num_rows($readUQResult)>0) {
              while ($user = mysqli_fetch_assoc($readUQResult)) {?>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                  <div class="form-group">
                    <label for="name">User Name</label>
                    <input id="name" type="text" class="form-control" name="name" disabled value="<?php echo $user['name']; ?>">
                    <input type="hidden" name="userId" value="<?php echo $user['userId']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="email">User Email</label>
                    <input id="email" type="email" class="form-control" name="email" disabled value="<?php echo $user['email']; ?>">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>User Role</label>
                    <select class="form-control" name="role" disabled>
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
                    <label>User Status</label>
                    <select class="form-control" name="status" disabled>
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
                    <label for="password">User Password</label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Set New Password" disabled>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="delete" value="Delete" class="btn btn-primary btn-lg btn-block">
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