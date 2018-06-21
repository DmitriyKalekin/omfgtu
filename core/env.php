<?php

date_default_timezone_set("Asia/Omsk");

/**
* Output
**/
function output($s)
{
	echo $s."\n";
}


/**
* Вывод отладочной информации о переменной
**/
function vd($s)
{
  echo "<pre style='color:#ff4040; font-weight: bold;'>";
  var_dump($s);
  echo "</pre>";
}

/**
* Функция автозагрузки. Вызывается автоматически всякий раз, когда класс, экземпляр которого создается - не найден
* Как раз то, что нам нужно - мы будем использовать эту возможность, чтобы namespace вёл на папку с расположением класса
* для быстрой ориентации по файловой структуре проекта
**/
function __autoload($class_name)
{
        $path = getcwd();

        // /core/Router
  	    $class = str_replace('\\', '/', $class_name);
        $parts = explode("/", $class); //     ""/core/Router

        if (empty($parts) )
        {
            return false;
        }

        // Я хочу грузить автоматически php-файлы:
        // c описанием интерфейсов - .interface.php
        // абстрактные классы - .abstract.php
        // примеси - .trait.php
        // и другие классы - .class.php
        if (preg_match ("/^I[A-Z]{1}(.*)/", $parts[count($parts)-1]))
        {
          $class .= ".interface.php";
        }
        else if (preg_match ("/^A[A-Z]{1}(.*)/", $parts[count($parts)-1]))
        {
          $class .= ".abstract.php";
        }
         else if (preg_match ("/^T[A-Z]{1}(.*)/", $parts[count($parts)-1]))
        {
          $class .= ".trait.php";
        }
        else
        {
          $class .= ".class.php";
        }


        $filename = $class;
        $file = $path."/".$filename;


        if (file_exists($file) == false)
        {
                return false;
        }

        include_once($file);
}






$mysqli = \core\Db::getInstance();   //new mysqli($config["dbhost"], $config["dbuser"], $config["dbpwd"], $config["dbname"]);



if ($mysqli->connect_errno)
{
	printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
	exit();
}

$mysqli->query("SET NAMES utf8;");


?>
