<?php
ob_start();
session_start();

$jsondata = file_get_contents("http://10.32.13.28:8080/customers");
$json = json_decode($jsondata, true);

// it will never let you open index(login) page if session is set
if ( isset($_SESSION['user'])!="" ) {
	header("Location: home.php");
	exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {

	// prevent sql injections/ clear user invalid inputs
	$user = trim($_POST['user']);
	$user = strip_tags($user);
	$user = htmlspecialchars($user);

	$pass = trim($_POST['password']);
	$pass = strip_tags($pass);
	$pass = htmlspecialchars($pass);
	// prevent sql injections / clear user invalid inputs

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

		function validateIdentification($data, $array) {
			foreach ($array as $key => $val) {
				if ($val['foedselsnummer'] === $data) {
					return $val['foedselsnummer'];
				}
			}
			return null;
		}

		$result = validateIdentification($user, $json);

		if(!empty($result)){
			$_SESSION['user'] = $result;
			header("Location: index.php");
		}
		else {
			$errMSG = "Brukerkontoen er enten tastet inn feil eller finnes ikke.";
		}

		/*echo "<ul>";
		foreach($json as $row) {
			echo "<li>".$row['firstName']."</li>";
		}
		echo "</ul>";*/

		/*$password = hash('md5', $pass); // password hashing using SHA256*/
	}

}
?>
<?php
	if (isset($errMSG)) {
?>
<div class="form-group">
	<div class="alert alert-danger">
		<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
	</div>
</div>
<?php
   }
?>

<form method="post" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>">
	<div class="form-group">
		<label for="user">Personnummer</label>
		<input type="text" class="form-control" id="user" name="user" placeholder="Skriv inn personnummer, 11 tall." value="98111345423">
		<span class="text-danger"><?=$userError?></span>
	</div>

	<div class="form-group">
		<label for="password">Passord</label>
		<input type="password" class="form-control" id="password" name="password" placeholder="Skriv inn passord.">
		<span class="text-danger"><?=$passError?></span>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-block btn-primary" name="btn-login">Logg inn</button>
	</div>
</form>

<?php ob_end_flush(); ?>
