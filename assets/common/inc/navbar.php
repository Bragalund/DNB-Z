<?php
$navLeft = array(
	'Konto' => $conf['pages']['accountOverview'],
	'Meny 2' => $conf['pages']['menu2']
);

$navRight = array(
	'Meny 3' => $conf['pages']['menu3'],
	'Meny 4' => $conf['pages']['menu4']
);
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
