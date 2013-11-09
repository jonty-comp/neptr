<?php

class CircleLamp {
	
	public function output($args) {
			$id = rand(0,100000);
			echo("
			<style>
				.square-lamp { border-radius: 50%; width: 90%; height: 90%; margin: 5%; display: table; }
				#lamp-".$id." { background: ".$args["bg_colour"]." }

				.square-lamp div { padding: 5%; font-size: ".$args["font_size"]."em; display: table-cell; vertical-align: middle; }
			</style>
			<div id=\"lamp-".$id."\" class=\"square-lamp\"><div>".$args["name"]."</div></div>
		");
	}

}

?>