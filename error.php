<?php
require_once("assets/common/inc/head.php");

$codes = array(
	404 => array('404', 'Page not found', 'The page you were looking for doesnt exist or another error occured.'),
	401 => array('401', 'Unauthorized', 'Access is denied due to invalid credentials.')
);
$code = $codes[$_GET["type"]][0];
$title = $codes[$_GET["type"]][1];
$message = $codes[$_GET["type"]][2];

/**if ($title == false || strlen($status) != 3){
	$message = 'Please supply a valid HTTP status code.';
}**/

?>
<body id="error">
	<div class="site-wrapper">
		<div class="site-wrapper-inner">
			<div class="cover-container">
				<div class="inner cover">
					<h1 class="cover-heading"><?php echo $code ?></h1>
					<?php
					echo 'Hello ' . htmlspecialchars($_GET["name"]) . '!';
					?>
					<h3><?php echo $title ?></h3>
					<p class="lead">
						<?php echo $message ?>
					</p>
					<div class="btn-group" role="group">
						<button type="button" class="btn btn-default"><a href="index.php">Tilbake til forsiden</a></button>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /container -->


	<!-- Import JavaScript -->
	<script src="assets/lib/jquery-3.1.1/jquery-3.1.1.min.js"></script>
	<script src="assets/lib/bootstrap-3.3.7/js/bootstrap.js"></script>
	<script src="assets/lib/bootstrap-toggle/js/bootstrap-toggle.js"></script>
	<script src="assets/lib/chartjs-2.3.0/Chart.js"></script>

</body>
</html>
