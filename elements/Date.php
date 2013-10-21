<?php

class Date {
	public function output($size_em = 4, $margin_top = 20) {
		$id = rand(0,1000);
		echo("
		<style>
			#date-".$id." { font-weight: bold; font-size: ".$size_em."em; vertical-align: middle; margin-top: ".$margin_top."; }
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