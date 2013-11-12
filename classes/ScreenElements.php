<?php

class ScreenElements {
	
	public function get_by_screen($screen) {
		return ScreensDB::select("* FROM status_screens_elements WHERE screen_id = ".$screen->id, "ScreenElement", true);
	}

}

class ScreenElement {

	public function get_element() {
		return Elements::get_by_id($this->element_id);
	}

	public function get_parameters() {
		return ScreenElementParameters::get_by_screenelement($this);
	}

}

?>