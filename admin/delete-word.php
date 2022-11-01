<?php 
include"layouts/header.php";
include"layouts/sidebar.php";
include"../inc/db.php";
if (isset($_POST['delete'])) {
  $wId = $_POST['wId'];
  $deleteWord = "DELETE FROM words WHERE wId = '{$wId}'";
  $deleteWResult = mysqli_query($conn,$deleteWord) or die("Delete Word Query Failed - Check delete-word.php in Admin");
  if ($deleteWResult == true) {
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
                <h4>Confirm to delete the word ?</h4>
              </div>
              <div class="card-body">
          <?php
            $word = $_GET['delete'];
            $readWordQuery = "SELECT * FROM words WHERE wId = '{$word}'";
            $readWQResult = mysqli_query($conn,$readWordQuery) or die("Read Word For Delete Query Failed - Check delete-word.php in Admin");

            if ($_SESSION['role']==4) {
              if (mysqli_num_rows($readWQResult)>0) {
                while ($word = mysqli_fetch_assoc($readWQResult)) {
                  if ($_SESSION['userId']!=$word['user']) {
                    header("Location:words.php");
                  }else{?>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                      <div class="form-group">
                        <label for="word">Word</label>
                        <input id="word" type="text" class="form-control" name="word" autofocus value="<?php echo $word['word']; ?>" disabled>
                        <input type="hidden" name="wId" value="<?php echo $word['wId']; ?>">
                        <input type="hidden" name="user" value="<?php echo $_SESSION['userId']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="meaning">Meaning</label>
                        <input id="meaning" type="text" class="form-control" name="meaning" value="<?php echo $word['meaning']; ?>" disabled>
                        <div class="invalid-feedback">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="synonym">Synonym</label>
                        <input id="synonym" type="text" class="form-control" name="synonym" value="<?php echo $word['synonym']; ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="antonym">Antonym</label>
                        <input id="antonym" type="text" class="form-control" name="antonym" value="<?php echo $word['antonym']; ?>" disabled>
                      </div>
                      <div class="form-group">
                        <input type="submit" name="delete" value="Delete" class="btn btn-primary btn-lg btn-block">
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
                        <label for="word">Word</label>
                        <input id="word" type="text" class="form-control" name="word" autofocus value="<?php echo $word['word']; ?>" disabled>
                        <input type="hidden" name="wId" value="<?php echo $word['wId']; ?>">
                        <input type="hidden" name="user" value="<?php echo $_SESSION['userId']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="meaning">Meaning</label>
                        <input id="meaning" type="text" class="form-control" name="meaning" value="<?php echo $word['meaning']; ?>" disabled>
                        <div class="invalid-feedback">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="synonym">Synonym</label>
                        <input id="synonym" type="text" class="form-control" name="synonym" value="<?php echo $word['synonym']; ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="antonym">Antonym</label>
                        <input id="antonym" type="text" class="form-control" name="antonym" value="<?php echo $word['antonym']; ?>" disabled>
                      </div>
                      <div class="form-group">
                        <input type="submit" name="delete" value="Delete" class="btn btn-primary btn-lg btn-block">
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

