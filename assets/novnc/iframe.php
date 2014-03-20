<?php
$id = rand(0,100000);

echo("
<html>
	<body>		
		<style>
			#noVNC_screen_".$id." { width: 100%; height: 100%; }
			html, body { margin: 0; }
		</style>
		<script src=\"util.js\"></script>
		<div id=\"noVNC_screen_".$id."\">
			<canvas id=\"noVNC_canvas_".$id."\"></canvas>
		</div>

		<script>
		INCLUDE_URI = '';
		Util.load_scripts(['webutil.js', 'base64.js', 'websock.js', 'des.js', 'input.js', 'display.js', 'jsunzip.js', 'rfb.js']);

		var rfb_".$id.";

		window.onscriptsload = function () {
			rfb_".$id." = new RFB({'target': \$D('noVNC_canvas_".$id."'), 'view_only': false });
			rfb_".$id.".connect('".$_GET["host"]."', '".$_GET["port"]."', '".$_GET["password"]."', '".$_GET["path"]."');
			setTimeout('rfb_".$id.".sendKey();', 2000);
		};
		</script>
	</body>
</html>
");

?>
