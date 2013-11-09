<?php

class AudioMeter {
	
	function output($args) {
		echo("
			<style>
				#".$args["id"]." {  background: green; }
				.audio_meter_container { position:relative; height: 100%; width: 100%; }
				.audio_meter { height: 100%; position: absolute; bottom: 0; left: 0; width: 100%; border: 10px solid #000; box-sizing: border-box; }
			</style>
			<script>
				websocket_functions.push(function(data) {
					val = data['".$args["id"]."'];
					val = val + 60;
					val = (val / 60)*100;

					if(val > 0) $('#".$args["id"]."').css('height', val+'%');
					else $('#".$args["id"]."').css('height', 0);
				})
			</script>
		");

		if(isset($args["name"])) {
			echo("<div class=\"audio_meter_name\">".$args["name"]."</div>
				<div class=\"audio_meter_container with_name\">
					<div class=\"audio_meter\" id=\"".$args["id"]."\">");
		} else {
			echo("<div class=\"audio_meter_container\">
				<div class=\"audio_meter\" id=\"".$args["id"]."\">");
		}

		echo("</div></div>");
	}

}