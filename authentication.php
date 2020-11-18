// <?php
    // if ($_POST['submit'] == 'Login') {
    //     //Collect POST values 
    //     $uid = $_POST['uid'];
    //     $password = $_POST['password'];
    //     if ($login && $password) {
    //         //Connect to mysqli server 
    //         $link = mysqli_connect('localhost:3306', 'root', '');
    //         //Check link to the mysqli server 
    //         if (!$link) {
    //             die('Failed to connect to server: ' . mysql_error());
    //         }
    //         // Select database 
    //         $db = mysqli_select_db($link, '2019005');
    //         if (!$db) {
    //             die("Unable to select database");
    //         }
    //         //Create query (if you have a Logins table the you can select login id and password from there)
    //         //$qry='SELECT * FROM Logins WHERE login_id = "ABC" AND password = "12345"'; 
    //         //Execute query 
    //         //$result=mysqli_query($qry); 
    //         //Check whether the query was successful or not 
    //         if ($login == 'vfin' && $password == 'vfin') {
    //             ///$count = mysqli_num_rows($result);
    //             $count = 1;
    //         } else {
    //             //Login failed 
    //             include('./index.php');
    //             echo '<center>Incorrect Username or Password !!!<center>';
    //             exit();
    //         }
    //         //if query was successful it should fetch 1 matching record from the table. 
    //         if ($count == 1) {
    //             //Login successful set session variables and redirect to main page. 
    //             session_start();
    //             $_SESSION['IS_AUTHENTICATED'] = 1;
    //             $_SESSION['USER_ID'] = $uid;
    //             header('location:enquiry.php');
    //         } else {
    //             //Login failed 
    //             include('index.php');
    //             echo '<center>Incorrect Username or Password !!!<center>';
    //             exit();
    //         }
    //     } else {
    //         include('index.php');
    //         echo '<center>Username or Password missing!!</center>';
    //         exit();
    //     }
    // } else {
    //     header("location: index.php");
    //     exit();
    // }
    // 
    ?>

<?php

if ($_POST['submit'] == 'login') {
    $uid = $_POST['uid'];
    $pwd = $_POST['password'];
    if ($uid == 'vfin' && $pwd == 'vfin') {
        header('location:enquiry.php');
    }
}

?>