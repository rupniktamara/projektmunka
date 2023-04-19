<?php $title = 'Home'; ?>
<?php $metaTags = 'tag1 tag2'; ?>
<?php $currentPage = 'index'; ?>
<?php require_once(__DIR__.'/head.php'); ?>
<?php require_once(__DIR__.'/navbar.php'); ?>
<?php include('./phphelpers/helpers.php'); ?>
<?php include('./phphelpers/sendMail.php'); ?>

<?php
$name = isset($_REQUEST["name"]) ? $_REQUEST["name"] : "";
$email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : "";
$subject = isset($_REQUEST["subject"]) ? $_REQUEST["subject"] : "";
$message = isset($_REQUEST["message"]) ? $_REQUEST["message"] : "";
$success = false;
if ($name == '' ||
    $email == '' ||
    $subject == '' ||
    $message == '') {
    $error = 'A csillaggal jelölt mezők kitöltése kötelező!';
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $success = true;
        $msg = "Üzenet érkezett a weboldalon keresztül!</br></br><table><tr><td>Név:</td><td>$name</td></tr><tr><td>E-mail:</td><td>$email</td></tr><tr><td>Tárgy:</td><td>$subject</td></tr><tr><td>Üzenet:</td><td>$message</td></tr></table>";
        sendMail($email, "Oldalon küldött üzenet", $msg);
    }
}
?>

<body>
<?php includeWithVariables(__DIR__.'/heading.php', array('pagename' => 'Kapcsolat')); ?>
<?php if (!$success) { ?>
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Elérhetőségeink</h6>
                <h1 class="mb-5">Ha kérdésed van..</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h5>Vedd fel velünk a kapcsolatot!</h5>
                    <p class="mb-4">Ha bármi kérdésed van keress minket az alábbi elérhetőségek egyikén vagy írj nekünk
                        üzenetet, amire 24 órán belül válaszolni fogunk.</p>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Helyszín</h5>
                            <p class="mb-0">2141, Csömör, Középhegy u. 76</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Telefonszám</h5>
                            <p class="mb-0">06-11-111-1111</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Email</h5>
                            <p class="mb-0">baloo.alapitvany@gmail.com</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2691.6948171320923!2d19.21478231562443!3d47.57372597918251!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741cff5bf1a3241%3A0x49412077371baf50!2zQ3PDtm3DtnIsIEvDtnrDqXBoZWd5IHUuIDc2LCAyMTQx!5e0!3m2!1sen!2shu!4v1668770029238!5m2!1sen!2shu"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form action="#" method="post">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                                    <label for="name">Teljes név</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                    <label for="email">Email cím</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                                    <label for="subject">Tárgy</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text"class="form-control" placeholder="Leave a message here" id="message" name="message"
                                        style="height: 150px">
                                    <label for="message">Üzenet</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Elküldés</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
<?php } else {?>
    <h3>Köszönjük, hogy írtál nekünk!</h3>
    <script>
        setTimeout(() => {
            window.location.href = "index.php";
        }, 5000);
    </script>
<?php }?>
<?php require_once(__DIR__.'/footer.php'); ?>
    <?php require_once(__DIR__.'/scripts.php'); ?>
</body>