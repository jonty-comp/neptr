<?php

class VNCViewer extends Element {
	
	function output($attrs) {
		echo("
		<iframe src=\"js/novnc/iframe.php?host=".$attrs["host"]."&port=".$attrs["port"]."&password=".$attrs["password"]."\" style=\"width: 100%; height: 100%; border: 0; margin: 0;\" >
		</iframe>");
	}

}

?>