<?php

class TextBox extends Element {
	
	public function output($args) {
		echo("
			<style>
				.textbox { text-align: center; width: 100%; height: 100%; font-size: ".$args["font_size"]."em; }
			</style>
			<div class=\"textbox\">".$args["content"]."</div>");
	}

}