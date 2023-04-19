<?php
function includeWithVariables($filePath, $variables = array(), $print = true)
{
    $output = NULL;
    if(file_exists($filePath)){
        // Extract the variables to a local namespace
        extract($variables);

        // Start output buffering
        ob_start();

        // Include the template file
        include $filePath;

        // End buffering and return its contents
        $output = ob_get_clean();
    }
    if ($print) {
        print $output;
    }
    return $output;

}

function getLoggedUser() {
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    $loggedUser = "";
    if (isset($_SESSION['username'])) {
      $loggedUser = $_SESSION['username'];
    } 

    return $loggedUser;
}

// filters
function getColorFilter($mysqli, $kind) {
    $sql = "select " . $kind . "_color from " . $kind . "s group by " . $kind . "_color";
    $result_colors = dbOp_select($mysqli, $sql, "");
    return $result_colors;
}


?>