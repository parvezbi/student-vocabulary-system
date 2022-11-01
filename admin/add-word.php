<?php 
include"layouts/header.php";
include"layouts/sidebar.php";
include"../inc/db.php";
if (isset($_POST['save'])) {
  $word = mysqli_real_escape_string($conn,$_POST['word']);
  $meaning = mysqli_real_escape_string($conn,$_POST['meaning']);
  $synonym = mysqli_real_escape_string($conn,$_POST['synonym']);
  $antonym = mysqli_real_escape_string($conn,$_POST['antonym']);
  $user = $_POST['user'];
  $alreadExist = "SELECT word FROM words WHERE word = '{word}'";
  $resultCheck = mysqli_query($conn, $alreadExist) or die("Already Exist Word Query Failed - Check add-word.php in Admin");
  if (mysqli_num_rows($resultCheck)>0) {
    echo "<p style='color:red;text-align:center;'>This word is already exist, Create a new one.</p>";
  }else{
    $createNewWord = "INSERT INTO words (word,meaning,synonym,antonym,user) VALUES ('{$word}','{$meaning}','{$synonym}','{$antonym}','{$user}')";
    $createNWResult = mysqli_query($conn,$createNewWord) or die("Create New Word Query Failed - Check add-word.php in Admin");
    if ($createNWResult == true) {
      header("Location:words.php");
    }
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
                <h4>Add New Word</h4>
              </div>
              <div class="card-body">
                <form action="" method="POST">
                  <div class="form-group">
                    <label for="word">Word</label>
                    <input id="word" type="text" class="form-control" name="word" autofocus required>
                    <input type="hidden" name="user" value="<?php echo $_SESSION['userId']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="meaning">Meaning</label>
                    <input id="meaning" type="text" class="form-control" name="meaning" required>
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="synonym">Synonym</label>
                    <input id="synonym" type="text" class="form-control" name="synonym">
                  </div>
                  <div class="form-group">
                    <label for="antonym">Antonym</label>
                    <input id="antonym" type="text" class="form-control" name="antonym">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="save" value="Save" class="btn btn-primary btn-lg btn-block">
                  </div>
                </form>
              </div>
            </div>
          </div>
    </div>
  </section>
</div>
<?php include"layouts/footer.php"; ?>