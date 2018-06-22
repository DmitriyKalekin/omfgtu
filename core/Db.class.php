<?php
namespace core;

/**
*   Класс подключения к БД (одиночка)
**/
class Db
{
  private static $instance = null;
  private static $instance_mysqli = null;

  /**
  *   Создаёт подключение к БД mysql
  *   Устанавливает кодировку UTF-8
  **/
  private function __construct()
  {
      require_once(getcwd()."/config.php");
      global $config;
      self::$instance_mysqli = new \mysqli($config["dbhost"], $config["dbuser"], $config["dbpwd"], $config["dbname"]);
      self::$instance_mysqli->query("SET NAMES utf8;");
  }

  /**
  *   Возвращает линк к базе данных
  **/
  public static function getInstance()
  {
    if (empty(self::$instance))
    {
      self::$instance = new self();
    }

    return self::$instance_mysqli;
  }

  /**
  *  Закрывает подключние
  **/
  public static function close()
    {
        if (!empty(self::$instance))
        {
            self::$instance->close();
        }

    }
}

?>
