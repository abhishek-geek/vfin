<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>VFIN</title>
</head>

<body>
    <div class="jumbotron">
        <h1 class="text-center">Login to VFIN : Vehicle Finance</h1>
    </div>
    <div class="container">
        <form name="login" method="post" action="authentication.php">
            <div class="form-group row">
                <label class="col-md-2 col offset-md-3" for="email">Email Address</label>
                <input name="email" type="text" class="form-control col-md-4 col" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
                <small id="emailHelp" class="form-text text-muted col-md col-12 offset-md-5 offset-6">E.g. Tayl1@vfin.com</small>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col offset-md-3" for="password">Password</label>
                <input name="password" type="password" class="form-control col-md-4 col" id="password" aria-describedby="pHelp" placeholder="Password">
                <small id="pHelp" class="form-text text-muted col-md col-12 offset-6 offset-md-5">E.g. Tayl1</small>
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-sm btn-primary col-3" name="submit" value="login">Submit</button>
            </div>

        </form>
    </div>
</body>

</html>