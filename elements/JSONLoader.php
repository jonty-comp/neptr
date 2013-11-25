<?php

class JSONLoader extends Element {

	public function output($args) {
		$id = rand(0,100000);

		echo("
		<style>
			#json-".$id." { font-weight: bold; font-size: ".$args["font_size"]."em; vertical-align: middle; margin-top: ".$args["margin_top"]."; }
			".$args["css"]."
		</style>
		<script>
			$().ready(function() {
				$.getJSON('".$args["url"]."', function(data) {
					var html = '';

					".$args["callback"]."

					$('#json-".$id."').html(html);
				});
				setInterval(function () {
					$.getJSON('".$args["url"]."', function(data) {
						var html = '';

						".$args["callback"]."

						$('#json-".$id."').html(html);
					});
				}, 5000);
			});
		</script>
		<div id=\"json-".$id."\"></div>
		");
	}

}

?>