<?php $title = 'Home'; ?>
<?php $metaTags = 'tag1 tag2'; ?>
<?php $currentPage = 'index'; ?>
<?php require_once(__DIR__.'/head.php'); ?>
<?php require_once(__DIR__.'/navbar.php'); ?>
<?php include('./phphelpers/helpers.php'); ?>

<body>
<?php includeWithVariables(__DIR__.'/heading.php', array('pagename' => 'Macskák')); ?>

<?php 
    include('./phphelpers/mysqlOps.php');
    $mysqli = connectDB();
    // $q = '';
    // if (array_key_exists('q', $_REQUEST)) {
    //   $q = $_REQUEST["q"];
    // }
    $q = "";
    $filter = '';
    $result = '';
    $kind = "Cat";
    $sql = 'select * from (select *, TIMESTAMPDIFF(year, ' . $kind . '_birth, Now()) Y, 
      case 
          when TIMESTAMPDIFF(year, ' . $kind . '_birth, Now()) = 0 then TIMESTAMPDIFF(month, ' . $kind . '_birth, Now()) 
          else NULL 
      end M from ' . $kind . 's) ' . $kind .  'list where true = true ';
    
    $color = isset($_REQUEST['color']) ? $_REQUEST['color'] : "-1";
    $colorfilter =  $color == "-1"  ? "" : " and Cat_color = '" . $color . "'";

    $age = isset($_REQUEST['age']) ? $_REQUEST['age'] : "-1";
    $agefilter = '';
    if ($age == "-1") {
      $agefilter = "";
    } else if ($age == "0") {
      $agefilter = " and Y = 0 ";
    } else if ($age == "1") {
      $agefilter = " and Y between 1 and 2 ";
    } else if ($age == "2") {
      $agefilter = " and Y between 2 and 4 ";
    } else if ($age == "3") {
      $agefilter = " and Y > 4 ";
    }

    $sex = isset($_REQUEST['sex']) ? $_REQUEST['sex'] : "-1";
    $sexfilter = '';

    if ($sex == "Kandúr") {
      $sexfilter = " and Cat_sex like 'Kandúr%'";
    } else if ($sex == "Nőstény") {
      $sexfilter = " and Cat_sex like 'Nőstény%'";
    }

    $castr = isset($_REQUEST['castr']) ? $_REQUEST['castr'] : "-1";
    $castrfilter = '';

    if ($castr != "-1") {
      $castrfilter = " and Cat_castrated = " . $castr ;
    }


    if (isset($_REQUEST['clearfilter']) && "true" == $_REQUEST['clearfilter']) {
      $color = "-1";
      $colorfilter = '';
      $age = "-1";
      $agefilter = '';
      $sex = "-1";
      $sexfilter = '';
      $castr = '-1';
      $castrfilter = '';
    }

    // if ($q != '') {
    //   $sql = "select * from Cats where Cat_color like ?";
    //   $result = dbOp_select($mysqli, $sql, "s", $q);
    // } else {
    //   $sql = "select * from Cats ";
    // }

    $sql .= $colorfilter;
    $sql .= $agefilter;
    $sql .= $sexfilter;
    $sql .= $castrfilter;
      // echo $sql;
    $result = dbOp_select($mysqli, $sql, "");
    $now = new DateTime("now");
    ?>

    <div id="filter" class="filter">
      <div class="heading">Szűrők</div>
      <form action="" id="filterForm" method="post">
        <input type="hidden" id="clearfilter" name="clearfilter" value="false">
        <div class="filterline">
          <label for="color">Szín</label>
          <select name="color" id="color" class="form-select">
          <option value="-1">Válasszon...</option>
          <?php foreach (getColorFilter($mysqli, "Cat") as &$value) { 
            $colorselected = $value['Cat_color'] == $color ? 'selected' : ''; ?>
            <option <?=$colorselected?> value="<?=$value['Cat_color']?>"><?=$value['Cat_color']?></option>
          <?php } ?>
          </select>
        </div>
        <div class="filterline">
          <label for="age">Kor</label>
          <select name="age" id="age" class="form-select">
            <option <?=$age == -1 ? 'selected' : ''?> value="-1">Válasszon...</option>
            <option <?=$age == 0 ? 'selected' : ''?> value="0">< 1 év</option>
            <option <?=$age == 1 ? 'selected' : ''?> value="1">1-2 év</option>
            <option <?=$age == 2 ? 'selected' : ''?> value="2">2-4 év</option>
            <option <?=$age == 3 ? 'selected' : ''?> value="3">> 4 év</option>
          </select>
        </div>
        <div class="filterline">
          <label for="sex">Nem</label>
          <select name="sex" id="sex" class="form-select">
            <option <?=$sex == -1 ? 'selected' : ''?> value="-1">Válasszon...</option>
            <option <?=$sex == 'Kandúr' ? 'selected' : ''?> value="Kandúr">Kandúr</option>
            <option <?=$sex == 'Nőstény' ? 'selected' : ''?> value="Nőstény">Nőstény</option>
          </select>
        </div>
        <div class="filterline">
          <label for="castr">Ivaros</label>
          <select name="castr" id="castr" class="form-select">
            <option <?=$castr == -1 ? 'selected' : ''?> value="-1">Válasszon...</option>
            <option <?=$castr == 0 ? 'selected' : ''?> value="0">Ivaros</option>
            <option <?=$castr == 1 ? 'selected' : ''?> value="1">Ivartalanított</option>
          </select>
        </div>
        <button type="submit" class="col-12 py-1 btn btn-warning btn-block text-center text-black">Szűrés</button>
        <button onclick="clearFilter()" class="col-12 py-1 btn btn-warning btn-block text-center text-black">Szűrés törlése</button>
        </form>

    </div>
    
    <div class="animals container-fluid">
    <?php foreach ($result as &$value) { 
      $goidopont = getLoggedUser() != "" ? "idopont.php?kind=macska&name=" . $value['Cat_name'] : "reg_log.php?kind=macska&name=" . $value['Cat_name'];
      $bdate = date_create($value['Cat_birth']);
      $age = date_diff($now, $bdate)->format('%y');
      if ($age < 1) {
        $age = date_diff($now, $bdate)->format('%m hónapos');
      } else {
        $age = $age . ' éves';
      }
    ?>
      <a class="card" href="<?=$goidopont?>">
        <img class="animalimage" src="img/cica/cat_<?=$value['Cat_ID']?>.jpg" />
        <div class="animalname"><?=$value['Cat_name']?></div>
        <div class="animalsex"><?=$value['Cat_sex']?></div>
        <div class="animalage"><?=$age?></div>
        <?php if($value['Cat_castrated']  == 1) {?>
          <div class="castrated">Ivartalanított</div>
        <?php } ?>
      </a>
    <?php } ?>
    </div>
<script>
  function showFilter() {
    const filterBox = document.getElementById("filter");

    filterBox.style.display = "block";
  }

  function clearFilter() {
    document.getElementById("clearfilter").value = "true";
    document.getElementById("filterForm").submit();
  }

</script>
<?php require_once(__DIR__.'/footer.php'); ?>
<?php require_once(__DIR__.'/scripts.php'); ?>
</body>