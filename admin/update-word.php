<?php 
include"layouts/header.php";
include"layouts/sidebar.php";
include"../inc/db.php";
if (isset($_POST['update'])) {
  $wId = $_POST['wId'];
  $word = mysqli_real_escape_string($conn,$_POST['word']);
  $meaning = mysqli_real_escape_string($conn,$_POST['meaning']);
  $synonym = mysqli_real_escape_string($conn,$_POST['synonym']);
  $antonym = mysqli_real_escape_string($conn,$_POST['antonym']);
  $user = $_POST['user'];
  $updateWord = "UPDATE words SET word = '{$word}', meaning = '{$meaning}', synonym = '{$synonym}', antonym = '{$antonym}', user = '{$user}' WHERE wId = '{$wId}'";
  $updateWResult = mysqli_query($conn,$updateWord) or die("Update Words Query Failed - Check update-word.php in Admin");
  if ($updateWResult == true) {
    header("Location:words.php");
  }
}
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row ">
          <div class="offset-md-3 col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Update The Word</h4>
              </div>
              <div class="card-body">
        <?php
          $word = $_GET['edit'];
          $readWordQuery = "SELECT * FROM words WHERE wId = '{$word}'";
          $readWQResult = mysqli_query($conn,$readWordQuery) or die("Read Words For Update Query Failed - Check update-word.php in Admin");

          if ($_SESSION['role']==4) {
            if (mysqli_num_rows($readWQResult)>0) {
              while ($word = mysqli_fetch_assoc($readWQResult)) {
              if ($_SESSION['userId'] != $word['user'] ) {
                header("Location:words.php");
              }else{?>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                  <div class="form-group">
                    <label for="word">Edit Word</label>
                    <input id="word" type="text" class="form-control" name="word" autofocus value="<?php echo $word['word']; ?>">
                    <input type="hidden" name="wId" value="<?php echo $word['wId']; ?>">
                    <input type="hidden" name="user" value="<?php echo $word['user']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="meaning">Edit Meaning</label>
                    <input id="meaning" type="text" class="form-control" name="meaning" value="<?php echo $word['meaning']; ?>">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="synonym">Edit Synonym</label>
                    <input id="synonym" type="text" class="form-control" name="synonym" value="<?php echo $word['synonym']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="antonym">Edit Antonym</label>
                    <input id="antonym" type="text" class="form-control" name="antonym" value="<?php echo $word['antonym']; ?>">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg btn-block">
                  </div>
                </form>
              <?php }
              }
            }
          }else{
            if (mysqli_num_rows($readWQResult)>0) {
              while ($word = mysqli_fetch_assoc($readWQResult)) {?>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                  <label for="word">Edit Word</label>
                  <input id="word" type="text" class="form-control" name="word" autofocus value="<?php echo $word['word']; ?>">
                  <input type="hidden" name="wId" value="<?php echo $word['wId']; ?>">
                  <input type="hidden" name="user" value="<?php echo $word['user']; ?>">
                </div>
                <div class="form-group">
                  <label for="meaning">Edit Meaning</label>
                  <input id="meaning" type="text" class="form-control" name="meaning" value="<?php echo $word['meaning']; ?>">
                  <div class="invalid-feedback">
                  </div>
                </div>
                <div class="form-group">
                  <label for="synonym">Edit Synonym</label>
                  <input id="synonym" type="text" class="form-control" name="synonym" value="<?php echo $word['synonym']; ?>">
                </div>
                <div class="form-group">
                  <label for="antonym">Edit Antonym</label>
                  <input id="antonym" type="text" class="form-control" name="antonym" value="<?php echo $word['antonym']; ?>">
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