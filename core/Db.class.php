<?php
	namespace core;

	/**
	*
	*
	*/

	class Db
	{
		static $db = null;

		private function __construct()
		{

		}

		public static function getInstance()
		{
			global $config;
			require_once(getcwd()."/config.php");
			if (empty(self::$db))
			{
				self::$db = new \mysqli($config["dbhost"], $config["dbuser"], $config["dbpwd"], $config["dbname"]);
			}
			return self::$db;
		}

		public static function close()
		{
			if(!empty(self::$db))
				{
					self::$db->close();
				}
		}
	}
?>