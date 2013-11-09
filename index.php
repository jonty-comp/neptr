<?php 
function __autoload($class_name) { require_once ("elements/".$class_name.".php"); }
$db = pg_connect("host=localhost port=5432 dbname=switcher user=status_screen password=statusScreenPass");

$screen = pg_fetch_array(pg_query("SELECT * FROM status_screens WHERE mac ".(isset($_REQUEST["mac"])? " = '".$_REQUEST["mac"]."'" : "IS NULL").";"));
$elements = pg_fetch_all(pg_query("SELECT status_screens_elements.*, status_elements.name FROM status_screens_elements INNER JOIN status_elements ON status_screens_elements.element_id = status_elements.id WHERE status_screens_elements.screen_id = ".$screen["id"].";"));

define(GRID_COLS, $screen["columns"]);
define(GRID_ROWS, $screen["rows"]);
?>
<html>
	<head>
		<style>
			@import url(http://fonts.googleapis.com/css?family=Droid+Sans:400,700);

			html,body { width: 100%; height: 100%; margin: 0; background: #000; color: #fff; font-family: 'Droid Sans', sans-serif; display: table; text-align: center; position: absolute; overflow: hidden;}
			.cell { <?php if($_GET["debug"] == TRUE) echo("border: 1px solid #888;") ?> box-sizing: border-box; display: table-cell; vertical-align: middle; position: absolute; }
			<?php if($_GET["debug"] == TRUE) echo(".debug { border: 1px solid #222; }") ?> 
			<?php 
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
			var connect_timeout;
			var websocket;
			var connection = false;
			var websocket_functions = [];

			function startWebsocket() {
					console.log('Starting websocket...');
					websocket = new WebSocket('ws://ext1.ext.radio.warwick.ac.uk:443');
					websocket.onopen = function(e) { onOpen(e) };
					websocket.onclose = function(e) { onClose(e) };
					websocket.onmessage = function(e) { onMessage(e) };
			}

			function onOpen(e) {
					console.log('Websocket connection established.');
					clearTimeout(connect_timeout);
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

			if($elements) {
				foreach($elements as $element) {
					$params = pg_fetch_all(pg_query("SELECT status_parameters.name, status_screens_elements_parameters.value FROM status_screens_elements_parameters INNER JOIN status_parameters ON status_screens_elements_parameters.parameter_id = status_parameters.id WHERE status_screens_elements_parameters.screen_element_id =".$element["id"].";"));
					$parameters = array();
					if($params) foreach($params as $param) $parameters[$param["name"]] = $param["value"];
				
					echo("<div class=\"cell width-".$element["width"]." height-".$element["height"]." x-offset-".$element["x-offset"]." y-offset-".$element["y-offset"]."\" >\n");
					$element["name"]::output($parameters);
					echo("</div>\n");
				}
			}

		?>
	</body>
</html>
