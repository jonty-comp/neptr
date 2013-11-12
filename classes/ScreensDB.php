<?php

class ScreensDB {
	
		protected static $pgresource;
		protected static $querycount;
		protected static $querytime;

		public static function connect($db_params) {;
			self::$pgresource = pg_connect(implode(" ", array_map(function($v, $k){ return $k."=".$v; }, $db_params, array_keys($db_params))));
			self::is_connected();
			return self::$pgresource;
		}

		protected static function is_connected() {
			if(!self::$pgresource) {
				trigger_error("No Connection to database", E_USER_ERROR);
				return false;
			} else if (pg_connection_status(self::$pgresource) == PGSQL_CONNECTION_BAD) {
				trigger_error("Database connection bad",E_USER_ERROR);
				return false;
			}
			return true;
		}

		public static function get_querycount() { return self::$querycount; }
		public static function get_querytime() { return self::$querytime; }

		public static function query($query) {
			if(self::is_connected()) { 
				$time = microtime(true);
				$result = pg_query(self::$pgresource,$query);
				self::$querytime += microtime(true) - $time;
				self::$querycount++;
				return $result;
			}
		}

		public static function select($query, $return_class = NULL, $as_array = false) {
			$results = self::query("SELECT ".$query);
			if(pg_num_rows($results) == 0) return NULL;
			if(pg_num_rows($results) == 1 && $as_array == false) {
				if($return_class == NULL) {
					if(pg_num_fields($results) == 1) return pg_fetch_result($results,0,0);
					else return pg_fetch_assoc($results,0);
				}
				else return pg_fetch_object($results,0,$return_class);
			}

			$return = array();
			while ($item = ($return_class? pg_fetch_object($results,NULL,$return_class) : pg_fetch_assoc($results,NULL))) $return[] = $item;
			return $return;
		}
}

?>