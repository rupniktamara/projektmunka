<?php $title = 'Home'; ?>
<?php $metaTags = 'tag1 tag2'; ?>
<?php $currentPage = 'index'; ?>
<?php require_once(__DIR__.'/head.php'); ?>
<?php require_once(__DIR__.'/navbar.php'); ?>
<?php include('./phphelpers/helpers.php'); ?>
<?php include('./phphelpers/sendMail.php'); ?>

<body>
<?php includeWithVariables(__DIR__.'/heading.php', array('pagename' => 'Eseményeink')); ?>

<?php
include('./phphelpers/mysqlOps.php');
$mysqli = connectDB();
$sql = "select * from Events";
$result = dbOp_select($mysqli, $sql, "");
$success = false;

$eventID = isset($_REQUEST["eventid"]) ? $_REQUEST["eventid"] : "";
$name = isset($_REQUEST["name"]) ? $_REQUEST["name"] : "";
$email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : "";
$phone = isset($_REQUEST["phone"]) ? $_REQUEST["phone"] : "";
$people = isset($_REQUEST["people"]) ? $_REQUEST["people"] : "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_REQUEST['submitted']) && "OK" == $_REQUEST['submitted']) {
        $sql = "insert into EventCandidates (eventID, name, email, phone, people, regdate) 
                  values ( ?, ?, ?, ?, ?, now())";
        dbOp_insert($mysqli, $sql, "sssss", $eventID, $name, $email, $phone, $people);
        $sql = "update Events set availmax = availmax - ?  where id = ?";
        dbOp_update($mysqli, $sql, "ss", $people, $eventID);
    }
    $success = true;

    $sql = "select title from Events WHERE id = ?";
    $result = dbOp_select($mysqli, $sql, "s", $eventID);

    $eventName = $result[0]['title'];
    $msg = "Kedves $name!</br></br>Sikeresen leadtad az időpontfoglalást az alábbi eseményre: $eventName</br></br>Baloo Állatmenhely";

    sendMail($email, "Sikeres foglalás!", $msg);
}

$mysqli->close();

?>
<!-- Courses Start -->
<div class="container-xxl py-5">
    <div class="container">
        <?php if (!$success) { ?>
            <div id="regcontainer">
                <div id="reg" class=registration" >
                    <form action="" method="post">
                        <input type="hidden" name="submitted" value="OK">
                        <div class="regtitle">Online foglalás - <span id="regparam"></span></div>
                        <input type="hidden" id="eventid" name="eventid" value="">
                        <label class="form-label" for="name">Név *</label>
                        <input type="text" name="name" id="name" class="form-control">
                        <label class="form-label" for="email">Email *</label>
                        <input type="text" name="email" id="email" class="form-control">
                        <label class="form-label" for="phone">Telefon</label>
                        <input type="text" name="phone" id="phone" class="form-control">
                        <label class="form-label" for="people">Hány főre?</label>
                        <select class="form-select" id="people" name="people">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <div id="regbuttons">
                            <button type="submit" class="btn btn-primary">Foglalás</button>
                            <button type="button" onclick="hideReg()" class="btn btn-primary">Mégse</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Eseményeink</h6>
                <h1 class="mb-5">Közelgő események</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <?php foreach ($result as &$value) {
                    $timestr = is_null($value['timefrom']) ? $value['datenote'] : substr($value['timefrom'], 0, 5) . "-" . substr($value['timeto'], 0, 5);
                    $dateto = is_null($value['dateto']) ? "" : $value['dateto'] . '-ig';
                    ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src="img/<?=$value["picture"]?>" alt="">
                                <?php if ($value['online'] == 1) { ?>
                                    <button onclick="showReg('<?=$value['title']?>', '<?=$value['id']?>')" class="btn btn-primary onlineevent">Regisztráció</button>
                                <?php } ?>
                            </div>
                            <div class="text-center p-4 pb-0">
                                <h3 class="mb-0"><?=$value['title']?></h3>
                                <h5 class="mb-4"><?=$value['datefrom']?>-tól <br> <?=$value['datenote']?> <br> <?=$value['pricetext']?></h5>

                                <h5 class="mb-4"><?=$value['note']?></h5>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-user-tie text-primary me-2"></i><?=$value['host']?></small>
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-clock text-primary me-2"></i><?=$timestr?></small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i><?=$value['availmax']?> hely
                                    maradt</small>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else {?>
            <h3>A  regisztráció az eseményre sikeres! Köszönjük! Szeretettel várjuk!</h3>
            <script>
                setTimeout(() => {
                    window.location.href = "esemeny.php";
                }, 5000);
            </script>
        <?php }?>
    </div>
</div>
<!-- Courses End -->
<script>
    function showReg(regparam, eventid) {
        document.getElementById("regcontainer").style.display = 'block';
        document.getElementById("reg").style.display = 'flex';
        document.getElementById("regparam").innerText = regparam;
        document.getElementById("eventid").value = eventid;
    }

    function hideReg() {
        document.getElementById("regcontainer").style.display = 'none';
        document.getElementById("reg").style.display = 'none';
    }

</script>
<?php require_once(__DIR__.'/footer.php'); ?>
<?php require_once(__DIR__.'/scripts.php'); ?>
</body>