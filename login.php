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
            </div>
        </div>
    </header>

    <nav class="navbar navbar-default navbar-custom" role="navigation">
      <div class="container">
        <div class="container fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a>Forsiden</a></li>
              <li><a>Hvorfor velge oss</a></li>
              <li><a>Informasjon til foreldre</a></li>
            </ul>
          </div>
        </div><!--/. navbar-collapse-->
      </div><!-- container-fluid -->
    </nav>

    <main>



    </main>





    </div><!-- /container -->


    <!-- Import JavaScript -->
    <script src="assets/lib/jquery-3.1.1/jquery-3.1.1.min.js"></script>
    <script src="assets/lib/bootstrap-3.3.7/js/bootstrap.js"></script>
    <script src="assets/lib/bootstrap-toggle/js/bootstrap-toggle.js"></script>
    <script src="assets/lib/chartjs-2.3.0/Chart.js"></script>

</body>
</html>
