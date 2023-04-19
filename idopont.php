<?php $title = 'Home'; ?>
<?php $metaTags = 'tag1 tag2'; ?>
<?php $currentPage = 'index'; ?>
<?php require_once(__DIR__ . '/head.php'); ?>
<?php require_once(__DIR__ . '/navbar.php'); ?>
<?php include('./phphelpers/helpers.php'); ?>
<?php include('./phphelpers/mysqlOps.php'); ?>
<?php include('./phphelpers/sendMail.php'); ?>
<?php
$mysqli = connectDB();
$success = false;
$name = "";
if (isset($_REQUEST['kind'])) {
  $specheight = 800;
  $kind = $_REQUEST['kind'];
  $name = $_REQUEST['name'];
} else {
  $specheight = 750;
}

if (($loggedUser = getLoggedUser()) == "") {
  header("Location: reg_log.php?kind=time");
} else {
  $sql = "select Users_ID, Users_email, Users_name, Users_phone from Users where Users_username = ?";
  $result = dbOp_select($mysqli, $sql, "s", $loggedUser);
  $fullname = $result[0]['Users_name'];
  $email = $result[0]['Users_email'];
  $phone = $result[0]['Users_phone'];
  $userID = $result[0]['Users_ID'];
}
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_REQUEST['submitted']) && "OK" == $_REQUEST['submitted'] && ($_REQUEST['date'] == '' || $_REQUEST['time'] == '')) {
    $error = "A dátum és kívánt időpont kitöltése kötelező!";
  } else {
    $sql = "insert into Bookings (user_ID, Date) values ( ?, ?)";
    dbOp_insert($mysqli, $sql, "ss", $userID, $_REQUEST['date'] . ' ' . $_REQUEST['time'] . ':00:00');
    $datetime = $_REQUEST['date'] . ' ' . $_REQUEST['time'];
    $msg = "Kedves $fullname!</br></br>A foglalásod sikeres volt!</br></br>Foglalás időpontja: $datetime óra </br></br>Baloo alapítvány";
    sendMail($email, "Sikeres időpontfoglalás", $msg);
    $success = true;
  }
}
?>

<body>
  <?php includeWithVariables(__DIR__ . '/heading.php', array('pagename' => 'Időpont foglalás')); ?>
  <!-- Contact Start -->
  <div class="container" style="
    height: <?php echo $specheight; ?>px;
">
    <!-- <div class="container"> -->
    <?php if (!$success) { ?>

      <form action="" method="post">
        <input type="hidden" name="submitted" value="OK">
        <div class="banner3">
          <div class="py-7 banner idopont" style="background-image: url(img/idopont.jpeg);">
            <div class="container">
              <div class="row">
                <div class="col-md-7 col-lg-5">

                  <div class="bg-white idopont">
                    <div class="form-row ">
                      <div class="px-4 py-2 left border-right w-100">
                        <label class="form-label ">Teljes név</label>
                        <input type="text" name="fullname" class="form-control" disabled value="<?= $fullname ?>" />
                      </div>
                    </div>
                    <div class="form-row px-4 py-2">
                      <label class="form-label ">Email Cím</label>
                      <input type="text" name="email" class="form-control" disabled value="<?= $email ?>" />
                    </div>
                    <div class="form-row px-4 py-2">
                      <label class="form-label ">Telefonszám</label>
                      <input type="text" name="phone" class="form-control" disabled value="<?= $phone ?>" />
                    </div>
                    <?php if ($name != "") { ?>
                      <div class="form-row px-4 py-2">
                        <div class="form-label ">A következő
                          <?= $kind ?> érdekel elsősorban: <span class="fw-semi-bold">
                            <?= $name ?>
                          </span>
                        </div>
                      </div>
                    <?php } ?>
                    <div class="form-row px-4 py-2 position-relative">
                      <label class="form-label ">Foglaljon időpontot *</label>
                      <div class="input-group date">
                        <input type="date" name="date" class="form-control" id="dp" />
                      </div>
                    </div>
                    <div class="form-row px-4 py-4">
                      <label class="form-label ">Adja meg, hogy a kiválasztott napon melyik órában ér rá *</label>
                      <select name="time" id="time" class="form-select">
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                      </select>
                    </div>
                    <?php if ($error != '') { ?>
                      <div class="error form-row px-4 py-1">
                        <?= $error ?>
                      </div>
                    <?php } ?>
                    <div class="form-row px-4 py-4">
                      <p><i>A kiválasztott napon/időpontban mindegyik örökbe fogadható állatot meg tudja tekinteni. A
                          rendelkezésére álló időkeret egy akalommal 2 óra.</i></p>
                    </div>
                    <div class="form-row px-4">
                      <button type="submit"
                        class="m-0  py-4 font-14 font-weight-medium btn btn-danger-gradiant btn-block position-relative rounded-0 text-center text-white text-uppercase">
                        Időpont lefoglalása
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    <?php } else {?>

      <h3>Az időpont foglalás sikeres!</h3>
      <script>
        setTimeout(() => {
          window.location.href = "index.php";
        }, 5000);
      </script>
    <?php }?>
    
  </div>

  <?php require_once(__DIR__ . '/footer.php'); ?>
  <?php require_once(__DIR__ . '/scripts.php'); ?>
</body>