<?php

class SquareLamp {
	
	public function output($name, $background = "green") {
		$id = rand(0,1000);
		echo("
			<style>
				.square-lamp { border-radius: 50%; width: 90%; height: 90%; margin: 5%; display: table; }
				#lamp-".$id." { background: ".$background." }

				.square-lamp div { padding: 5%; font-size: 4.5em; display: table-cell; vertical-align: middle; }
			</style>
			<div id=\"lamp-".$id."\" class=\"square-lamp\"><div>".$name."</div></div>
		");
	}

}

?>