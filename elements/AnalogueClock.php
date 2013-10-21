<?php

class AnalogueClock {

	public function output() {
		echo("
			<style>
				@import url(http://fonts.googleapis.com/css?family=Share+Tech+Mono);
				.analogue_marker { border-radius: 50%; border-color: red; background: red; width: 4%; height: 4%; position: absolute; }
				#analogue_digital_clock { font-size: 12em; color: red; font-family: 'Share Tech Mono'; line-height: 80%; }
			</style>

			<script>
				$().ready(function() {
					$('.analogue_second').hide();
					var seconds = new Date().getSeconds();
					for(var i = 0; i <= seconds; i++) {
						$('#analogue_second_'+i).show();
					}
					$('#analogue_digital_clock').html(moment().format('HH:mm<br />ss'));
				});

				setInterval(function() {
					var seconds = new Date().getSeconds();
					$('#analogue_second_'+seconds).toggle();

					$('#analogue_digital_clock').html(moment().format('HH:mm<br />ss'));
				}, 1000);
			</script>

			<div style=\"width: 100%; height: 100%; display: table; position: absolute;\">
				<div style=\"display: table-cell; vertical-align: middle\">
					<div id=\"analogue_digital_clock\">
					</div>
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