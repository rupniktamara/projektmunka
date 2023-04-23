<?php $title = 'Home'; ?>
<?php $metaTags = 'tag1 tag2'; ?>
<?php $currentPage = 'index'; ?>
<?php require_once(__DIR__.'/head.php'); ?>
<?php require_once(__DIR__.'/navbar.php'); ?>

<body>
  <!-- Carousel Start -->
  <div class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative">
      <div class="owl-carousel-item position-relative">
        <!-- képek-->
        <img class="img-fluid" src="img/cover.jpg" alt="">
        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
          style="background: rgba(24, 29, 56, .2);">
          <div class="container">
            <div class="row justify-content-start">
              <div class="col-sm-10 col-lg-8">
                <h5 class="text-uppercase mb-3 animated slideInDown szoveg">Adj nekik még egy esélyt</h5>
                <h1 class="display-3 text-white animated slideInDown">Találd meg nálunk <br> életed társát!</h1>
                <p class="fs-5 text-white mb-4 pb-2"></p>
                <a href="#orokbefogadas" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Tudj meg
                  többet</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- Carousel End -->
<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
      <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="section-title bg-white text-center text-primary px-3" style="margin-bottom: 4em;">Szolgáltatások</h6>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
          <a href="./kutyak.php">
            <div  class="service-item text-center pt-3">
              <div id="orokbefogadas" class="p-4">
                <i class="fa fa-3x bi bi-envelope-heart text-primary mb-4"></i>
                <h5 class="mb-3">Örökbefogadás</h5>
                <p>Nézz körül az állatainknál, és válaszd ki a neked legszimpatikusabbat. Ha ez megvolt, bízd csak ránk a
                  többi tennivalót!</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
          <a href="teszt.php">
            <div class="service-item text-center pt-3">
              <div class="p-4">
                <i class="fa fa-3x bi bi-pencil text-primary mb-4"></i>
                <h5 class="mb-3">Teszt kitöltés</h5>
                <p>Választhatsz 2 tesztünk közül, mi pedig segítünk megtalálni neked a tökéletes állatkát a
                  személyiségedhez az eredményeid alapján.</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
          <a href="onkentes.php">
            <div class="service-item text-center pt-3">
              <div class="p-4">
                <i class="fa fa-3x bi bi-chat-left-heart text-primary mb-4"></i>
                <h5 class="mb-3">Önkénteskedés</h5>
                <p>Jelentkezz hozzánk önkéntesnek, hogy te is átéld azt a szeretetet, amit átadnak nekünk, illetve segíts
                  nekünk, hogy a legjobb dolguk legyen az állatoknak! </p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="service-item text-center pt-3">
            <div class="p-4">
              <i class="fa fa-3x bi bi bi-activity text-primary mb-4"></i>
              <h5 class="mb-3">Doktori ellátás <i>(hamarosan elérhető)</i></h5>
              <p>A környék legjobb állatorvosával működünk közre, aki gondoskodik az itt lakókról! <br><br></p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>
  <!-- Service End -->


  <!-- About Start -->
  <div class="container-xxl py-5 forditott">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
          <div class="position-relative h-100">
            <img class="img-fluid position-absolute w-100 h-100" src="img/about.jpg" alt="" style="object-fit: cover;">
          </div>
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s" style="color: white;">
          <h6 class="text-start text-uppercase text-primary pe-3 " style="color: white !important;">Rólunk</h6>
          <h1 class="mb-4" style="color: #A9927D;">Alakulásunk története</h1>
          <p class="mb-4">Alapítványunk 2020 nyarán nyitotta meg a kapuit az árva kutyák/macskák számára. Szerencsére
            hamar megismertek minket és az első nap már hívtak minket egy cica családhoz, akik bajban vannak. Azóta
            rendszeresen teltházzal működünk.</p>
          <p class="mb-4">Próbálunk mindig fejleszteni az Alapítványunkon, hogy minél jobban érezzék magukat az itt
            lakók. A legújabb fejlesztésünk egy medence kialakítása volt a kertbe a melegebb napokra, de még sok projekt
            van még a tarsolyunkban.
          </p>
          <a class="btn btn-primary py-3 px-5 mt-2" href="kapcsolat.php">További információk</a>
        </div>
      </div>
    </div>
  </div>
  <!-- About End -->



  <!-- Testimonial Start -->
  <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
      <div class="text-center">
        <h6 class="section-title bg-white text-center text-primary px-3">Visszaigazolások</h6>
        <h1 class="mb-5">Újdonsült gazdijaink véleménye</h1>
      </div>
      <div class="owl-carousel testimonial-carousel position-relative">
        <div class="testimonial-item text-center">
          <img class="border rounded-circle p-2 mx-auto mb-3" src="img/team.1.jpeg" style="width: 80px; height: 80px;">
          <h5 class="mb-0">Klaudia</h5>
          <p></p>
          <div class="testimonial-text bg-light text-center p-4">
            <p class="mb-0">Ajánlani tudom őket! Nagyon kedvesek, segítőkészek voltak velem. Könnyen megtaláltuk nekem a
              legaranyosabb cicát.</p>
          </div>
        </div>
        <div class="testimonial-item text-center">
          <img class="border rounded-circle p-2 mx-auto mb-3" src="img/team.2.jpeg" style="width: 80px; height: 80px;">
          <h5 class="mb-0">Áron</h5>
          <p></p>
          <div class="testimonial-text bg-light text-center p-4">
            <p class="mb-0">Szerencsém volt ezzel az Alapítvánnyal! Nagyon gyorsan letudták nekem a papírmunkát, hogy
              Pluto a Dán Dog keverék kutyusomat hazavihessem.</p>
          </div>
        </div>
        <div class="testimonial-item text-center">
          <img class="border rounded-circle p-2 mx-auto mb-3" src="img/team.4.jpeg" style="width: 80px; height: 80px;">
          <h5 class="mb-0">Ádám</h5>
          <p></p>
          <div class="testimonial-text bg-light text-center p-4">
            <p class="mb-0">Az elején fogalmam sem volt, hogy melyik macskát fogadjam örökbe a lányomnak, de segítettek
              megtalálni a megfelelőt, és már mindenki imádja a kiscicát!</p>
          </div>
        </div>
        <div class="testimonial-item text-center">
          <img class="border rounded-circle p-2 mx-auto mb-3" src="img/team.3.jpeg" style="width: 80px; height: 80px;">
          <h5 class="mb-0">Zita</h5>
          <p></p>
          <div class="testimonial-text bg-light text-center p-4">
            <p class="mb-0">Önkéntesnek jelentkeztem az Alapítványhoz és minden napomat imádom itt tölteni ezen a
              csendes birtokon, életem legjobb döntése volt!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Testimonial End -->

    <?php require_once(__DIR__.'/footer.php'); ?>
    <?php require_once(__DIR__.'/scripts.php'); ?>
</body>