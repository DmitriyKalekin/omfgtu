<?php

namespace MVC\Models;

/**
*   Модель сущности "Пользователь"
*   Сущность содержит атрибуты:
*     *name - имя
*     *age - возраст
**/
class UsersModel extends \MVC\Models\AModel
{
    /**
    *   Возвращает 10 записей из базы
    **/
    public function getUsers($params = array())
    {
      $ret = array();
      $mysqli = \core\Db::getInstance();

      $where_section = "1";

      if (!empty($params))
      {
        if (isset($params["id"]))
        {
          $where_section .= " AND id = '".$mysqli->escape_string($params["id"])."' ";
        }

        if (isset($params["name"]))
        {
          $where_section .= " AND name LIKE '".$mysqli->escape_string($params["name"])."_%' ";
        }

        if (isset($params["age"]))
        {
          $where_section .= " AND age = '".$mysqli->escape_string($params["age"])."' ";
        }
      }

      $query = "SELECT * FROM users WHERE {$where_section} LIMIT 0,10;";
      //    !!! MYSQLI_USE_RESULT
      if ($res = $mysqli->query($query))
      {
        if ($res->num_rows != 0)
        {
            while ($row = $res->fetch_assoc())
            {
              $ret[] = $row;
            }
        }
        $res->close();
      }

      return $ret;
    }

    /**
    *   Добавляет запись (только при наличии всех параметров)
    **/
    public function createUser($params = array())
    {
      $mysqli = \core\Db::getInstance();

      $values_section = "";

      if (!empty($params))
      {
          $values_section .= "'{$mysqli->escape_string($params["name"])}', ";
          $values_section .= "'{$mysqli->escape_string($params["age"])}'";
      }

      $query = "INSERT INTO users (id, name, age) VALUES (NULL, {$values_section});";
      $mysqli->query($query);
    }

    /**
    *   Изменяет запись (только при наличии всех параметров)
    **/
    public function editUser($params = array())
    {
      $mysqli = \core\Db::getInstance();

      if (!empty($params))
      {
          $name = "'{$mysqli->escape_string($params["name"])}'";
          $age = "'{$mysqli->escape_string($params["age"])}'";
          $where_section = "id = {$mysqli->escape_string($params["id"])}";
          $query = "UPDATE users SET name = {$name}, age = {$age} WHERE {$where_section};";
          $mysqli->query($query);
      }
    }

    /**
    *   Удаляет запись по $id
    **/
    public function removeUser($id)
    {
      $mysqli = \core\Db::getInstance();

      $where_section = "1";

      if (isset($id))
      {
        $where_section .= " AND id = '".$mysqli->escape_string($id)."'";
      }

      $query = "DELETE FROM users WHERE {$where_section};";
      $mysqli->query($query);
      //$mysqli->affected_rows  ?
    }

    /**
    *   Возвращает запись по $id
    **/
    public function aboutUser($id)
    {
      $mysqli = \core\Db::getInstance();

      $where_section = "1";

      if (!empty($id) && isset($id))
      {
          $where_section .= " AND id = '".$mysqli->escape_string($id)."'";
      }

      $query = "SELECT * FROM users WHERE {$where_section};";
      return $mysqli->query($query)->fetch_assoc();
    }
}

?>
