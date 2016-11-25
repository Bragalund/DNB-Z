<?php
if(!defined("CONFIG")){
	header($_SERVER['SERVER_PROTOCOL']." 404 Not Found");
	exit("Not Found");
}

$menu = [
	'left' => [
		1 => [
			'main' => 'Hjem',
			'url' => 'index.php',
			'sub' => NULL
		],
		2 => [
			'main' => 'Konto',
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
			'main' => 'Betaling',
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
