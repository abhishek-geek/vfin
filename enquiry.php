<?php

session_start();

if (!isset($_SESSION['IS_AUTHENTICATED']) || $_SESSION['IS_AUTHENTICATED'] != true) {
    header("location: login.php");
    exit;
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>VFIN-Enquiry</title>
</head>
<body>
    <div class="jumbotron">
        <h1 class="text-center">Vehicle Enquiry</h1>
    </div>
    <div class="container">
        <form>
            <div class="form-group row">
              <label class="col-md-2 col offset-md-3" for="vid">Vehicle Number</label>
              <input type="text" class="form-control col-md-4 col" id="vid" aria-describedby="vidHelp" placeholder="Enter vehicle number">
              <small id="vidHelp" class="form-text text-muted col-md col-12 offset-md-5 offset-6">e.g "UP62AD3445"</small>
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary col-3">Submit</button>
            </div>
            
          </form>
    </div>
</body>
</html>