<?php $title = 'Home'; ?>
<?php $metaTags = 'tag1 tag2'; ?>
<?php $currentPage = 'index'; ?>
<?php include('./phphelpers/helpers.php'); ?>
<?php include('./phphelpers/mysqlOps.php'); ?>
<?php include('./phphelpers/sendMail.php'); ?>
<?php require_once(__DIR__.'/head.php'); ?>
<?php if (!isset($_REQUEST['formType']) || (isset($_REQUEST['formType']) &&  'login' !== $_REQUEST['formType'])) {
  require_once(__DIR__.'/navbar.php'); 
} else {
  session_start();
}?>
<?php
$mysqli = connectDB();

$reg_error = '';
$reg_DONE_OK = false;
$login_error = '';
$reg_progress = false;

  $kind = isset($_REQUEST['kind']) ? $_REQUEST['kind'] : "";
  $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";

  if (isset($_REQUEST['formType']) && 'register' === $_REQUEST['formType']) {
      if (isset($_REQUEST['registerName']) &&
          isset($_REQUEST['registerUsername']) &&
          isset($_REQUEST['registerEmail']) &&
          isset($_REQUEST['registerPhone']) &&
          isset($_REQUEST['registerPassword']) &&
          isset($_REQUEST['registerRepeatPassword'])
      ) {
          $name = mysqli_real_escape_string($mysqli, $_REQUEST['registerName']);
          $username = mysqli_real_escape_string($mysqli, $_REQUEST['registerUsername']);
          $email = mysqli_real_escape_string($mysqli, $_REQUEST['registerEmail']);
          $phone = mysqli_real_escape_string($mysqli, $_REQUEST['registerPhone']);
          $password = mysqli_real_escape_string($mysqli, $_REQUEST['registerPassword']);
          $repeatPassword = mysqli_real_escape_string($mysqli, $_REQUEST['registerRepeatPassword']);
          $reg_progress = true;

          $query = "SELECT * FROM `Users` WHERE Users_username=?";
          $result = dbOp_select($mysqli, $query, "s", $username);
          if (count($result) ==  0) {
            if ($password === $repeatPassword) {
                $hashedPassword = md5($password);
                $query = "INSERT into Users (Users_email, Users_phone, Users_username, Users_password, Users_name)
                    VALUES('$email', '$phone', '$username', '$hashedPassword', '$name')";
                $mysqli->query($query);
            } else {
                $reg_error = 'A jelszavak nem egyeznek!';
            }
          } else {
            $reg_error = 'A megadott felhasználónév foglalt!';
          }
      } else {
          $reg_error = 'Minden mezőt ki kell tölteni!';
      }
  
      if ($reg_error == '' && $reg_progress) {
        $reg_DONE_OK = true;
        $msg = "Kedves $name!</br></br>Köszönjük, hogy regisztráltál az oldalunkra!</br></br>Baloo alapítvány";
        sendMail($email, "Sikeres regisztráció", $msg);
      } 
  }

  if (isset($_REQUEST['formType']) &&  'login' === $_REQUEST['formType']) {
    
      if (isset($_REQUEST['loginName']) &&
          isset($_REQUEST['loginPassword'])
      ) {
          $username = mysqli_real_escape_string($mysqli, $_REQUEST['loginName']);
          $password = mysqli_real_escape_string($mysqli, $_REQUEST['loginPassword']);
          $query = "SELECT * FROM `Users` WHERE Users_username=? AND Users_password=?";
          $result = dbOp_select($mysqli, $query, "ss", $username, md5($password));

          if (count($result) == 1) {
              $_SESSION['username'] = $username;
              unset($_SESSION['error_displayed']);
              if ($kind != "") {
                header("Location: idopont.php?kind=" . $kind . "&name=" . $name);
              } else {
                header("Location: index.php");
              }

              exit();
          } else {
              if (!isset($_SESSION['error_displayed'])) {
                $login_error = 'A felhasználó név vagy a jelszó nem megfelelő!';
                $_SESSION['error_displayed'] = 'displayed';
              } else {
                $login_error = '';
              }
//              session_destroy();
          }
      }
  }
?>

<body>
<script>
    function clickOnRegister() {
      document.getElementById("tab-register").click();
    }
</script>
<?php includeWithVariables(__DIR__.'/heading.php', array('pagename' => 'Bejelentkezés / Regisztráció')); ?>
  <!-- Team Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="row g-4 justify-content-md-center">
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <!-- Pills navs -->
          <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="tab-login" href="#" role="tab"
                aria-controls="pills-login" aria-selected="true">Bejelentkezés</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="tab-register" href="#" role="tab"
                aria-controls="pills-register" aria-selected="false">Regisztráció</a>
            </li>
          </ul>
          <!-- Pills navs -->

          <!-- Pills content -->
          <div class="tab-content ftext">
            <div class="tab-pane fade  show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
              <form action="" method="post" autocomplete="off">
            <?php if ($reg_DONE_OK) { ?>
                  <div class="form-label"><div class="regsuccess">A regisztráció sikeres, jelentkezz be!</div></div>
            <?php
                  $reg_DONE_OK = false;
            } ?>
                  <input type="hidden" name="formType" value="login"/>
                <!-- Email input -->
            <?php if ($login_error != '') { ?>
                <div class="form-outline mb-4">
                  <label class="form-label error" ><?=$login_error?></label>
                </div>
            <?php }?>

                <div class="form-outline mb-4">
                  <label class="form-label" for="loginName">Felhasználónév</label>
                  <input type="text" id="loginName" name="loginName" class="form-control" value=""  autocomplete="off" autofill="off"/>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="loginPassword">Jelszó</label>
                  <input type="password" id="loginPassword" name="loginPassword" class="form-control" value=""/>
                </div>

                <!-- 2 column grid layout -->
                <div class="row mb-4">
                  <div class="col-md-6 d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check mb-3 mb-md-0">
                      <label class="form-check-label" for="loginCheck"> Emlékezz rám </label>
                      <input class="form-check-input" type="checkbox"  value="" id="loginCheck" name="loginCheck" />
                    </div>
                  </div>

                  <!-- <div class="col-md-6 d-flex justify-content-center">
                    <a href="#!"> Elfelejtette?</a>
                  </div> -->
                </div>

                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Bejelentkezés</button>

                <!-- Register buttons -->
                <div class="text-center">
                  <p>Nincs fiókja? <a href="#" onclick="clickOnRegister()">Regisztráció</a></p>
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
              <form action="" method="post" >
                  <input type="hidden" name="formType" value="register"/>

                <!-- Username input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="registerUsername">Felhasználónév *</label>
                  <input type="text" id="registerUsername" name="registerUsername" class="form-control" />
                </div>

                <!-- Name input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="registerName">Teljes név *</label>
                  <input type="text" id="registerName" name="registerName" class="form-control" />
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="registerEmail">Email *</label>
                  <input type="email" id="registerEmail" name="registerEmail" class="form-control" />
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="registerEmail">Telefonszám *</label>
                  <input type="text" id="registerPhone" name="registerPhone" class="form-control" />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="registerPassword">Jelszó *</label>
                  <input type="password" id="registerPassword" name="registerPassword" class="form-control" />
                </div>

                <!-- Repeat Password input -->
                <div class="form-outline mb-4"></div>
                <div class="form-outline mb-4">
                  <label class="form-label" for="registerRepeatPassword">Jelszó ismétlése *</label>
                  <input type="password" id="registerRepeatPassword" name="registerRepeatPassword" class="form-control" />
                </div>

                <!-- Checkbox -->
                <div class="form-check mb-4">
                  <label class="form-check-label" for="registerCheck">
                    <span>Elolvastam a <a target="_blank" href="https://docs.google.com/document/d/1xSd9fAG6mzXtN14ZYJXUloFGvMVCQPxP/edit?usp=share_link&ouid=111432240287431856404&rtpof=true&sd=true">szerződési feltételeket</a></span>
                  </label>
                  <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck"
                    aria-describedby="registerCheckHelpText" />
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-3">Regisztráció</button>
              </form>
            </div>
          </div>
          <!-- Pills content -->
        </div>
      </div>
    </div>
  </div>
  <!-- Team End -->



<?php require_once(__DIR__.'/footer.php'); ?>
<?php require_once(__DIR__.'/scripts.php'); ?>

<script>
    const tabLogin = document.getElementById("tab-login");
    const tabRegister = document.getElementById("tab-register");
    tabLogin.addEventListener("click", () => {
      const registerBlock = document.getElementById("pills-register");
      const loginBlock = document.getElementById("pills-login");
      tabRegister.classList.remove("active");
      tabLogin.classList.add("active");
      registerBlock.classList.remove("show", "active");
      loginBlock.classList.add("show", "active");
    });
    tabRegister.addEventListener("click", () => {
      const registerBlock = document.getElementById("pills-register");
      const loginBlock = document.getElementById("pills-login");
      tabLogin.classList.remove("active");
      tabRegister.classList.add("active");
      loginBlock.classList.remove("show", "active");
      registerBlock.classList.add("show", "active");
    });
</script>

</body>
