<?php

session_start();

if (!isset($_SESSION['IS_AUTHENTICATED']) || $_SESSION['IS_AUTHENTICATED'] != true) {
    header("location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles.css">
    <title>All Seizings</title>
</head>

<body>
    <div class="jumbotron d-flex justify-content-center text-center">
        <h1>
            V.F.I.N. Welcomes

            <?php
            include "dbconnect.php";
            $qry = 'SELECT name FROM user WHERE email = "' . $_SESSION['EMAIL'] . '" ;';
            // echo var_dump($qry);
            $result = mysqli_query($link, $qry);
            // echo var_dump($result);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                $row = mysqli_fetch_assoc($result);
                echo $row["name"];
            } else {
                echo "0 results";
            }
            ?>

        </h1>
    </div>
    <div class="container-fluid">

        <div class="row">

            <div class="col-8 d-flex justify-content-center text-center" style="align-items :center;">
                <div class="right">
                    <?php
                    include "dbconnect.php";
                    $qry = 'SELECT * FROM user WHERE email = "' . $_SESSION['EMAIL'] . '" ;';
                    // echo var_dump($qry);
                    $result = mysqli_query($link, $qry);
                    // echo var_dump($result);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        $row = mysqli_fetch_assoc($result);
                        $name = $row["name"];
                        $uid = $row["uid"];
                        $gender = $row["gender"];
                        $dob = $row["dob"];
                        $mob = $row["phone"];
                        $city = $row["city"];

                        echo '<div class="container">
                                      <h4>User Details</h4>
                                      <br>
                                      <table class="table table-striped">
                                          <tbody>
                                          <tr>
                                              <td>UID</td>
                                              <th>' . $uid . '</th>
                                          </tr>
                                          <tr>
                                              <td>Name</td>
                                              <th>' . $name . '</th>
                                          </tr>
                                          <tr>
                                              <td>Gender</td>
                                              <th>' . $gender . '</th>
                                          </tr>
                                          <tr>
                                              <td>City</td>
                                              <th>' . $city . '</th>
                                          </tr>
                                          <tr>
                                              <td>DoB</td>
                                              <th>' . $dob . '</th>
                                          </tr>
                                          <tr>
                                              <td>Phone no.</td>
                                              <th>' . $mob . '</th>
                                          </tr>
                                          </tbody>
                                      </table>
                                      </div>
                                  ';
                    } else {
                        echo "0 results";
                    }
                    ?>
                </div>
            </div>

            <div class="col-4 d-flex justify-content-center text-center vr" style="align-items :center;">
                <div class="right">
                    <img src="https://png.pngtree.com/png-clipart/20190924/original/pngtree-office-work-user-icon-avatar-png-image_4815124.jpg"><br><br>
                    <a href="./index.php" class="btn btn-outline-success">Home</a>
                    <br><br>
                    <a href="./profile.php" class="btn btn-outline-success">My Profile</a>
                    <br><br>
                    <a href="./seized.php" class="btn btn-outline-success">All Seizings</a>
                    <br><br>
                    <a href="./logout.php" class="btn btn-outline-danger">Logout</a>
                    <br><br>

                </div>
            </div>

        </div>
    </div>
</body>

</html>