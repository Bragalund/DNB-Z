<?php
require_once("global/config.php");
$visitorIP = $customClass->getUserIP();
$customClass->makeLog();

if( !isset($_SESSION['user']) ) {
header("Location: login.php");
exit;
}

require_once("assets/common/inc/head.php");
require_once("assets/common/inc/header.php");
require_once("assets/common/inc/navbar.php");
?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default panel-primary">
				<div class="panel-heading">
					<h4>Kontooversikt</h4>
				</div>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Konto</th>
							<th>Kontonummer</th>
							<th>Saldo</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Citona Marie Rygg</td>
							<td>1092.06.82408</td>
							<td>1.000.000,-</td>
							<td class="text-right text-xs-left">
								<div class="btn-group">
									<button type="button" class="btn btn-primary">Betale</button>
									<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="#">Betale</a></li>
										<li><a href="#">Overføre</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="#">Trenger vi denne?</a></li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td>Mathias Tollerud</td>
							<td>1662.02.83672</td>
							<td>1000,-</td>
							<td class="text-right text-xs-left">
								<div class="btn-group">
									<button type="button" class="btn btn-primary">Betale</button>
									<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="#">Betale</a></li>
										<li><a href="#">Overføre</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="#">Trenger vi denne?</a></li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td>Malin Glosli Haugan</td>
							<td>1422.05.92538</td>
							<td>-100,-</td>
							<td class="text-right text-xs-left">
								<div class="btn-group">
									<button type="button" class="btn btn-primary">Betale</button>
									<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="#">Betale</a></li>
										<li><a href="#">Overføre</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="#">Trenger vi denne?</a></li>
									</ul>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div><!-- /panel -->
		</div><!-- /col -->
	</div><!-- /row -->

	<?php
	include_once("assets/common/inc/footer.php");
	?>
</div><!-- /container -->

<?php
include_once("assets/common/inc/scripts.php");
?>

<script>
$('table').cardtable();
</script>

</body>
</html>
