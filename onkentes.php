<?php $title = 'Home'; ?>
<?php $metaTags = 'tag1 tag2'; ?>
<?php $currentPage = 'index'; ?>
<?php require_once(__DIR__.'/head.php'); ?>
<?php require_once(__DIR__.'/navbar.php'); ?>
<?php include('./phphelpers/helpers.php'); ?>

<body>
<?php includeWithVariables(__DIR__.'/heading.php', array('pagename' => 'Önkénteskedés')); ?>
    <!-- Onkentes Start -->
    <div class="container-xxl py-5 forditott">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
          <div class="position-relative h-100">
            <img class="img-fluid position-absolute w-100 h-100" src="img/onkentes.jpeg" alt="" style="object-fit: cover;">
          </div>
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s" style="color: white;">
          <h6 class="section-title text-start text-primary pe-3 " style="color: white !important;">Szabályok</h6>
          <h1 class="mb-4" style="color: #A9927D;">Önkéntesi feladatok, feltételek</h1>
          <p class="mb-4">Ha eszébe jutott már az, hogy önkéntesi munkát szeretne végezni állatok társaságában, akkot itt a helye. Önkéntesnek lenni nagy feladat és sok felelősséggel jár, ezért megszabtunk pár szabályt ennek érdekében, hogy nyugodt szívvel bízhassuk rá az állatainkat.</p>
          <p class="mb-4">Ha jelentkezni szeretne az alul lévő gombbal tudja megtenni. Fontos megjegyezni, hogy miután leadta a jelentkezését felkeressük telefonon és részt kell vennie egy önkéntes tanfolyamon, ahol betanítjuk az alapokat, illetve szabályokat.
          </p>
          <a class="btn btn-primary py-3 px-5 mt-2" href="https://forms.gle/ryZssLJy8dGZLk5TA" target="_blank">Jelentkezés itt</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Onkentes End -->


    <!-- questins Start -->
    <div class="container-xxl py-5">
        <div class="container">
          <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3" style="margin-bottom: 4em;">Gyakran feltett kérdések</h6>
          </div>
          <div class="accordion w-100" id="basicAccordion">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#basicAccordionCollapseOne" aria-expanded="false" aria-controls="collapseOne">
                  Mi a minimum életkor a jelentkezéshez?
                </button>
              </h2>
              <div id="basicAccordionCollapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                data-bs-parent="#basicAccordion">
                <div class="accordion-body">
                  Általában a 18. életévet be kell tölteni, ahhoz hogy hosszútávon itt önkénteskedhess, de vannak kivételek. Ilyen esetben szülő hozzájárulási nyilatkozatot kérünk, amit a képzés elején fogunk elkérni.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#basicAccordionCollapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Mennyi időre jelentkezhetek?
                </button>
              </h2>
              <div id="basicAccordionCollapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#basicAccordion">
                <div class="accordion-body">
                  Teljes mértékben tőled függ. Sok önkéntesünk úgy jelentkezett, hogy az elején csak hónapokra szeretett volna jönni és évek lettek belőle.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#basicAccordionCollapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Az érettségihez kötelezően ledolgozott 50 órában mehetek hozzátok?
                </button>
              </h2>
              <div id="basicAccordionCollapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#basicAccordion" >
                <div class="accordion-body">
                  Egyelőre sajnos még nincs lehetőségünk leigazolni nektek az 50 órát, de a közeljövőben igyekszünk ezt megoldani.
                </div>
              </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#basicAccordionCollapseFour" aria-expanded="false" aria-controls="collapseThree">
                  Napi hány órát lehet nálatok önkénteskedni és a hét melyik napján?
                </button>
              </h2>
              <div id="basicAccordionCollapseFour" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#basicAccordion" >
                <div class="accordion-body">
                  Ez a bekerült állatok mennyiségétől függ. A beosztást mindig előre egy héttel tudjátok meg, ami kb. 3-8 órát tartalmaz. Egyes esetekben pedig több vagy kevesebb időt is kíván.
                </div>
              </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#basicAccordionCollapseFive" aria-expanded="false" aria-controls="collapseThree">
                  Bármikor abba lehet hagyni?
                </button>
              </h2>
              <div id="basicAccordionCollapseFive" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#basicAccordion" >
                <div class="accordion-body">
                  Természetesen igen. Önkénteskedés felmondása előtt egy héttel jelezni kell a vezető önkéntessel és vele megbeszélitek a továbbiakat.
                </div>
              </div>
            </div>
          </div>
         
    
          </div>
        </div>
      </div>
      </div>
      <!-- Service End -->
  <!-- questions End -->

<?php require_once(__DIR__.'/footer.php'); ?>
<?php require_once(__DIR__.'/scripts.php'); ?>
</body>