<?php 
include"layouts/header.php";
include"layouts/sidebar.php";
include"../inc/db.php";
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row ">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="heading">
              <h4>All Vocabularies</h4>
            </div>
            <div class="button">
              <a href="add-word.php" class="btn btn-primary">Add Word</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-md">
                <tbody>
                  <tr>
                    <th style="width: 5%">ID</th>
                    <th style="width: 15%">Main Word</th>
                    <th style="width: 15%">Meaning</th>
                    <th style="width: 30%">Synonyms</th>
                    <th style="width: 25%">Antonyms</th>
                    <th style="width: 5%">Edit</th>
                    <th style="width: 5%">Delete</th>
                  </tr>
              <?php
                $limit = 5;
                if (isset($_GET['page'])) {
                  $page = $_GET['page'];
                }else{
                  $page = 1;
                }
                $offset = ($page-1)*$limit;
                if ($_SESSION['role']==4) {
                  $readWord = "SELECT * FROM words WHERE user = {$_SESSION['userId']} ORDER BY wId ASC LIMIT {$offset},{$limit}";
                }else{
                  $readWord = "SELECT * FROM words ORDER BY wId ASC LIMIT {$offset},{$limit}";
                }
                $readWordResult = mysqli_query($conn,$readWord) or die("Read Words For loggedin User Query Failed - Check words.php in Admin");
                if (mysqli_num_rows($readWordResult)>0) {
                  $serial = $offset+1;
                  while ($word = mysqli_fetch_assoc($readWordResult)) {?>
                  <tr>
                    <td><?php echo $serial; ?></td>
                    <td><?php echo $word['word']; ?></td>
                    <td><?php echo $word['meaning']; ?></td>
                    <td><?php echo $word['synonym']; ?></td>
                    <td><?php echo $word['antonym']; ?></td>
                    <td>
                      <a href="update-word.php?edit=<?php echo $word['wId']; ?>"><i class="far fa-edit"></i></a>
                    </td>
                    <td>
                      <a href="delete-word.php?delete=<?php echo $word['wId']; ?>"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php
                   $serial++;
                  }
                }
              ?>
              </tbody>
            </table>
            </div>
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
              <?php
                if ($_SESSION['role'] == 5) {
                  $paginationQuery = "SELECT * FROM words";
                }elseif($_SESSION['role'] == 4){
                  $paginationQuery = "SELECT * FROM words WHERE user = {$_SESSION['userId']}";
                }
                $paginationQResult = mysqli_query($conn,$paginationQuery);
                if (mysqli_num_rows($paginationQResult)>5) {
                  $totalRecords = mysqli_num_rows($paginationQResult);
                  $totalPage = ceil($totalRecords/$limit);
                  echo '<ul class="pagination mb-0">';
                  if ($page>1) {?>
                    <li class="page-item">
                      <a class="page-link" href="words.php?page=<?php echo $page-1; ?>">
                        <i class="fas fa-chevron-left"></i>
                      </a>
                    </li>
                  <?php }
                  for ($i=1; $i <= $totalPage ; $i++) {
                    if ($i==$page) {?>
                        <li class="page-item active">
                          <a class="page-link" href="words.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php }else{?>
                      <li class="page-item">
                        <a class="page-link" href="words.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                      </li>
                    <?php }
                  }
                  if ($totalPage > $page) {?>
                    <li class="page-item">
                      <a class="page-link" href="words.php?page=<?php echo $page+1; ?>">
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