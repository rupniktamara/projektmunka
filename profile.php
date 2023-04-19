<?php $title = 'Home'; ?>
<?php $metaTags = 'tag1 tag2'; ?>
<?php $currentPage = 'index'; ?>
<?php require_once(__DIR__.'/head.php'); ?>
<?php require_once(__DIR__.'/navbar.php'); ?>
<?php include('./phphelpers/helpers.php'); ?>
<?php 
  include('./phphelpers/mysqlOps.php');

  $loggedUser = "";
  if (isset($_SESSION['username'])) {
    $loggedUser = $_SESSION['username'];
  } 

  if (isset($_REQUEST['formType']) && 'profile' === $_REQUEST['formType']) {
    if (isset($_REQUEST["fullname"]) &&
        isset($_REQUEST["email"]) &&
        isset($_REQUEST["telnum"])
      ) {    
        $conn = connectDB();
        $fullname = mysqli_real_escape_string($conn, $_REQUEST['fullname']);
        $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
        $telnum = mysqli_real_escape_string($conn, $_REQUEST['telnum']);

        $sql = "update Users set Users_email = ?, Users_name = ?, Users_phone = ? where Users_username = ?";
        dbOp_update($conn, $sql, "ssss", $email, $fullname, $telnum, $loggedUser);
        // exit();
      }
  } 

  $conn = connectDB();
  $sql = "select * from Users where Users_username = ?";
  $result = dbOp_select($conn, $sql, "s", $loggedUser);
  $user_name = $result[0]["Users_name"];
  $user_email = $result[0]["Users_email"];
  $user_phone = $result[0]["Users_phone"];

?>

<body>
<?php includeWithVariables(__DIR__.'/heading.php', array('pagename' => 'Adatlap')); ?> 

      <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
          <div class="container ftext">
              <form action="" method="post">
                  <input type="hidden" name="formType" value="profile"/>
                  <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center text-primary px-3">Profil adatok</h6>
                  </div>
                    <div class="row justify-content-md-center">
                      <div class="col-12 col-md-4">
                        <label for="veznev" class="form-label">Felhasználónév</label>
                        <input type="text" class="form-control" id="username" disabled name="username" value="<?php echo  $loggedUser; ?>">  
                      </div>
                    </div>
                    <div class="row justify-content-md-center">
                      <div class="col-12 col-md-4">
                        <label for="veznev" class="form-label">Teljes név</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo  $user_name; ?>">  
                      </div>
                    </div>
                    <div class="form-spacing row  justify-content-md-center">
                      <div class="col-12 col-md-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo  $user_email; ?>">
                      </div>
                    </div>
                    <div class="form-spacing row  justify-content-md-center">
                      <div class="col-12 col-md-4">
                        <label for="telnum" class="form-label">Telefon</label>
                        <input type="tel" class="form-control" id="telnum" name="telnum" value="<?php echo  $user_phone; ?>">
                      </div>
                    </div>
                    <div class="form-spacing row  justify-content-md-center">
                      <div class="col-12 col-md-4">
                        <button type="submit" class="btn btn-primary">Mentés</button>
                      </div>
                    </div>
              </form>
          </div>
        </div>



<?php require_once(__DIR__.'/footer.php'); ?>
    <?php require_once(__DIR__.'/scripts.php'); ?>
</body>