<?php

class TextBox extends Element {
	
	public function output($args) {
		echo("
			<style>
				.screen_name { width: 100%; height: 100%; font-size: ".$args["font_size"]."em; }
			</style>
			<div class=\"screen_name\">".$args["name"]."</div>");
	}

}