<?php
    require_once("global/config.php");
    $visitorIP = $customClass->getUserIP();
    $customClass->makeLog();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Gruppe 15">

    <title><?=$conf['sitename']?></title>

    <!-- Import stylesheets -->
    <link href="assets/common/css/stylesheet.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <div class="row valign">
                <div class="col-md-2 col-sm-3 col-xs-4">
                    <img src="assets/common/img/logo-z.png" class="img-responsive brand">
                </div>

                <div class="col-md-3 col-sm-4 col-sm-offset-5 col-md-offset-7 hidden-xs">
                    <img class="img-responsive" src="assets/common/img/logo.png" />
                </div>
            </div>
        </div>
    </header>

    <?php
        require_once("assets/common/inc/navbar.php");
    ?>


        <footer>
            <p>&copy; PJ3100 Gruppe 15 - høsten 2016, vår 2017<br>
            <?=$visitorIP?></p>
        </footer>
    </div><!-- /container -->


    <!-- Import JavaScript -->
    <script src="assets/lib/jquery-3.1.1/jquery-3.1.1.min.js"></script>
    <script src="assets/lib/bootstrap-3.3.7/js/bootstrap.js"></script>
    <script src="assets/lib/bootstrap-toggle/js/bootstrap-toggle.js"></script>
    <script src="assets/lib/chartjs-2.3.0/Chart.js"></script>

</body>
</html>
