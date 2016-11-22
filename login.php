<?php
	require_once("global/config.php");
	$visitorIP = $customClass->getUserIP();
	$customClass->makeLog();
	
	require_once("assets/common/inc/head.php");
	require_once("assets/common/inc/header.php");
	require_once("assets/common/inc/navbar.php");
?>
<div class="jumbotron bg-green">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<h2 class="text-center">Logg inn i nettbanken</h2>
				<form class="" action="" method="post">
					<div class="form-group">
						<label for="user">Personnummer</label>
						<input type="text" class="form-control" id="user" placeholder="Skriv inn personnummer, 11 tall." value="<?=$user?>">
						<!--<span class="text-danger"><?=$userError?></span>-->
					</div>
					<div class="form-group">
						<label for="password">Passord</label>
						<input type="password" class="form-control" id="password" placeholder="Skriv inn passord.">
						<!--<span class="text-danger"><?=$passError?></span>-->
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Logg inn</button>
					</div>
				</form><!-- /form -->
			</div>
		</div><!-- /row -->
	</div><!-- /container -->
</div><!-- /jumbotron -->

<!-- Import JavaScript -->
<script src="assets/lib/jquery-3.1.1/jquery-3.1.1.min.js"></script>
<script src="assets/lib/bootstrap-3.3.7/js/bootstrap.js"></script>
<script src="assets/lib/bootstrap-toggle/js/bootstrap-toggle.js"></script>
<script src="assets/lib/chartjs-2.3.0/Chart.js"></script>

</body>
</html>
