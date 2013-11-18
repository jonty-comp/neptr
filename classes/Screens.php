<?php

class Screens {
	
	public function get_by_id($id) { return ScreensDB::select("* FROM status_screens WHERE id = ".$id, "Screen", false); }
	public function get_by_mac($mac) { return ScreensDB::select("* FROM status_screens WHERE mac = '".$mac."'", "Screen", false); }

}

class Screen {

	public function get_elements() {
		return ScreenElements::get_by_screen($this);
	}

}

?>