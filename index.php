<?php
    require_once("global/config.php");
    $visitorIP = $customClass->getUserIP();
    $customClass->makeLog();

	ob_start();
	session_start();

	// if session is not set this will redirect to login page
	/*if( !isset($_SESSION['user']) ) {
		header("Location: login.php");
	exit;
	}*/
	
	require_once("assets/common/inc/head.php");
	require_once("assets/common/inc/header.php");
	require_once("assets/common/inc/navbar.php");
?>

    <div class="container">
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4>Warning!</h4>
            <p>Better check yourself, you're not looking too good.</p>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Saldo på brukskonto</h3>
                    </div>
                    <div class="panel-body text-center">
                        <h1>1000,-</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Saldo på brukskonto</h3>
                    </div>
                    <div class="panel-body text-center">
                        <h1>1000,-</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
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

        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Mål</h3>
                    </div>
                    <div class="panel-body">

                        <?php
                            $jsondata = file_get_contents("http://10.32.13.28:8080/customers");
                            $json = json_decode($jsondata, true);
                            echo "<ul>";
                            foreach($json as $row) {
                                echo "<li>".$row['firstName']."</li>";
                            }
                            echo "</ul>";
                        ?>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                        <p><canvas id="myChart" width="400" height="400"></canvas></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default bg-vipps text-white">
                    <div class="panel-body">
                        <p><img src="assets/common/img/vipps-logo.png" class="img-responsive" style="padding:0 50px;"></p>
                        <form>
                            <div class="form-group">
                              <label for="tlf">Telefonnummer</label>
                              <input type="number" class="form-control" id="tlf" placeholder="Eks.: 543 45 321" required="">
                            </div>

                            <div class="form-group">
                              <label for="sum">Beløp</label>
                              <input type="number" class="form-control" id="sum" placeholder="Eks.: 100" required="">
                            </div>

                            <button type="submit" name="button" class="btn btn-default">Vipps!</button>
                        </form>
                    </div>
                </div>
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
