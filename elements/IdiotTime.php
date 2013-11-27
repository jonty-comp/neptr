<?php

class IdiotTime extends Element {

	public function output($args) {
		$id = rand(0,100000);
		echo("
			<style>
					#idiot_clock_".$id." { text-align: center; font-size: ".$args["font_size"]."em; margin-top: ".$args["margin_top"]."px; }
					#idiot_clock_".$id." span { display: none; }
					#idiot_clock_".$id." span.show { display: inline; }
			</style>
			<script>
				function update_idiot_clock_".$id."() { 
					var currentTime = new Date();
					var seconds = currentTime.getSeconds();
					var minutes = currentTime.getMinutes();
					var hours = currentTime.getHours();

					text_clock_output = [];

					if(minutes % 5 != 0) {
						if(minutes % 5 < 3) text_clock_output.push('.just_gone');
						else if(minutes % 5 > 2) text_clock_output.push('.almost');
					}

					if (minutes >= 58 || minutes <= 2) text_clock_output.push('.oclock');
					else if (minutes >= 3 && minutes <= 7) text_clock_output.push('.five', '.past');
					else if (minutes >= 8 && minutes <= 12) text_clock_output.push('.ten', '.past');
					else if (minutes >= 13 && minutes <= 17) text_clock_output.push('.quarter', '.past');
					else if (minutes >= 18 && minutes <= 22) text_clock_output.push('.twenty', '.past');
					else if (minutes >= 23 && minutes <= 27) text_clock_output.push('.twenty', '.five', '.past');
					else if (minutes >= 28 && minutes <= 32) text_clock_output.push('.half', '.past');
					else if (minutes >= 33 && minutes <= 37) text_clock_output.push('.twenty', '.five', '.to');
					else if (minutes >= 38 && minutes <= 42) text_clock_output.push('.twenty', '.to');
					else if (minutes >= 43 && minutes <= 47) text_clock_output.push('.quarter', '.to');
					else if (minutes >= 48 && minutes <= 52) text_clock_output.push('.ten', '.to');
					else if (minutes >= 53 && minutes <= 57) text_clock_output.push('.five', '.to');

					if (((hours == '11' || hours == '23') && (minutes >= 35 && minutes <= 59)) || ((hours == '0' || hours == '12') && (minutes >= 0 && minutes <= 34))) text_clock_output.push('.hour_twelve');
					else if (((hours == '12' || hours == '0') && (minutes >= 35 && minutes <= 59)) || ((hours == '1' || hours == '13') && (minutes >= 0 && minutes <= 34))) text_clock_output.push('.hour_one');
					else if (((hours == '13' || hours == '1') && (minutes >= 35 && minutes <= 59)) || ((hours == '2' || hours == '14') && (minutes >= 0 && minutes <= 34))) text_clock_output.push('.hour_two');
					else if (((hours == '14' || hours == '2') && (minutes >= 35 && minutes <= 59)) || ((hours == '3' || hours == '15') && (minutes >= 0 && minutes <= 34))) text_clock_output.push('.hour_three');
					else if (((hours == '15' || hours == '3') && (minutes >= 35 && minutes <= 59)) || ((hours == '4' || hours == '16') && (minutes >= 0 && minutes <= 34))) text_clock_output.push('.hour_four');
					else if (((hours == '16' || hours == '4') && (minutes >= 35 && minutes <= 59)) || ((hours == '5' || hours == '17') && (minutes >= 0 && minutes <= 34))) text_clock_output.push('.hour_five');
					else if (((hours == '17' || hours == '5') && (minutes >= 35 && minutes <= 59)) || ((hours == '6' || hours == '18') && (minutes >= 0 && minutes <= 34))) text_clock_output.push('.hour_six');
					else if (((hours == '18' || hours == '6') && (minutes >= 35 && minutes <= 59)) || ((hours == '7' || hours == '19') && (minutes >= 0 && minutes <= 34))) text_clock_output.push('.hour_seven');
					else if (((hours == '19' || hours == '7') && (minutes >= 35 && minutes <= 59)) || ((hours == '8' || hours == '20') && (minutes >= 0 && minutes <= 34))) text_clock_output.push('.hour_eight');
					else if (((hours == '20' || hours == '8') && (minutes >= 35 && minutes <= 59)) || ((hours == '9' || hours == '21') && (minutes >= 0 && minutes <= 34))) text_clock_output.push('.hour_nine');
					else if (((hours == '21' || hours == '9') && (minutes >= 35 && minutes <= 59)) || ((hours == '10' || hours == '22') && (minutes >= 0 && minutes <= 34))) text_clock_output.push('.hour_ten');
					else if (((hours == '22' || hours == '10') && (minutes >= 35 && minutes <= 59)) || ((hours == '11' || hours == '23') && (minutes >= 0 && minutes <= 34))) text_clock_output.push('.hour_eleven');
					
					text_clock_output_selectors = text_clock_output.join(', ');
					$('#idiot_clock_".$id." span').removeClass('show');
					$('#idiot_clock_".$id."').find(text_clock_output_selectors).addClass('show');
				}

				$().ready(function() {
					setInterval(update_idiot_clock_".$id.", 1000);
					update_idiot_clock_".$id."();
				})
			</script>
			<div id=\"idiot_clock_".$id."\">
				It's 
				<span class=\"almost\">almost </span>
				<span class=\"just_gone\">just gone </span>
				<span class=\"half\">half </span>
				<span class=\"ten\">ten </span>
				<span class=\"quarter\">quarter </span>
				<span class=\"twenty\">twenty </span>
				<span class=\"five\">five </span>
				<span class=\"to\">to </span>
				<span class=\"past\">past </span>
				<span class=\"hour_one\">one</span>
				<span class=\"hour_two\">two</span>
				<span class=\"hour_three\">three</span>
				<span class=\"hour_four\">four</span>
				<span class=\"hour_five\">five</span>
				<span class=\"hour_six\">six</span>
				<span class=\"hour_seven\">seven</span>
				<span class=\"hour_eight\">eight</span>
				<span class=\"hour_nine\">nine</span>
				<span class=\"hour_ten\">ten</span>
				<span class=\"hour_eleven\">eleven</span>
				<span class=\"hour_twelve\">twelve</span>
				<span class=\"oclock\">o'clock</span>
			</div>

");
	}	

}

?>