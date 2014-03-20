<?php

class VNCViewer extends Element {
	
	function output($attrs) {
		echo("
		<iframe src=\"assets/novnc/iframe.php?host=".$attrs["host"]."&port=".$attrs["port"]."&path=".$attrs["path"]."&password=".$attrs["password"]."\" style=\"width: 100%; height: 100%; border: 0; margin: 0;\" >
		</iframe>");
	}

}

?>
