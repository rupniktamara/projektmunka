<?php
include('./phphelpers/mysqlOps.php');

  $mysqli = connectDB();
  $q = '';
  if (array_key_exists('q', $_REQUEST)) {
    $q = $_REQUEST["q"];
  }
  $filter = '';
  $result = '';
  
  if ($q != '') {
    $sql = "select * from Cats where Cat_color like ?";
    $result = dbOp_select($mysqli, $sql, "s", $q);
  } else {
    $sql = "select * from Cats ";
    $result = dbOp_select($mysqli, $sql, "");
  }
  $sql = "select Cat_color from Cats group by Cat_color";
  $result_colors = dbOp_select($mysqli, $sql, "");
  $mysqli->close();

?>

<div class="filter">
  <div>Szűrők</div>
  <div>Szín</div>
</div>
