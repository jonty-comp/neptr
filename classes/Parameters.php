<?php

class Parameters {
	
	public function get_by_id($id) {
		return ScreensDB::select("* FROM status_parameters WHERE id = ".$id, "Parameter", false);
	}

}

class Parameter {
	


}

?>