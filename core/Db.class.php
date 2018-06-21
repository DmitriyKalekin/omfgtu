<?php
namespace core;

/**
* TODO:
* Singleton
*/
class Db
{
    static $db = null;

    private function __construct()
    {

    }

    /**
    * Возвращает один и тот же линк к базе данных
    **/
    public static function getInstance()
    {
        global $config;
        // require / include
        require_once(getcwd()."/config.php");

        if (empty(self::$db))
        {
            // self()
            self::$db = new \mysqli($config["dbhost"], $config["dbuser"], $config["dbpwd"], $config["dbname"]);
        }

        return self::$db;

    }

    public static function close()
    {
        if (!empty(self::$db))
        {
            self::$db->close();
        }

    }


}


?>
