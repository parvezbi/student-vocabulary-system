<?php 
  include"inc/db.php";
  $page = basename($_SERVER['PHP_SELF']);
  if (isset($_GET['search'])) {
      $page_title = "Search Result Of ".$_GET['search'];
  }else{
      $page_title = "No Search Result Found";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $page_title; ?></title>
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
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="logoWrapper">
              <h1 style="font-size:25px;color: #6777ef;text-align: center;margin-bottom: 15px;">Saifurs - Student Vocabulary</h1>
            </div>
          </div>
          <div class="col-lg-12 col-md-12"> 
        <div class="card">
        <div class="card-header" style="display: flex;">
          <h4> Search:                    
            <?php
             $search_term = $_GET['search'];
             echo $search_term;
            ?>  
          </h4>
          <div class="card-header-form">
            <form action="search.php" method="GET">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search">
                <div class="input-group-btn">
                  <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-md">
                <tbody>
                  <tr>
                    <th style="width: 5%">ID</th>
                    <th style="width: 20%">Main Word</th>
                    <th style="width: 20%">Meaning</th>
                    <th style="width: 30%">Synonyms</th>
                    <th style="width: 25%">Antonyms</th>
                  </tr>
              <?php
                $limit = 5;
                if (isset($_GET['page'])) {
                  $page = $_GET['page'];
                }else{
                  $page = 1;
                }
                $offset = ($page-1)*$limit;
                $readWord = "SELECT * FROM words WHERE word LIKE '%{$search_term}%' LIMIT {$offset},{$limit}";
                $readWordResult = mysqli_query($conn,$readWord) or die("Search Query Failed - Check search.php");
                if (mysqli_num_rows($readWordResult)>0) {
                  $serial = $offset+1;
                  while ($word = mysqli_fetch_assoc($readWordResult)) {?>
                  <tr>
                    <td><?php echo $serial; ?></td>
                    <td><?php echo $word['word']; ?></td>
                    <td><?php echo $word['meaning']; ?></td>
                    <td><?php echo $word['synonym']; ?></td>
                    <td><?php echo $word['antonym']; ?></td>
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
                $paginationQuery = "SELECT * FROM words WHERE word LIKE '%{$search_term}%'";
                $paginationQResult = mysqli_query($conn,$paginationQuery);
                if (mysqli_num_rows($paginationQResult)>5) {
                  $totalRecords = mysqli_num_rows($paginationQResult);
                  $totalPage = ceil($totalRecords/$limit);
                  echo '<ul class="pagination mb-0">';
                  if ($page>1) {?>
                    <li class="page-item">
                      <a class="page-link" href="search.php?page=<?php echo $page-1; ?>">
                        <i class="fas fa-chevron-left"></i>
                      </a>
                    </li>
                  <?php }
                  for ($i=1; $i <= $totalPage ; $i++) {
                    if ($i==$page) {?>
                        <li class="page-item active">
                          <a class="page-link" href="search.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php }else{?>
                      <li class="page-item">
                        <a class="page-link" href="search.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                      </li>
                    <?php }
                  }
                  if ($totalPage > $page) {?>
                    <li class="page-item">
                      <a class="page-link" href="search.php?page=<?php echo $page+1; ?>">
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
            <div class="mt-5 text-muted text-center">
              Want to add word? <a href="login.php">Add</a>
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