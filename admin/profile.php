<?php 
include"layouts/header.php";
include"layouts/sidebar.php";
include"../inc/db.php";
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row ">
      <div class="offset-md-3 col-md-6">
        <?php
          $userId = $_SESSION['userId'];
          $readUser = "SELECT * FROM users WHERE userId = '{$userId}'";
          $readUserResult = mysqli_query($conn,$readUser) or die("Profile Data Query Failed - Check profile.php in Admin");
          if (mysqli_num_rows($readUserResult)>0) {
            while ($user = mysqli_fetch_assoc($readUserResult)) {?>
              <div class="card">
                <div class="card-header">
                  <h4>Name: <?php echo $user['name']; ?></h4>
                </div>
                <div class="card-header">
                  <h4>Email: <?php echo $user['email']; ?></h4>
                </div>
                <div class="card-header">
                  <h4>Role: <?php if($user['role']==4){ echo "Student";} else{ echo "Admin";}?></h4>
                </div>
                <div class="card-header">
                  <h4>Status: <?php if($user['status']==1){ echo "Active";} else{ echo "Inactive";}?></h4>
                </div>
                <div class="card-footer text-right">
                  <a href="profile-update.php?edit=<?php echo $user['userId']; ?>" class="btn btn-primary">Edit</a>
                </div>
              </div>
            <?php }
          }
        ?>
      </div>
    </div>
  </section>
</div>
<?php include"layouts/footer.php"; ?>