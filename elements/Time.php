<?php

class Time extends Element {

	public function output($args) {
		$id = rand(0,100000);
		if(isset($args["format"])) $format = $args["format"];
		else $format = "h:mm:ss A";

		echo("
		<style>
			#time-".$id." { font-weight: bold; font-size: ".$args["font_size"]."em; vertical-align: middle; margin-top: ".$args["margin_top"]."; }
		</style>
		<script>
			$().ready(function() {
				$('#time-".$id."').html(moment().format('".$format."'));
				setInterval(function () {
					$('#time-".$id."').html(moment().format('".$format."'));
				}, 1000);
			});
		</script>
		<div id=\"time-".$id."\"></div>
		");
	}

}

?>