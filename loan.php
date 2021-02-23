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
    <!-- css     -->

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/mystyles.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap-social.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/4.12.0/bootstrap-social.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/4.12.0/bootstrap-social.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/4.12.0/bootstrap-social.min.css.map" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="./styles.css">
    <title>Loan Details</title>
</head>

<body>
    <div class="jumbotron d-flex justify-content-center text-center">
        <h1>
            V.F.I.N. Welcomes

            <?php
            //session_start();
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




            <div class="col-8 d-flex justify-content-center text-center vr" style="align-items :center;">
                <div class="right">
                    <?php
                    include "dbconnect.php";
                    $vid = $_POST['loan'];
                    $qry = 'SELECT * FROM loan WHERE v_id = "' . $vid . '" ;';
                    // echo var_dump($qry);
                    $result = mysqli_query($link, $qry);
                    // echo var_dump($result);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        $row = mysqli_fetch_assoc($result);
                        $f_id = $row["f_id"];
                        $loan_id = $row["loan_id"];
                        $loan_amount = $row["loan_ammount"];
                        $due_amount = $row["due_ammount"];
                        //Checking for seizable ---------
                        $seizable = "No";
                        if ($due_amount >= $loan_amount * 0.1) {
                            $seizable = "Yes";
                        }
                        $qry2 = 'SELECT name FROM financer WHERE f_id = "' . $f_id . '" ;';
                        // echo var_dump($qry);
                        $result2 = mysqli_query($link, $qry2);
                        $f_name = mysqli_fetch_assoc($result2)['name'];
                        echo '<div class="container">
                            <h4>Loan Details</h4>
                            <br>
                            <table class="table table-striped">
                                <tbody>
                                
                                <tr>
                                    <td>VID</td>
                                    <th>' . $vid . '</th>
                                </tr>
                                <tr>
                                    <td>Financer</td>
                                    <th>' . $f_name . '</th>
                                </tr>
                                <tr>
                                    <td>Loan ID</td>
                                    <th>' . $loan_id . '</th>
                                </tr>
                                <tr>
                                    <td>Loan Amount</td>
                                    <th>' . $loan_amount . '</th>
                                </tr>
                                <tr>
                                    <td>Due Amount</td>
                                    <th>' . $due_amount . '</th>
                                </tr>
                                <tr>
                                    <td>Seizable</td>
                                    <th>' . $seizable . '</th>
                                </tr>
                                <tr>
                                    <td colspan = 2>
                                    ' . btn($seizable, $vid) . '
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                        ';
                    } else {
                        echo "0 results";
                    }
                    function btn($seizable, $vid)
                    {
                        if ($seizable == "Yes") {
                            return '<form method="post" action="./seize.php">
                            <button type="submit" name="seize" value="' . $vid . '" class="btn btn-outline-success btn-lg">Seize Vehicle</button>
                            </form>';
                        }

                        return '<form method="post" action="./index.php">
                            <button type="submit" class="btn btn-outline-success btn-lg">Check another Vehicle</button>
                            </form>';
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

    <footer class="row" style="background-color:#d1ddeb; margin-top: 2em;">
        <div class="container">
            <div class="row row-footer">
                <div class="col-4">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="./index.php">Check Another Vehicle</a></li>
                        <li><a href="./profile.php">My Profile</a></li>
                        <li><a href="./seized.php">All Seizings</a></li>
                        <li><a href="./logout.php">Logout</a></li>
                    </ul>
                </div>

                <div class="col-4 d-flex align-self-end text-center">
                    <p style="padding:10px;"></p>
                    <p align=center>© Copyright 2020 VFIN</p>
                </div>

                <div class="col-2 offset-2">
                    <h5>Our Address</h5>
                    <address>
                        PDPM IIITDM Jabalpur,<br>
                        <i id="phone-number" class="fa fa-phone"></i>: +91 1234567890<br>
                        <i class="fa fa-fax"></i>: +91 0987654321<br>
                        <i class="fa fa-envelope"></i>:
                        <a href="mailto:confusion@food.net">enquiry@vfin.com</a>
                    </address>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>