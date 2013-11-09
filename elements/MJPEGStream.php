<?php

class MJPEGStream {
	
	function output($args) {
		$id = rand(0,100000);
		echo("<img src=\"".$args["url"]."\" style=\"width:100%; display: table-cell; vertical-align: center;\"></img>");
	}

}

?>