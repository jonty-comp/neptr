<?php

class ScreenElementParameters {
	
	public function get_by_screenelement($screenelement) {
		return ScreensDB::select("status_parameters.name, status_screens_elements_parameters.value FROM status_screens_elements_parameters INNER JOIN status_parameters ON status_screens_elements_parameters.parameter_id = status_parameters.id WHERE status_screens_elements_parameters.screen_element_id =".$screenelement->id, "ScreenElementParameter", true);
	}

}

class ScreenElementParameter {
	


}

?>