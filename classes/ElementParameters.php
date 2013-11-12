<?php

class ElementParameters {
	
	public function get_by_id($id) {
		return ScreensDB::select("* FROM status_elements_parameters WHERE id=".$id, "ElementParameter", false);
	}

	public function get_by_element($element) {
		return ScreensDB::select("* FROM status_elements_parameters WHERE element_id = ".$element->id, "ElementParameter", true);
	}

}

class ElementParameter {



}

?>