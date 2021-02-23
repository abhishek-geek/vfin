<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "vfin";
//Create a connection
$link = mysqli_connect($servername, $username, $password, $database);

if (!$link) {
    die("Sorry we failed to connect: " . mysqli_connect_error());
}
