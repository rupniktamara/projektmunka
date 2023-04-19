<?php $title = 'Home'; ?>
<?php $metaTags = 'tag1 tag2'; ?>
<?php $currentPage = 'index'; ?>
<?php require_once(__DIR__.'/head.php'); ?>
<?php require_once(__DIR__.'/navbar.php'); ?>
<?php include('./phphelpers/helpers.php'); ?>

<body>
<?php includeWithVariables(__DIR__.'/heading.php', array('pagename' => 'Kutyák')); ?>

<?php 
    include('./phphelpers/mysqlOps.php');
    $mysqli = connectDB();

    $kind = "Dog";
    $sql = 'select * from (select *, TIMESTAMPDIFF(year, ' . $kind . '_birth, Now()) Y, 
      case 
          when TIMESTAMPDIFF(year, ' . $kind . '_birth, Now()) = 0 then TIMESTAMPDIFF(month, ' . $kind . '_birth, Now()) 
          else NULL 
      end M from ' . $kind . 's) ' . $kind .  'list where true = true ';

      $size = isset($_REQUEST['size']) ? $_REQUEST['size'] : "-1";
      $sizefilter =  $size == "-1"  ? "" : " and Dog_size = '" . $size . "'";
      
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
  
      if ($sex == "Kan") {
        $sexfilter = " and Dog_sex like 'Kan%'";
      } else if ($sex == "Szuka") {
        $sexfilter = " and Dog_sex like 'Szuka%'";
      }
  
      $castr = isset($_REQUEST['castr']) ? $_REQUEST['castr'] : "-1";
      $castrfilter = '';
  
      if ($castr != "-1") {
        $castrfilter = " and Dog_castrated = " . $castr ;
      }

      if (isset($_REQUEST['clearfilter']) && "true" == $_REQUEST['clearfilter']) {
        $size = "-1";
        $sizefilter = '';
        $age = "-1";
        $agefilter = '';
        $sex = "-1";
        $sexfilter = '';
        $castr = '-1';
        $castrfilter = '';
      }

      $sql .= $sizefilter;
      $sql .= $agefilter;
      $sql .= $sexfilter;
      $sql .= $castrfilter;
      

    $result = dbOp_select($mysqli, $sql, "");
    
    
    

    $mysqli->close();

    $now = new DateTime("now");

    //<!-- <?php if ($result.Count() != 0) { 
    $counter = count($result);
    
?>
    
    <div id="filter" class="filter">
      <div class="heading">Szűrők</div>
      <form action="" id="filterForm" method="post">
        <input type="hidden" id="clearfilter" name="clearfilter" value="false">
        <div class="filterline">
          <label for="size">Méret</label>
          <select name="size" id="size" class="form-select">
            <option <?=$size == -1 ? 'selected' : ''?> value="-1">Válasszon...</option>
            <option <?=$size == 'Kicsi' ? 'selected' : ''?> value="Kicsi">Kicsi</option>
            <option <?=$size == 'Közepes' ? 'selected' : ''?> value="Közepes">Közepes</option>
            <option <?=$size == 'Nagy' ? 'selected' : ''?> value="Nagy">Nagy</option>
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
            <option <?=$sex == 'Kan' ? 'selected' : ''?> value="Kan">Kan</option>
            <option <?=$sex == 'Szuka' ? 'selected' : ''?> value="Szuka">Szuka</option>
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

    <?php if ($counter != 0) { ?>    
    <div class="animals container-fluid">
<?php foreach ($result as &$value) { 
    $goidopont = getLoggedUser() != "" ? "./idopont.php?kind=kutya&name=" . $value['Dog_name'] : "./reg_log.php?kind=kutya&name=" . $value['Dog_name'];
    $bdate = date_create($value['Dog_birth']);
    $age = date_diff($now, $bdate)->format('%y');
    if ($age < 1) {
      $age = date_diff($now, $bdate)->format('%m hónapos');
    } else {
      $age = $age . ' éves';
    }
    ?>



      <a class="card" href="<?=$goidopont?>">
        <img class="animalimage" src="img/kutya/dog_<?=$value['Dog_ID']?>.jpg" />
        <div class="animalname"><?=$value['Dog_name']?></div>
        <div class="animalsex"><?=$value['Dog_sex']?></div>
        <div class="animalage"><?=$age?></div>
        <?php if($value['Dog_castrated']  == 1) {?>
          <div class="castrated">Ivartalanított</div>
        <?php } ?>
      </a>
<?php } ?>
</div>

<?php } else { ?>
    <h3 class="animals container-fluid">Sajnos nincs a szűrésnek megfelelő állat!</h3>     
<?php } ?>
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


