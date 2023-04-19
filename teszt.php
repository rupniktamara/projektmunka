<?php $title = 'Home'; ?>
<?php $metaTags = 'tag1 tag2'; ?>
<?php $currentPage = 'index'; ?>
<?php require_once(__DIR__.'/head.php'); ?>
<?php require_once(__DIR__.'/navbar.php'); ?>
<?php include('./phphelpers/helpers.php'); ?>

<body>
<?php includeWithVariables(__DIR__.'/heading.php', array('pagename' => 'Tesztek')); ?>
<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="section-title bg-white text-center text-primary px-3" style="margin-bottom: 4em;">Kutya teszt
        </h6>
    </div>
    <!-- Kutya Start -->
    <div class="container-xxl py-5 forditott">

        <div class="container">

            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/teszt_k.jpg" alt=""
                            style="object-fit: cover;">
                    </div>
                </div>
                <Itt class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s" style="color: white;">
                    <h1 class="mb-4" style="color: #A9927D;">Milyen kutya illik hozzád?</h1>
                    <p class="mb-4">Nem tudod milyen kutyafajta illik hozzád? Nem tudod melyik kutyánkat válaszd?<br>
                        Itt a lehetőség kideríteni!
                    </p>
                    <p class="mb-4">Töltsd ki a tesztünk, mi meg majd felvesszük veled a kapcsolatot és majd együtt
                        megkeressük neked a legjobb választást.</p>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="https://forms.gle/brno3W8aDV35nd1T6"
                        target="_blank">Teszt
                        kitöltése</a>
            </div>
        </div>
    </div>
    </div>
    <!-- Kutya End -->



    <!-- Cica Start -->
    <div class="container-xxl py-5 ">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3" style="margin-bottom: 4em;">Macska teszt
            </h6>
        </div>

        <div class="container">

            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/teszt_c.jpg" alt=""
                            style="object-fit: cover;">
                    </div>
                </div>
                <Itt class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-4" style="color: #A9927D;">Milyen macska illik hozzád?</h1>
                    <p class="mb-4">Nem tudod milyen macska illik hozzád? Nem tudod melyik macskánkat válaszd?<br>
                        Itt a lehetőség kideríteni!
                    </p>
                    <p class="mb-4">Töltsd ki a tesztünk, mi meg majd felvesszük veled a kapcsolatot és majd együtt
                        megkeressük neked a legjobb választást.</p>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="https://forms.gle/BcV2Kq4DRuriDmC98"
                        target="_blank">Teszt
                        kitöltése</a>
            </div>
        </div>
    </div>
    </div>
    <!-- Cica End -->

<?php require_once(__DIR__.'/footer.php'); ?>
</body>