<?php

$db_params = array(
	"host" => "localhost",
	"port" => 5432,
	"dbname" => "switcher",
	"user" => "status_screen",
	"password" => "statusScreenPass"
	);

set_include_path(get_include_path().PATH_SEPARATOR."classes/".PATH_SEPARATOR."elements/");
function __autoload($class_name) { 
	if(stream_resolve_include_path($class_name."s.php")) require_once($class_name."s.php");
	else require_once($class_name.".php");
}

ScreensDB::connect($db_params);

$screen = Screens::get_by_mac($_REQUEST["mac"]);

define(GRID_COLS, $screen->columns);
define(GRID_ROWS, $screen->rows);
?>
<html>
	<head>
		<style>
			@import url(http://fonts.googleapis.com/css?family=Droid+Sans:400,700);

			html,body { width: 100%; height: 100%; margin: 0; background: #000; color: #fff; font-family: 'Droid Sans', sans-serif; display: table; text-align: center; position: absolute; overflow: hidden;}
			.cell { <?php if($_GET["debug"] == TRUE) echo("border: 1px solid #888;") ?> box-sizing: border-box; display: table-cell; vertical-align: middle; position: absolute; }
			<?php if($_GET["debug"] == TRUE) echo(".debug { border: 1px solid #222; }");

			for($i = 1; $i <= GRID_COLS; $i++) {
				echo('
			.width-'.$i.' { width: '.(100/GRID_COLS)*$i.'% }
			.x-offset-'.($i-1).' { left: '.(100/GRID_COLS)*($i-1).'% }');
			}

			for($j = 1; $j <= GRID_ROWS; $j++) {
				echo('
			.height-'.$j.' { height: '.(100/GRID_ROWS)*$j.'% }
			.y-offset-'.($j-1).' { top: '.(100/GRID_ROWS)*($j-1).'% }');
			}
			?>
		</style>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/moment.min.js"></script>
		<script>
			var websocket;
			var connection = false;
			var websocket_functions = [];

			function startWebsocket() {
					console.log('Starting websocket...');
					websocket = new WebSocket('ws://radio.warwick.ac.uk/neptr/endpoint');
					websocket.onopen = function(e) { onOpen(e) };
					websocket.onclose = function(e) { onClose(e) };
					websocket.onmessage = function(e) { onMessage(e) };
			}

			function onOpen(e) {
					console.log('Websocket connection established.');
			}

			function onClose(e) {
					console.log('Websocket connection lost.');
					setTimeout('startWebsocket()',5000);
			}

			function onMessage(e) {
				for (i = 0; i < websocket_functions.length; i++) {
					websocket_functions[i](JSON.parse(e.data));
				}
			}

			$().ready(function() {
				startWebsocket();
			})
		</script>
	</head>
	<body>
		<?php 
			if($_GET["debug"] == TRUE) for($k = 0; $k < GRID_ROWS; $k++) for($l = 0; $l < GRID_COLS; $l++) echo("<div class=\"cell debug width-1 height-1 x-offset-".$l." y-offset-".$k."\"></div>\n"); 

			foreach($screen->get_elements() as $screen_element) {
				$element = $screen_element->get_element();
				$params = $screen_element->get_parameters();

				$parameters = array();
				if($params) foreach($params as $param) $parameters[$param->name] = $param->value;
			
				echo("<div class=\"cell width-".$screen_element->width." height-".$screen_element->height." x-offset-".$screen_element->x_offset." y-offset-".$screen_element->y_offset."\" >\n");
				$element->output($parameters);
				echo("</div>\n");
			}
		?>
	</body>
</html>
