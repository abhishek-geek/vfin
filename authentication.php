<?php

if ($_POST['submit'] == 'login') {
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    if ($email && $pwd) {
        //Connect to mysqli server 
        include "dbconnect.php";
        // Create query (if you have a Logins table the you can select login id and password from there)
        echo $email . "  and  " . $pwd . "<br>";
        // $qry='SELECT * FROM user WHERE email = "$email" AND password = "$pwd"'; 
        $qry='SELECT * FROM user WHERE email ="'. $email.'" AND password = "'.$pwd.'";';
        echo "qry : " . $qry;
        echo var_dump($qry);
        // Execute query 
        $result=mysqli_query($link, $qry);
        // Check whether the query was successful or not 
        $count = mysqli_num_rows($result);
        echo "count : " . $count;
        if ($count == 1) {
            session_start();
            $_SESSION['IS_AUTHENTICATED'] = 1;
            $_SESSION['EMAIL'] = $email;
            header('location:index.php');
        } else {
            //Login failed 
            include('./login.php');
            echo '<center>Incorrect Username or Password a !!!<center>';
            exit();
        }
    }  else {
        //Login failed 
        include('./login.php');
        echo '<center>Incorrect Username or Password b !!!<center>';
        exit();
    }
} else {
    //Login failed 
    include('./login.php');
    echo '<center>Incorrect Username or Password c !!!<center>';
    exit();
}
?>