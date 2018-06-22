<?php
namespace core;

class Db
{
  private static $instance = null;
  private static $instance_mysqli = null;


  /**
  *   Возвращает линк к базе данных
  **/
  private function __construct()
  {
      global $config;
      self::$instance_mysqli = new \mysqli($config["dbhost"], $config["dbuser"], $config["dbpwd"], $config["dbname"]);
      self::$instance_mysqli->query("SET NAMES utf8;");
  }

  public static function getInstance()
  {
    require_once(getcwd()."/config.php");
    if (empty(self::$instance))
    {
      self::$instance = new self();
    }

    return self::$instance_mysqli;
  }

  public static function close()
    {
        if (!empty(self::$instance))
        {
            self::$instance->close();
        }

    }
}
?>
