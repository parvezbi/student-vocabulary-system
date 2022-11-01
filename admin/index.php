<?php 
include"layouts/header.php";
include"layouts/sidebar.php";
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row ">
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15"> Total Students</h5>
                    <?php 
                      $readUserQuery = "SELECT * FROM users";
                      $readUQResult = mysqli_query($conn,$readUserQuery) or die("Read Total Words Query Failed - Check index.php in Admin");
                      $users = mysqli_num_rows($readUQResult);
                      echo "<h2 class='mb-3 font-18'>$users</h2>";
                    ?>
                    <p class="mb-0"><span class="col-green">10%</span> Increase</p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="assets/img/banner/1.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Total Words</h5>
                    <?php
                      $readWordQuery = "SELECT * FROM words";
                      $readWQResult = mysqli_query($conn,$readWordQuery) or die("Read Total Words Query Failed - Check index.php in Admin");
                      $words = mysqli_num_rows($readWQResult);
                      echo "<h2 class='mb-3 font-18'>$words</h2>";
                    ?>
                    <p class="mb-0"><span class="col-green">10%</span> Increase</p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="assets/img/banner/2.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Total Synonym</h5>
                    <?php 
                      $readWordQuery = "SELECT * FROM words";
                      $readWQResult = mysqli_query($conn,$readWordQuery) or die("Read Total Words Query Failed - Check index.php in Admin");
                      $words = mysqli_num_rows($readWQResult);
                      echo "<h2 class='mb-3 font-18'>$words</h2>";
                    ?>
                    <p class="mb-0"><span class="col-green">10%</span>
                      Increase</p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="assets/img/banner/3.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Total Antonym</h5>
                    <?php 
                      $readWordQuery = "SELECT * FROM words";
                      $readWQResult = mysqli_query($conn,$readWordQuery) or die("Read Total Words Query Failed - Check index.php in Admin");
                      $words = mysqli_num_rows($readWQResult);
                      echo "<h2 class='mb-3 font-18'>$words</h2>";
                    ?>
                    <p class="mb-0"><span class="col-green">10%</span> Increase</p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="assets/img/banner/4.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include"layouts/footer.php"; ?>