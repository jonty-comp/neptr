<?php

class HTMLBox extends Element {
	
	public function output($args) {
		echo($args["content"]);
	}

}