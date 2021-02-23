<?php

session_start();

if (!isset($_SESSION['IS_AUTHENTICATED']) || $_SESSION['IS_AUTHENTICATED'] != true) {
    header("location: login.php");
    exit;
}
?>
<?php
//session_start();
include "dbconnect.php";
$vid = $_POST['seize'];
// $qry1 = 'INSERT INTO seized VALUES ("' . $vid . '", "' . $_SESSION['EMAIL'] . '", "' . date("Y-m-d", time()) . '" ;';
$qry1 = 'INSERT INTO `seized` (`v_id`, `email`, `date`) VALUES ("' . $vid . '", "' . $_SESSION['EMAIL'] . '", "' . date("Y-m-d", time()) . '");';
$result1 = mysqli_query($link, $qry1);
include "seized.php";
