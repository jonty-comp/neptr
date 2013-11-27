<?php

class CircleLineClock extends Element {

	public function output($args = NULL) {
		echo("
			<style>
				@import url(http://fonts.googleapis.com/css?family=Share+Tech+Mono);
				.analogue_marker { border-radius: 50%; border-color: red; background: red; width: 4%; height: 4%; position: absolute; }
				.analogue_digital_clock_outer { width: 100%; height: 100%; display: table; position: absolute; }
				.analogue_digital_clock_inner { display: table-cell; vertical-align: middle; }
				#analogue_digital_clock_hourmin { text-align: center; font-size: ".$args["font_size"]."em; color: red; font-family: 'Share Tech Mono'; line-height: 70%; }
				#analogue_digital_clock_sec { text-align: center; font-size: ".($args["font_size"] * 0.6)."em; color: red; font-family: 'Share Tech Mono'; position: absolute; width: 100%; }

			</style>

			<script>
				var showhide = true;
				$().ready(function() {
					var seconds = new Date().getSeconds();
					var minutes = new Date().getMinutes();

					if((minutes % 2) == 0) {
						showhide = true;
						$('.analogue_second').hide();					
						for(var i = 0; i <= seconds; i++) $('#analogue_second_'+i).show();
					} else {
						showhide = false;
						$('.analogue_second').show();
					
						for(var i = 0; i <= seconds; i++) $('#analogue_second_'+i).hide();
					}
					$('#analogue_digital_clock_hourmin').html(moment().format('HH:mm'));
					$('#analogue_digital_clock_sec').html(moment().format('ss'));
				});

				setInterval(function() {
					var seconds = new Date().getSeconds();

					if(seconds == 0) { 
						if(showhide == true) showhide = false;
						else showhide = true;
					}

					for(var i = 0; i <= seconds; i++) {
						if(showhide == true) $('#analogue_second_'+i).show();
						else $('#analogue_second_'+i).hide();
					}

					$('#analogue_digital_clock_hourmin').html(moment().format('HH:mm'));
					$('#analogue_digital_clock_sec').html(moment().format('ss'));
				}, 1000);
			</script>

			<div class=\"analogue_digital_clock_outer\">
				<div class=\"analogue_digital_clock_inner\">
					<div id=\"analogue_digital_clock_hourmin\"></div>
					<div id=\"analogue_digital_clock_sec\"></div>
				</div>
			</div>

			<div style=\"width: 90%; height: 90%; padding: 5%; position: relative\">
				<div style=\"width: 90%; height: 90%; padding: 5%; float: left; position: relative;\">
					<div style=\"width:100%; height: 100%; position: relative\">
					");
		$x = 0;
		while($x < 360) {

			$top = 50-(50*(sin(deg2rad($x + 90))))-2.5;
			$left = 50-(50*(cos(deg2rad($x + 90))))-2.5;

			echo("<div id=\"analogue_second_".($x/6)."\" class=\"analogue_second analogue_marker\" style=\"top: ".$top."%; left: ".$left."% \"></div>");
			$x += 6;
		}
		echo("
					</div>
				</div>
				<div style=\"width:100%; height: 100%; position: relative\">
				");
		$x = 0;
		while($x < 360) {

			$top = 50-(50*(sin(deg2rad($x + 90))))-2.5;
			$left = 50-(50*(cos(deg2rad($x + 90))))-2.5;

			echo("<div class=\"analogue_marker\" style=\"top: ".$top."%; left: ".$left."% \"></div>");
			$x += 30;
		}
		echo("
				</div>
			</div>");
	}

}

?>