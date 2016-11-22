<?php
	require_once("global/config.php");
	$visitorIP = $customClass->getUserIP();
	$customClass->makeLog();

	// it will never let you open index(login) page if session is set
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: index.php");
		exit;
	}

	$error = false;
	$userError = "";
	$passError = "";
	$user = "";

	if( isset($_POST['btn-login']) ) {

		// prevent injections/ clear user invalid inputs
		$user = trim($_POST['user']);
		$user = strip_tags($user);
		$user = htmlspecialchars($user);

		$pass = trim($_POST['password']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent injections / clear user invalid inputs

		if(empty($user)){
			$error = true;
			$userError = "Du må skrive inn personnummer.";
		}

		if(empty($pass)){
			$error = true;
			$passError = "Du må skrive inn passord.";
		}

		// if there's no error, continue to login
		if (!$error) {

			$userCheck = $satan->getUsers();

			function validateIdentification($data, $array) {
				foreach ($array as $key => $val) {
					if ($val['foedselsnummer'] === $data) {
						return $val['foedselsnummer'];
					}
				}
				return null;
			}

			$result = validateIdentification($user, $userCheck);

			if(!empty($result)){
				$_SESSION['user'] = $result;
				header("Location: index.php");
			}
			else {
				$errorMessage = "Brukerkontoen er enten tastet inn feil eller finnes ikke.";
			}

			/*$password = hash('md5', $pass); // password hashing using SHA256*/
		}
	}

	require_once("assets/common/inc/head.php");
	require_once("assets/common/inc/header.php");
	require_once("assets/common/inc/navbar.php");
?>
<div class="jumbotron bg-green">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<h2 class="text-center">Logg inn i nettbanken</h2>
				<form method="post" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>">

					<?php
						if (isset($errorMessage)) {
					?>
					<div class="form-group">
						<div class="alert alert-danger">
							<b>Feilmelding!</b> <?=$errorMessage?>
						</div>
					</div>
					<?php
					   }
					?>

					<div class="form-group">
						<label for="user">Personnummer</label>
						<input type="text" class="form-control" id="user" name="user" placeholder="Skriv inn personnummer, 11 tall." value="<?=$user?>">
						<span class="text-danger"><?=$userError?></span>
					</div>
					<div class="form-group">
						<label for="password">Passord</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Skriv inn passord.">
						<span class="text-danger"><?=$passError?></span>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit" name="btn-login">Logg inn</button>
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

<?php ob_end_flush(); ?>
