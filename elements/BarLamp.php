<?php

class BarLamp extends Element {
	
	public function output($args) {
		$id = rand(0,100000);
		echo("
			<style>
				.rectangular-lamp { width: 98%; height: 98%; padding: 1%; display: table; }
				#lamp-".$id." div { font-size: ".$args["font_size"]."em; background: ".$args["bg_colour"]." }

				.rectangular-lamp div { border-radius: 50px; padding: 5%; display: table-cell; vertical-align: middle; }
			</style>
			<div id=\"lamp-".$id."\" class=\"rectangular-lamp\"><div>".$args["name"]."</div></div>
		");
	}

}

?>