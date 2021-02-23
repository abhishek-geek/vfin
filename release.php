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
$vid = $_POST['Search'];
// $qry1 = 'INSERT INTO seized VALUES ("' . $vid . '", "' . $_SESSION['EMAIL'] . '", "' . date("Y-m-d", time()) . '" ;';
// $qry1 = 'INSERT INTO `loan` (`due_ammount`) VALUES 0 WHERE v_id = "' . $vid . '";';
$qry1 = 'UPDATE `loan` SET `due_ammount` = 0 WHERE `loan`.`v_id` = "' . $vid . '";';
$result1 = mysqli_query($link, $qry1);

$qry = 'DELETE FROM `seized` WHERE `seized`.`v_id` = "' . $vid . '";';
$result = mysqli_query($link, $qry);

include "seized.php";
