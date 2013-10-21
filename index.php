<?php 
function __autoload($class_name) { require_once ("elements/".$class_name.".php"); }
define(GRID_COLS, 16);
define(GRID_ROWS, 9);
?>
<html>
	<head>
		<style>
			@import url(http://fonts.googleapis.com/css?family=Droid+Sans:400,700);

			html,body { width: 1920px; height: 1080px; margin: 0; background: #000; color: #fff; font-family: 'Droid Sans', sans-serif; display: table; text-align: center; position: absolute}
			.cell { <?php if($_GET["debug"] == TRUE) echo("border: 1px solid #ccc;") ?> box-sizing: border-box; display: table-cell; vertical-align: middle; position: absolute; }
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
	</head>
	<body>
		<div class="width-9 height-1 x-offset-0 y-offset-0 cell">
			<?php Date::output(); ?>
		</div>
		<div class="width-7 height-7 x-offset-1 y-offset-1 cell">
			<?php AnalogueClock::output(); ?>
		</div>
		<div class="width-9 height-1 x-offset-0 y-offset-8 cell">
			<?php IdiotTime::output(); ?>
		</div>
		<div class="width-5 height-2 x-offset-9 y-offset-0 cell">
			<?php ScreenName::output("ST1") ?>
		</div>
		<div class="width-2 height-2 x-offset-14 y-offset-0 cell">
			<?php SquareLamp::output("ON AIR", "green"); ?>
		</div>
		<div class="width-7 height-2 x-offset-9 y-offset-3 cell">
			<?php RectangularLamp::output("MIC LIVE", "red", 6); ?>
		</div>
		<div class="width-7 height-2 x-offset-9 y-offset-5 cell">
			<?php RectangularLamp::output("VISION LIVE", "blue", 6); ?>
		</div>
		<div class="width-7 height-2 x-offset-9 y-offset-7 cell">
			<?php RectangularLamp::output("PHONE", "orange", 6); ?>
		</div>
	</body>
</html>
