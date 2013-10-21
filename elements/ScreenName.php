<?php

class ScreenName {
	
	public function output($name) {
		echo("
			<style>
				.screen_name { width: 100%; height: 100%; font-size: 12em; }
			</style>
			<div class=\"screen_name\">".$name."</div>");
	}

}