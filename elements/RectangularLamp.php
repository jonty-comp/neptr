<?php

class RectangularLamp {
	
	public function output($name, $background = "green", $font_size = 4.5) {
		$id = rand(0,1000);
		echo("
			<style>
				.rectangular-lamp { width: 98%; height: 98%; padding: 1%; display: table; }
				#lamp-".$id." div { background: ".$background." }

				.rectangular-lamp div { border-radius: 50px; padding: 5%; font-size: ".$font_size."em; display: table-cell; vertical-align: middle; }
			</style>
			<div id=\"lamp-".$id."\" class=\"rectangular-lamp\"><div>".$name."</div></div>
		");
	}

}

?>