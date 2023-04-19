<?php
session_start();
$loggedUser = "";
if (isset($_SESSION['username'])) {
  $loggedUser = $_SESSION['username'];
}
?>

<nav class="navbar navbar-expand-lg text-light shadow sticky-top p-0">
  <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
    <img src="img/icons8-dog-100.png" alt="logo" class="logo">
    <h2 class="m-2 szoveg logoszoveg">Baloo Állatmenhely</h2>
  </a>
  <div id="hambmenu" class="menu">
    <a href="kutyak.php" class="menu-item">Kutyák</a>
    <a href="macskak.php" class="menu-item">Macskák</a>
    <a href="esemeny.php" class="menu-item">Eseményeink</a>
    <a href="teszt.php" class="menu-item">Tesztek</a>
    <a href="onkentes.php" class="menu-item">Önkénteskedés</a>
    <a href="idopont.php" class="menu-item">Időpont foglalás </a>
    <a href="kapcsolat.php" class="menu-item">Kapcsolat </a>
    <a href="adomany.php" class="menu-item">Adományozás</a>
    <?php if (strpos($_SERVER['REQUEST_URI'], "kutyak") !== false || strpos($_SERVER['REQUEST_URI'], "macskak") !== false) { ?>
      <a onclick="doFilter()" class="menu-item">Szűrő</a>
    <?php } ?>
    <hr>
    <?php if ($loggedUser != "") { ?>
      <a href="profile.php" class="loggeduser menu-item"><span><?php echo $loggedUser ?></span></a>
    <?php } ?>

    <?php if ($loggedUser == "") { ?>
      <a href="reg_log.php" class="login menutext centertext">Bejelentkezés</a>
    <?php } else { ?>
      <a href="logout.php" class="login menutext centertext">Kijelentkezés</a>
    <?php } ?>

  </div>

  <!-- <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button> -->
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto p-4 p-lg-0">
      <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Állataink</a>
        <div class="dropdown-menu fade-down m-0">
          <a href="kutyak.php" class="dropdown-item">Kutyák</a>
          <a href="macskak.php" class="dropdown-item">Macskák</a>
        </div>
      </div>

      <a href="esemeny.php" class="hideatsmaller show nav-item nav-link">Eseményeink</a>
      <a href="teszt.php" class="hideatsmaller show nav-item nav-link">Tesztek</a>
      <a href="onkentes.php" class="hideatsmaller show nav-item nav-link">Önkénteskedés</a>

      <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Rólunk</a>
        <div class="dropdown-menu fade-down m-0">
          <a href="idopont.php" class="dropdown-item">Időpont foglalás </a>
          <a href="kapcsolat.php" class="dropdown-item">Kapcsolat </a>
          <a href="esemeny.php" class="showatsmaller hide dropdown-item">Eseményeink</a>
          <a href="teszt.php" class="showatsmaller hide dropdown-item">Tesztek</a>
          <a href="onkentes.php" class="showatsmaller hide dropdown-item">Önkénteskedés</a>

        </div>
      </div>
      <a href="adomany.php" class="nav-item nav-link">Adományozás</a>

      <?php if ($loggedUser != "") { ?>
        <a href="profile.php" class="nav-item nav-link btn btn-primary py-md-3 px-md-5 me-3 vertical-center"><?php echo $loggedUser ?></a>
      <?php }
      if ($loggedUser == "") { ?>
        <a href="reg_log.php" class="btn btn-primary py-md-3 px-md-4 me-3  vertical-center menutext">Bejelentkezés</a>
      <?php } else { ?>
        <a href="logout.php" class="btn btn-primary py-md-3 px-md-4 me-3  vertical-center menutext">Kijelentkezés</a>
      <?php } ?>
    </div>
  </div>
  <div class="hamburger" onclick="togglehamb()">☰</div>
</nav>


<script>
  function togglehamb() {
    var menu = document.getElementById("hambmenu"); // menu blokk elem
    menu.classList.toggle("hambmenu");
  }

  function doFilter() {
    togglehamb();
    showFilter();
  }

  const setMenu = (e) => {
    const iw = window.innerWidth;
    let tobeHidden;
    let tobeShown;
    if (iw < 1450) {
      tobeHidden = [...document.querySelectorAll(".hideatsmaller")];
      tobeShown = [...document.querySelectorAll(".showatsmaller")];
    }
    if (iw >= 1450) {
      tobeHidden = [...document.querySelectorAll(".showatsmaller")];
      tobeShown = [...document.querySelectorAll(".hideatsmaller")];
    }
    tobeHidden.forEach(elem => {
      elem.classList.remove("show");
      elem.classList.add("hide");
    });
    tobeShown.forEach(elem => {
      elem.classList.remove("hide");
      elem.classList.add("show");
    });
  }

  window.onload = setMenu;

  window.addEventListener("resize", setMenu)
</script>