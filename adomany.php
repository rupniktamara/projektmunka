  
<?php $title = 'Adomány'; ?>
<?php $metaTags = 'tag1 tag2'; ?>
<?php $currentPage = 'index'; ?>
<?php require_once(__DIR__.'/head.php'); ?>
<?php require_once(__DIR__.'/navbar.php'); ?>
<?php include('./phphelpers/helpers.php'); ?>
<?php include('./phphelpers/mysqlOps.php'); ?>
<?php include('./phphelpers/sendMail.php'); ?>
<?php
$mysqli = connectDB();
$success = false;
$error = '';

$veznev = isset($_REQUEST["veznev"]) ? $_REQUEST["veznev"] : "";
$kernev = isset($_REQUEST["kernev"]) ? $_REQUEST["kernev"] : "";
$email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : "";
$phone = isset($_REQUEST["phone"]) ? $_REQUEST["phone"] : "";
$freq = isset($_REQUEST["freq"]) ? $_REQUEST["freq"] : "";
$note = isset($_REQUEST["note"]) ? $_REQUEST["note"] : "";
$amount = isset($_REQUEST["amount"]) ? $_REQUEST["amount"] : "";

$error = '';

if ( $veznev == '' || 
     $kernev == '' ||
     $email == '' ||
     $phone == '' ||
     $freq == '' ||
     $note == '' ||
     $amount == '') {
      $error = 'A csillaggal jelölt mezők kitöltése kötelező!';
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (isset($_REQUEST['submitted']) && "OK" == $_REQUEST['submitted']) {
        $sql = "insert into Donation (veznev, kernev, email, phone, freq, note, amount, donation_date) 
                values ( ?, ?, ?, ?, ?, ?, ?, now())";
        dbOp_insert($mysqli, $sql, "sssssss", $veznev, $kernev, $email, $phone, $freq, $note, $amount);
        $success = true;
        $msg = "Kedves $kernev!</br></br>Köszönjük, hogy adományoztál!</br></br>Adomány részletei:<table><tr><td>Név:</td><td>$veznev $kernev</td></tr><tr><td>Telefonszámv:</td><td>$phone</td></tr><tr><td>Összeg:</td><td>$amount Ft</td></tr></table></br>Baloo alapítvány";
        sendMail($email, "Sikeres adományozás", $msg);
      }
    }
}
?>
  <body>
    <?php includeWithVariables(__DIR__.'/heading.php', array('pagename' => 'Adományozás')); ?>
    <?php if (!$success) { ?>
      <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
          <div class="container ftext">
              <form action="#" method="post">
              <input type="hidden" name="submitted" value="OK">
                  <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center text-primary px-3">Adomány adatok</h6>
                  </div>
                    <div class="row justify-content-md-center">
                      <div class="col-12 col-md-4">
                        <label for="veznev" class="form-label">Vezetéknév *</label>
                        <input type="text" class="form-control" id="veznev" name="veznev">
                      </div>
                      <div class="col-12 col-md-4">
                        <label for="kernev" class="form-label">Keresztnév *</label>
                        <input type="text" class="form-control" id="kernev" name="kernev">
                      </div>
                    </div>
                    <div class="form-spacing row  justify-content-md-center">
                      <div class="col-12  col-md-4">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" class="form-control" id="email" name="email">
                      </div>
                      <div class="col-12  col-md-4">
                        <label for="telnum" class="form-label">Telefon *</label>
                        <input type="tel" class="form-control" id="phone" name="phone">
                      </div>
                    </div>
                    <div class="form-spacing row  justify-content-md-center">
                      <div class="col-12 col-md-8">
                        <label class="form-label">Adományozás fajtája *</label>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="freq" id="freq1" value=0>
                        <label class="form-check-label" for="freq1">
                          Egyszeri
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="freq" id="freq2" value=1 checked>
                        <label class="form-check-label" for="freq2">
                          Rendszeres
                        </label>
                      </div>                      
                    </div>
                    </div>
                    <div class="form-spacing row  justify-content-md-center">
                      <div class="col-12 col-md-8">
                        <label for="note" class="form-label">Megjegyzés</label>
                        <textarea class="form-control" id="note" name="note" rows="6" style="resize: none;">
                        </textarea>
                      </div>
                    </div>
                    <div class="form-spacing row  justify-content-md-center">
                      <div class="col-12 col-md-8">
                        <label for="amount" class="form-label">Adomány összege *</label>
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="pl. 15000">
                      </div>
                    </div>
                    <div class="fiktiv">
                      <div class="form-spacing row  justify-content-md-center">
                        <div class="col-12 col-md-8">Fizess bankkártyával (<span class="bank">Fejlesztés! </span>Bankkártya elfogadó szolgáltatás használata ehelyett)</div>
                      </div>
                      <div class="form-spacing row  justify-content-md-center">
                        <div class="col-12  col-md-4">
                          <label for="veznevcard" class="form-label">Vezetéknév *</label>
                          <input disabled type="text" class="form-control" id="veznevcard">
                        </div>
                        <div class="col-12  col-md-4">
                          <label for="kernevcard" class="form-label">Keresztnév *</label>
                          <input disabled type="text" class="form-control" id="kernevcard">
                        </div>
                      </div>
                      <div class="form-spacing row  justify-content-md-center">
                        <div class="col-5 col-md-4">
                          <label for="bankcard" class="form-label">Bankkártya szám *</label>
                          <input disabled type="text" class="form-control" id="bankcard">
                        </div>
                        <div class="col-3 col-md-2">
                          <label for="cvccode" class="form-label">CVC kód *</label>
                          <input disabled type="text" class="form-control" id="cvccode">
                        </div>
                        <div class="col-4 col-md-2">
                          <label for="expirydate" class="form-label">Lejárati dátum *</label>
                          <input disabled type="text" class="form-control" id="expirydate">
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="form-spacing row  justify-content-md-center">
                      <div class="col-12 col-md-8">
                        <button type="submit" class="btn btn-primary">Fizetés</button>
                      </div>
                    </div>
              </form>
          </div>
        </div>
        <?php } else {?>
            <h3>Az adomány befizetése sikeres! Köszönjük!</h3>
            <script>
              setTimeout(() => {
                window.location.href = "index.php";
              }, 5000);
            </script>
        <?php }?>        
        <?php require_once(__DIR__.'/footer.php'); ?>        
        <?php require_once(__DIR__.'/scripts.php'); ?>
  </body>
