<?php
//    require_once("global/config.php");
//    $visitorIP = $customClass->getUserIP();
//    $customClass->makeLog();
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Saldo på brukskonto</h3>
                        </div>
                        <div class="panel-body text-center">
                            <h1>1000,-</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php
        require_once("assets/common/inc/navbar.php");
    ?>

    <div class="container">

		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<form action="" method="post">
					<div class="form-group">
					  <label for="user">Personnummer</label>
					  <input type="text" class="form-control" id="user" placeholder="Ditt personnummer.">
					</div>

					<div class="form-group">
					  <label for="password">Passord</label>
					  <input type="password" class="form-control" id="password" placeholder="Ditt passord.">
					</div>

					<div class="form-group">
						<button class="btn btn-primary" type="submit">Logg inn</button>
					</div>
				</form>
			</div>
		</div>

        <hr>

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

    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'horizontalBar',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>
