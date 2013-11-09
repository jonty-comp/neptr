<?php

class Date {

	public function output($args) {
		$id = rand(0,100000);
		echo("
		<style>
			#date-".$id." { font-weight: bold; font-size: ".$args["font_size"]."em; vertical-align: middle; margin-top: ".$args["margin_top"]."; }
		</style>
		<script>
			$().ready(function() {
				$('#date-".$id."').html(moment().format('dddd, MMMM Do YYYY'));
				setInterval(function () {
					$('#date-".$id."').html(moment().format('dddd, MMMM Do YYYY'));
				}, 60000);
			});
		</script>
		<div id=\"date-".$id."\"></div>
		");
	}

}

?>