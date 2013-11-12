<?php

class Elements {
	
	public function get_by_id($id) {
		$element_name = ScreensDB::select("name FROM status_elements WHERE id = ".$id);

		return ScreensDB::select("* FROM status_elements WHERE id = ".$id, $element_name, false);
	}

}

// ensure all elements have an output function
interface iElement { public function output($parameters); }

abstract class Element implements iElement {

}

?>