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
					$alignment = 'left';
					for ($i=1; $i<count($menu[$alignment])+1; $i++) {
						if ($menu['left'][$i]['sub'] != NULL) {
							echo ('<li class="dropdown '.($menu[$alignment][$i]['url'] == basename($_SERVER['PHP_SELF']) ? 'active':'').'">');
							echo ('<a href="' . $menu[$alignment][$i]['url'] . '">' . $menu[$alignment][$i]['main'] . ' <span class="caret"></span></a>');
							echo ('<ul class="dropdown-menu">');
							for ($r=1; $r<count($menu[$alignment][$i]['sub'])+1; $r++) {
								echo ('<li><a href="' . $menu[$alignment][$i]['sub'][$r]['url'] . '">' . $menu[$alignment][$i]['sub'][$r]['title'] . '</a></li>');
							}
							echo ('</ul>');
							echo ('</li>');
						}
						else {
							echo ('<li class="'.($menu[$alignment][$i]['url'] == basename($_SERVER['PHP_SELF']) ? 'active':'').'"><a href="' . $menu[$alignment][$i]['url'] . '">' . $menu[$alignment][$i]['main'] . '</a></li>');
						}
					}
				?>
            </ul>

            <ul class="nav navbar-nav navbar-right">
				<?php
					$alignment = 'right';
					for ($i=1; $i<count($menu[$alignment])+1; $i++) {
						if ($menu['left'][$i]['sub'] != NULL) {
							echo ('<li class="dropdown '.($menu[$alignment][$i]['url'] == basename($_SERVER['PHP_SELF']) ? 'active':'').'">');
							echo ('<a href="' . $menu[$alignment][$i]['url'] . '">' . $menu[$alignment][$i]['main'] . ' <span class="caret"></span></a>');
							echo ('<ul class="dropdown-menu">');
							for ($r=1; $r<count($menu[$alignment][$i]['sub'])+1; $r++) {
								echo ('<li><a href="' . $menu[$alignment][$i]['sub'][$r]['url'] . '">' . $menu[$alignment][$i]['sub'][$r]['title'] . '</a></li>');
							}
							echo ('</ul>');
							echo ('</li>');
						}
						else {
							echo ('<li class="'.($menu[$alignment][$i]['url'] == basename($_SERVER['PHP_SELF']) ? 'active':'').'"><a href="' . $menu[$alignment][$i]['url'] . '">' . $menu[$alignment][$i]['main'] . '</a></li>');
						}
					}
				?>
            </ul>
        </div><!--/.navbar-collapse -->
    </div>
</nav>
