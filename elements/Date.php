<?php

class Date extends Element {

	public function output($args) {
		$id = rand(0,100000);
		if(isset($args["format"])) $format = $args["format"];
		else $format = "dddd, MMMM Do YYYY";

		echo("
		<style>
			#date-".$id." { font-weight: bold; font-size: ".$args["font_size"]."em; vertical-align: middle; margin-top: ".$args["margin_top"]."; }
		</style>
		<script>
			$().ready(function() {
				$('#date-".$id."').html(moment().format('".$format."'));
				setInterval(function () {
					$('#date-".$id."').html(moment().format('".$format."'));
				}, 60000);
			});
		</script>
		<div id=\"date-".$id."\"></div>
		");
	}

}

?>