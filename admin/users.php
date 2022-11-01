<?php 
include"layouts/header.php";
include"layouts/sidebar.php";
include"../inc/db.php";
if ($_SESSION['role']==4) {
  header("Location:words.php");
}
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row ">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>User Management</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-md">
                <tbody>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
              <?php
                $limit = 3;
                if (isset($_GET['page'])) {
                  $page = $_GET['page'];
                }else{
                  $page = 1;
                }
                $offset = ($page-1)*$limit;
                $readUser = "SELECT * FROM users ORDER BY userId ASC LIMIT {$offset},{$limit}";
                $readUserResult = mysqli_query($conn,$readUser) or die("All User Query Failed - Check users.php in Admin");
                if (mysqli_num_rows($readUserResult)>0) {
                  $serial = $offset+1;
                  while ($user = mysqli_fetch_assoc($readUserResult)) {?>
                  <tr>
                    <td><?php echo $serial; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>
                      <div class="badge badge-success">
                        <?php
                          if ($user['role']==4) {?>
                            <?php echo "User"; ?>
                          <?php }else{?>
                          <?php echo "Admin"; ?>
                          <?php }
                        ?>
                        </div>
                    </td>
                    <td>
                      <div class="badge badge-success">
                        <?php
                          if ($user['status']==1) {?>
                            <?php echo "Active"; ?>
                          <?php }else{?>
                          <?php echo "Pending"; ?>
                          <?php }
                        ?>
                      </div>
                    </td>
                    <td>
                      <a href="update-user.php?edit=<?php echo $user['userId']; ?>">
                        <i class="far fa-edit"></i>
                      </a>
                    </td>
                    <td>
                      <a href="delete-user.php?delete=<?php echo $user['userId']; ?>">
                        <i class="fas fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  <?php 
                    $serial++;
                  }
                }else{
                   echo "<p>No Data Found!</p>";
                }
              ?>
              </tbody>
            </table>
            </div>
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
              <?php 
               $paginationQuery = "SELECT * FROM users";
               $paginationQResult = mysqli_query($conn,$paginationQuery) or die("Pagination Query Failed In users.php");
               if (mysqli_num_rows($paginationQResult)>0) {
                $totalRecords = mysqli_num_rows($paginationQResult);
                $totalPages = ceil($totalRecords/$limit);
                echo '<ul class="pagination mb-0">';
                if ($page > 1) {?>
                <li class="page-item">
                  <a class="page-link" href="users.php?page=<?php echo $page-1; ?>">
                    <i class="fas fa-chevron-left"></i>
                  </a>
                </li>
                <?php }
                for ($i=1; $i <= $totalPages ; $i++) {
                  if ($i==$page) {?>
                    <li class="page-item active">
                      <a class="page-link" href="users.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                  <?php }else{?>
                    <li class="page-item">
                      <a class="page-link" href="users.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                  <?php }
                }
                if ($totalPages > $page) {?>
                <li class="page-item">
                  <a class="page-link" href="users.php?page=<?php echo $page+1; ?>">
                    <i class="fas fa-chevron-right"></i>
                  </a>
                </li>
                <?php }
                echo '</ul>';
               }
              ?>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include"layouts/footer.php"; ?>