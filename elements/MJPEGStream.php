<?php

class MJPEGStream {
	
	function output($args) {
		$id = rand(0,100000);
		echo("
			<script>
			$().ready(function() {
				setInterval(function() { $('#".$id."').attr('src', '".$args["url"]."'); }, 60000);
			})
			</script>
			<img id=\"".$id."\" src=\"".$args["url"]."\" style=\"width:100%; display: table-cell; vertical-align: center;\"></img>");
	}

}

?>