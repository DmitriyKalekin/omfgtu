<?php

namespace MVC\Models;

class UsersModel extends \MVC\Models\AModel
{
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
          $where_section .= " AND name LIKE = '".$mysqli->escape_string($params["name"])."_%' ";
        }

        if (isset($params["age"]))
        {
          $where_section .= " AND age = '".$mysqli->escape_string($params["age"])."' ";
        }
      }

      $query = "SELECT * FROM users WHERE {$where_section} LIMIT 0,10;";
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

      } else {
        printf("SQL SELECT query SUCCESS\n");
      }

      return $ret;

    }

    public function removeUser($id)
    {
      $mysqli = \core\Db::getInstance();

      $where_section = "1";

      {
        if (isset($id))
        {
          $where_section .= " AND id = '".$mysqli->escape_string($id)."' ";
        }
      }
      $query = "DELETE FROM users WHERE {$where_section};";
      vd($query);
      if (!($mysqli->query($query)))
      {
        printf("SQL DELETE query ERROR\n");
      }
      else
      {
        printf("SQL DELETE query SUCCESS\n");
      }

    }

    public function addUser($params = array())
    {
      vd($params);
      $mysqli = \core\Db::getInstance();

      $values_section = "";

      if (!empty($params))
      {
          $values_section .= "'{$mysqli->escape_string($params["name"])}', ";
          $values_section .= "'{$mysqli->escape_string($params["age"])}'";
      }

      $query = "INSERT INTO users (id, name, age) VALUES (NULL, {$values_section});";
      vd($query);
      if (!($mysqli->query($query)))
      {
        printf("SQL INSERT query ERROR\n");
      }
      else
      {
        printf("SQL INSERT query SUCCESS\n");
      }
    }

    public function editUser($params = array())
    {
      vd($params);
      $mysqli = \core\Db::getInstance();

      if (!empty($params))
      {
          $name = "'{$mysqli->escape_string($params["name"])}'";
          $age = "'{$mysqli->escape_string($params["age"])}'";
          $where_section = "id = {$mysqli->escape_string($params["id"])}";
          $query = "UPDATE users SET name = {$name}, age = {$age} WHERE {$where_section};";
          vd($query);
          if (!($mysqli->query($query)))
          {
            printf("SQL UPDATE query ERROR\n");
          }
          else
          {
            printf("SQL UPDATE query SUCCESS\n");
          }
      }
      else
      {
        header( 'Location: /users' );
      }
    }

    public function aboutUser($id)
    {
      $ret = array();
      $mysqli = \core\Db::getInstance();

      $where_section = "1";

      if (!empty($id) && isset($id))
      {
          $where_section .= " AND id = '".$mysqli->escape_string($id)."'";
      }

      $query = "SELECT * FROM users WHERE {$where_section};";
      vd($query);
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

      } else {
        printf("SQL SELECT query ERROR (DETAILS)\n");
      }

      return $ret;
    }
  }


 ?>
