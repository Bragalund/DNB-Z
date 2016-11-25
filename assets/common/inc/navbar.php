<?php
$navLeft = array(
	'Konto' => $conf['pages']['accountOverview'],
	'Meny 2' => $conf['pages']['menu2']
);

$navRight = array(
	'Meny 3' => $conf['pages']['menu3'],
	'Meny 4' => $conf['pages']['menu4']
);

/*$menuMain = array(
	'konto'=> array('kontooversikt', );
);

$subMenu = array(

);*/

$menu = [
	'left' => [
		1 => [
			'main' => 'Hjem',
			'url' => 'index.php'
		],
		2 => [
			'main' => 'konto',
			'url' => 'accountOverview.php',
			'sub' => [
				1 => [
					'title' => 'Oversikt',
					'url' => 'accountOverview.php'
				],
				2 => [
					'title' => 'Tidligere transaksjoner',
					'url' => 'transactions.php'
				],
				3 => [
					'title' => 'Overfør',
					'url' => 'transfer.php'
				],
				4 => [
					'title' => 'kortoversikt',
					'url' => 'cardOwerview.php'
				],
				5 => [
					'title' => 'opprette konto',
					'url' => 'newAccount.php'
				]
			]
		],
		3 => [
			'main' => 'betaling',
			'url' => 'payment.php',
			'sub' => [
				1 => [
					'title' => 'Ny betaling',
					'url' => 'newPayment.php'
				],
				2 => [
					'title' => 'Utførte betalinger',
					'url' => 'previousPayments.php'
				],
				3 => [
					'title' => 'Vipps en venn',
					'url' => 'vippsAFriend.php'
				],
				4 => [
					'title' => 'Faste oppdrag',
					'url' => 'regularAssignments.php'
				]
			]
		],
		4 => [
			'main' => 'Sparing',
			'url' => 'savings.php',
			'sub' => [
				1 => [
					'title' => 'Spareplan',
					'url' => 'savingPlan.php'
				],
				2 => [
					'title' => 'Sparing i fond',
					'url' => 'savingInFund.php'
				],
				3 => [
					'title' => 'Opprett en sparekonto',
					'url' => 'MakeASavingsAccount.php'
				],
			]
		]
	],
	'right' => [
		1 => [
			'main' => 'Hjelp',
			'url' => 'help.php',
			'sub' => [
				1 => [
					'title' => 'Budsjett',
					'url' => 'budget.php'
				],
				2 => [
					'title' => 'Sparing',
					'url' => 'learnToSave.php'
				],
				3 => [
					'title' => 'Flere funksjoner',
					'url' => 'moreFunctions.php'
				],
			]
		],
		2 => [
			'main' => 'Kontakt',
			'url' => 'contact.php',
			'sub' => [
				1 => [
					'title' => 'Chat',
					'url' => 'chat.php'
				],
				2 => [
					'title' => 'Mail',
					'url' => 'mail.php'
				],
				3 => [
					'title' => 'Telefon',
					'url' => 'phone.php'
				],
			]
		],
		3 => [
			'main' => 'Navn',
			'url' => 'profile.php',
			'sub' => [
				1 => [
					'title' => 'Profil',
					'url' => 'profile.php'
				],
				2 => [
					'title' => 'Bankinstillinger',
					'url' => 'bankSettings.php'
				],
				3 => [
					'title' => 'Personverninstillinger',
					'url' => 'privacySettings.php'
				],
				4 => [
					'title' => 'Logg ut',
					'url' => 'logOut.php'
				],
			]
		],
	],
];

echo $menu['left'][1]['main'];

/*foreach, if så foreach*/
?>

<nav class="navbar navbar-default navbar-custom" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Meny</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <?php
    				foreach($navLeft as $nav_title => $nav_link){
    					echo '<li class="'.($nav_link == basename($_SERVER['PHP_SELF']) ? 'active':'').'"><a href="'.$conf['pathToRoot'].''.$nav_link.'">'.$nav_title.'</a></li>';
    				}
				?>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#hello" class="dropdown">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
                <?php
    				foreach($navRight as $nav_title => $nav_link){
    					echo '<li class="'.($nav_link == basename($_SERVER['PHP_SELF']) ? 'active':'').'"><a href="'.$conf['pathToRoot'].''.$nav_link.'">'.$nav_title.'</a></li>';
    				}
				?>
            </ul>
        </div><!--/.navbar-collapse -->
    </div>
</nav>
